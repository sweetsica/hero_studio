<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
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

    public function getTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $tasks = Task::with(['member', 'department', 'comments'])->get()->sortByDesc('created_at');
        $infos = $this->sortTasks($infos)->paginate(200);
        $departments = Department::all();
        return view('admin-template.page.task.index', compact('infos','departments', 'departments', 'tasks', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function getSponsorTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $infos = $query->where('type', 'Sponsor')->get();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos)->paginate(200);
        $departments = Department::all();
        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }


    public function getPendingTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $infos = $query->where('status_code', Task::TASK_STATUS['SENT'])->get();

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos);
        $departments = Department::all();
        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function getInprogressTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $infos = $query->where('status_code', Task::TASK_STATUS['IN_PROGRESS'])->get();

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos);
        $departments = Department::all();
        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function getDoneTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $infos = $query->where('status_code', Task::TASK_STATUS['DONE'])->get()->sortByDesc('created_at');

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos);
        $departments = Department::all();

        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function getRedoTaskOrder(Request $request)
    {
        $query = Task::query();

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

        $infos = $query->where('status_code', Task::TASK_STATUS['REDO'])->get();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos);
        $departments = Department::all();

        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function getTaskOrderKOL(Request $request, $kol_id)
    {
        $query = Task::query();
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

        $infos = $query->where('creator_id', '=', $kol_id)->get();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();

        $infos = $this->sortTasks($infos);
        $departments = Department::all();
        return view('admin-template.page.task.index', compact('infos','departments', 'count'));
    }

    public function createTaskOrder()
    {
        if (Auth::user()->hasRole('editor')) {
            return redirect()->back();
        }

        $tasks = Task::query();
        if (Auth::user()->getRoleNames()[0] === Role::ROLE_COF) {
            $authUserDepartments = Department::query()->where('id', Auth::id())->get()->pluck('id');
            $tasks = $tasks->whereIn('department_id', $authUserDepartments);
        }

        $tasks = $tasks->get()->sortByDesc('created_at');

        $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
        $departmentQuery = Department::query();
        if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $departmentQuery = $departmentQuery->whereIn('id', $authUserDepartments);
        }

        $departments = $departmentQuery->get();
        $memberQuery = Member::query();
        if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $memberQuery = $memberQuery->whereHas('departments', function ($query) use ($authUserDepartments) {
                return $query->whereIn('department_id', $authUserDepartments);
            });
        }
        $userHaveEditorRole = User::role('editor')->pluck('id')->toArray();


        $members = $departments->count() > 0 ? $departments->first()->members()->whereIn('user_id', $userHaveEditorRole)->get() : [];

        return view('admin-template.page.task.create', compact('tasks', 'departments', 'members'));
    }

    public function editTask($id)
    {
        $tasks = Task::query();
        if (Auth::user()->getRoleNames()[0] === Role::ROLE_COF) {
            $authUserDepartments = Department::query()->where('id', Auth::id())->get()->pluck('id');
            $tasks = $tasks->whereIn('department_id', $authUserDepartments);
        }

        $tasks = $tasks->get()->sortByDesc('created_at');

        $task = Task::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc')->with('member');
        }])->find($id);
        $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();

        $departmentQuery = Department::query();
        if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $departmentQuery = $departmentQuery->whereIn('id', $authUserDepartments);
        }

        $departments = $departmentQuery->get();
        $memberQuery = Member::query();
        if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $memberQuery = $memberQuery->whereHas('departments', function ($query) use ($authUserDepartments) {
                return $query->whereIn('department_id', $authUserDepartments);
            });
        }
        $userHaveEditorRole = User::role('editor')->pluck('id')->toArray();
        $members = $task->department->members()->whereIn('user_id', $userHaveEditorRole)->get();

        $allowDelete = $task->creator_id === Auth::id() || in_array($task->department_id, $authUserDepartments);
        $info = $task->member('creator_id')->first();

        return view('admin-template.page.task.edit', compact('tasks', 'departments', 'members', 'task', 'allowDelete', 'info'));
    }

    public function store(Request $request)
    {
        $validKeys = [
            'name', 'type', 'department_id', 'deadline',
            'source', 'url_source', 'content', 'product_length',
            'cof_note', 'kol_note', 'editor_note', 'creator_id',
            'member_id'
        ];

        Task::create($request->only($validKeys));

        return redirect()->route('get.taskOrder.list');
    }

    public function getTaskListByDepartmentId($phong_ban_id)
    {
        $infos = Task::where('department_id', '=', $phong_ban_id); //Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage', compact('infos'));
    }

    public function getTaskListByUserId($user_id)
    {
        $infos = Task::where('member_id', '=', $user_id); //Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage', compact('infos'));
    }

    public function updateTask($id, Request $request)
    {
        $task = Task::find($id);
        if (!isset($request->product_rate)) $task->product_rate = null;
        $params = $request->all();

        if ($request->status_code == 3) {
            $params['completed_at'] = $task->completed_at ? $task->completed_at : Carbon::now();
        } else {
            $params['completed_at'] = null;
        }

        $task->update($params);

        return redirect()->route('get.taskOrder.list');
    }


    // getTaskCof
    public function getTaskListCOF(Request $request)
    {
        $query = Task::query();
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
        $infos = $query->get(); // Lấy danh sách toàn bộ Task

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();

//        dd($totalTask,$totalTaskInprogress,$totalTaskDone);
        $count['task_today'] = Task::whereDate('created_at', date('Y-m-d'))->get()->count();
        $count['task_done_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["DONE"])->count();
        $count['task_lenght_today'] = Task::whereDate('created_at', date('Y-m-d'))->get('product_length');
        $count['task_sum_length_today'] = 0;
        foreach ($count['task_lenght_today'] as $task_lenght) {
            $count['task_sum_length_today'] = $task_lenght['product_length'] + $count['task_sum_length_today'];
        }
        $count['task_inprocess_today'] = Task::whereDate('created_at', date('Y-m-d'))->where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $infos = $this->sortTasks($infos);
        $departments = Department::all();

        return view('admin-template.page.task.index', compact('infos','departments', 'totalTask', 'totalTaskInprogress', 'totalTaskDone', 'count'));
    }

    public function updateTaskDetail(Request $request, $id)
    {
        $task = Task::find($id);
        $validKey = ['url_others', 'status_code'];
        $task->update($request->all());

        return redirect()->back();
    }

    public function updateTaskOrder(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('task.index');
    }

    public function deleteTaskOrder($taskOrder_id)
    {
        Task::find($taskOrder_id)->delete();
        return redirect()->route('get.taskOrder.list');
    }

    // tao moi task


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

        $task = Task::find($id);
        $task->comments()->create([
            'content' => $comment,
            'type' => $request->type,
            'media_type' => $request->get('media_type'),
            'member_id' => Auth::user()->member->id
        ]);

        return redirect()->back();
    }

    public function downloadFile(Request $request)
    {
        $file = Storage::disk('public')->path($request->file);

        return response()->download($file);
    }
}
