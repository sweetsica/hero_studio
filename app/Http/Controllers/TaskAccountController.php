<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use App\Models\TaskAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskAccountController extends Controller
{
    public function sortTasks($tasks)
    {
        $taskPriority = [
            Task::TASK_STATUS['REDO'],
            Task::TASK_STATUS['SENT'],
            Task::TASK_STATUS['IN_PROGRESS'],
            Task::TASK_STATUS['DONE'],
            Task::TASK_STATUS['CLOSE']
        ];

        $tasks = $tasks->map(function ($task) use ($taskPriority) {
            $task->priority_task = collect($taskPriority)->search(function ($val, $key) use ($task) {
                return $val === $task->status_code;
            });
            return $task;
        })->sortBy('priority_task', SORT_ASC);

        return $tasks;
    }


    public function index(Request $request)
    {
        $params = [];
        $query = TaskAccount::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::user()->member->id);
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }
        $filterBy = $request->get('filter_by', 'created_at');
        $order = $request->get('order', 'desc');
        $departmentId = $request->get('department_id', null);
        $taskType = $request->get('task_type', null);
        if (isset($departmentId)) {
            $query = $query->where('department_id', $departmentId);
        }
        if (isset($taskType)) {
            $query = $query->where('type', $taskType);
        }
        $query = $query->orderBy($filterBy, $order);
        $infos = $query->get();
        $infos = $this->sortTasks($infos)->paginate(200);
        $departments = Department::all();
        $params['departments'] = $departments;
        $params['infos'] = $infos;

        return view('admin-template.page.task-account.index', $params);
    }

    public function create()
    {
        $params = [];

        $departmentAccountId = Department::query()->where('name', '=', Department::DEPARTMENT_ACCOUNT)->first()->id;

        /* Query list valid department */
        // Get all department if role is Admin || Account
        $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
        $departmentQuery = Department::query();
        if (!Auth::user()->hasRole(Role::ROLE_SUPER_ADMIN) && !Auth::user()->hasRole(Role::ROLE_ACCOUNT)) {
            $departmentQuery = $departmentQuery->whereIn('id', $authUserDepartments);
        }
        $departments = $departmentQuery->get();

        /* Query list valid member to assign */
        $memberQuery = Member::query()->whereHas('user', function ($q) {
            return $q->whereHas('roles', function ($subQ) {
                $tempQ = $subQ->whereNot('name', Role::ROLE_COF);
                return $tempQ;
            });
        })->whereNot('id', '=', 1);

        // Remove danh sách nhân viên phòng account nếu là tk account
        if(!Auth::user()->hasRole(Role::ROLE_ACCOUNT)) {
            $memberQuery = $memberQuery
                ->whereHas('departments', function ($q) use ($departmentAccountId) {
                    return $q->where('departments.id', '!=', $departmentAccountId);
                });
        }

        $members = $memberQuery->get()->filter(function($item) use ($departments) {
            return $item->departments[0]->id == $departments->first()->id;
        });

        $params['departments'] = $departments;
        $params['members'] = $members;

        return view('admin-template.page.task-account.create', $params);
    }

    public function store(Request $request)
    {
        $validKeys = [
            'name', 'type', 'department_id', 'deadline',
            'source', 'url_source', 'content', 'product_length',
            'cof_note', 'kol_note', 'editor_note', 'creator_id',
            'member_id'
        ];

        $taskAccount = $request->only($validKeys);

        if ($request->status_code == 3) {
            $taskAccount['completed_at'] = Carbon::now();
        } else {
            $taskAccount['completed_at'] = null;
        }

        TaskAccount::create($taskAccount);

        return redirect()->route('taskAccount.index');
    }

    public function edit($id, Request $request)
    {
        $params = [];
        $tasks = TaskAccount::query();
        if (Auth::user()->getRoleNames()[0] === Role::ROLE_COF) {
            $authUserDepartments = Department::query()->where('id', Auth::id())->get()->pluck('id');
            $tasks = $tasks->whereIn('department_id', $authUserDepartments);
        }

        $tasks = $tasks->get()->sortByDesc('created_at');

        $departmentAccountId = Department::query()->where('name', '=', Department::DEPARTMENT_ACCOUNT)->first()->id;
        $task = TaskAccount::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc')->with('member');
        }])->find($id);


        /* Query list valid department */
        // Get all department if role is Admin || Account
        $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
        $departmentQuery = Department::query();
        if (!Auth::user()->hasRole(Role::ROLE_SUPER_ADMIN) && !Auth::user()->hasRole(Role::ROLE_ACCOUNT)) {
            $departmentQuery = $departmentQuery->whereIn('id', $authUserDepartments);
        }
        $departments = $departmentQuery->get();

        /* Query list valid member to assign */
        $memberQuery = Member::query()->whereHas('user', function ($q) {
            return $q->whereHas('roles', function ($subQ) {
                $tempQ = $subQ->whereNot('name', Role::ROLE_COF);
                return $tempQ;
            });
        })->whereNot('id', '=', 1);

        // Remove danh sách nhân viên phòng account nếu là tk account
        if(!Auth::user()->hasRole(Role::ROLE_ACCOUNT)) {
            $memberQuery = $memberQuery
                ->whereHas('departments', function ($q) use ($departmentAccountId) {
                    return $q->where('departments.id', '!=', $departmentAccountId);
                });
        }

        $members = $memberQuery->get()->filter(function($item) use ($departments) {
            return $item->departments[0]->id == $departments->first()->id;
        });


        $allowDelete = $task->creator_id === Auth::id() || in_array($task->department_id, $authUserDepartments);
        $info = $task->member('creator_id')->first();

        $params['departments'] = $departments;
        $params['task'] = $task;
        $params['members'] = $members;
        $params['tasks'] = $tasks;
        $params['allowDelete'] = $allowDelete;

        return view('admin-template.page.task-account.edit', $params);
    }

    public function update($id, Request $request)
    {
        $task = TaskAccount::find($id);
        if (!isset($request->product_rate)) $task->product_rate = null;
        $params = $request->all();

        if ($request->status_code == 3) {
            $params['completed_at'] = $task->completed_at ? $task->completed_at : Carbon::now();
        } else {
            $params['completed_at'] = null;
        }

        $task->update($params);

        return redirect()->route('taskAccount.index');
    }

    public function comment(Request $request, $id)
    {
        $comment = $request->comment;
        if (!$comment) return redirect()->back();

        if ($request->type === 'file') {
            $comment = Storage::disk('public')->put('files', $request->comment);
        } else if ($request->type === 'media_upload') {
            $path = Storage::disk('public')->put('files', $request->comment);
            $comment = Storage::url($path);
        }

        $task = TaskAccount::find($id);
        $task->comments()->create([
            'content' => $comment,
            'type' => $request->type,
            'media_type' => $request->get('media_type'),
            'member_id' => Auth::user()->member->id
        ]);

        return redirect()->back();
    }

    public function delete($taskOrder_id)
    {
        TaskAccount::find($taskOrder_id)->delete();
        return redirect()->route('taskAccount.index');
    }

    public function getUserOfDepartment(Request $request)
    {
        $departmentAccountId = Department::query()->where('name', '=', Department::DEPARTMENT_ACCOUNT)->first()->id;
        $departmentId = $request->departmentId;
         /* Query list valid member to assign */
        $memberQuery = Member::query()->whereHas('user', function ($q) {
            return $q->whereHas('roles', function ($subQ) {
                $tempQ = $subQ->whereNot('name', Role::ROLE_COF);
                return $tempQ;
            });
        })->whereNot('id', '=', 1);

        // Remove danh sách nhân viên phòng account nếu là tk account
        if(!Auth::user()->hasRole(Role::ROLE_ACCOUNT)) {
            $memberQuery = $memberQuery
                ->whereHas('departments', function ($q) use ($departmentAccountId) {
                    return $q->where('departments.id', '!=', $departmentAccountId);
                });
        }

        $members = $memberQuery->get()->filter(function($item) use ($departmentId) {
            return $item->departments[0]->id == $departmentId;
        });
        $passingData['members'] = $members;

        return view('task-list-member', $passingData);
    }
}
