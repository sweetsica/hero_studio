<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function getTaskOrder()
    {
        $query = Task::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }


        $infos = $query->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
    }

    public function getPendingTaskOrder()
    {
        $query = Task::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }

        $infos = $query->where('status_code', Task::TASK_STATUS['SENT'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
    }

    public function getInprogressTaskOrder()
    {
        $query = Task::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }

        $infos = $query->where('status_code', Task::TASK_STATUS['IN_PROGRESS'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
    }

    public function getDoneTaskOrder()
    {
        $query = Task::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }

        $infos = $query->where('status_code', Task::TASK_STATUS['DONE'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
    }

    public function getRedoTaskOrder()
    {
        $query = Task::query();

        if (Auth::user()->hasRole(Role::ROLE_KOLS)) {
            $query = $query->where('creator_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_EDITOR)) {
            $query = $query->where('member_id', '=', Auth::id());
        } else if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
            $query = $query->whereIn('department_id', $authUserDepartments);
        }

        $infos = $query->where('status_code', Task::TASK_STATUS['REDO'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
    }


    public function getTaskOrderKOL($kol_id)
    {
        $infos = Task::where('creator_id', '=', $kol_id)->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        return view('admin-template.page.task.index', compact('infos'));
    }

    public function createTaskOrder()
    {
        $tasks = Task::with(['member', 'department', 'comments'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Màn tạo Task
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
        $members = $memberQuery->get();

        return view('admin-template.page.task.create', compact('tasks', 'departments', 'members'));
    }

    public function store(Request $request)
    {
        $validKeys = [
            'name', 'type', 'department_id', 'deadline',
            'source', 'url_source', 'content', 'product_length',
            'cof_note', 'kol_note', 'editor_note', 'creator_id'
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

    public function editTask($id)
    {
        $tasks = Task::all()->sortByDesc("created_at");
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
        $members = $memberQuery->get();
        $allowDelete = $task->creator_id === Auth::id() || in_array($task->department_id, $authUserDepartments);

        return view('admin-template.page.task.edit', compact('tasks', 'departments', 'members', 'task', 'allowDelete'));
    }

    public function updateTask($id, Request $request)
    {
        $task = Task::find($id);
        $task->update($request->all());
//        $validKey = ['member_id', 'department_id', 'deadline', 'status_code'];
//        $task->update($request->all());

        return redirect()->route('get.taskOrder.list');
    }


    // getTaskCof
    public function getTaskListCOF()
    {
        $infos = Task::orderByDesc('updated_at')->get(); // Lấy danh sách toàn bộ Task

        $totalTask = Task::count();
        $totalTaskInprogress = Task::where('status_code', Task::TASK_STATUS["IN_PROGRESS"])->count();
        $totalTaskDone = Task::where('status_code', Task::TASK_STATUS["DONE"])->count();

//        dd($totalTask,$totalTaskInprogress,$totalTaskDone);


        return view('admin-template.page.task.index', compact('infos', 'totalTask', 'totalTaskInprogress', 'totalTaskDone'));
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

    public function downloadFile(Request $request) {
        $file = Storage::disk('public')->path($request->file);

        return response()->download($file);
    }
}
