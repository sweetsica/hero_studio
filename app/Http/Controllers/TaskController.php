<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getTaskOrder()
    {
        $infos = Task::where('creator_id','=', Auth::id())->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        return view('admin-template.page.task.index', compact('infos'));
    }
    public function getTaskOrderKOL($kol_id){
        $infos = Task::where('creator_id','=',$kol_id)->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        return view('admin-template.page.task.index', compact('infos'));
    }
    public function createTaskOrder()
    {
        $tasks = Task::with(['member', 'department', 'comments'])->get()->sortByDesc('created_at');//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Màn tạo Task
        $departments = Department::all();
        $members = Member::all();

        return view('admin-template.page.task.create', compact('tasks', 'departments', 'members'));
    }
    public function getTaskListByDepartmentId($phong_ban_id)
    {
        $infos = Task::where('department_id','=',$phong_ban_id); //Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage', compact('infos'));
    }
    public function getTaskListByUserId($user_id)
    {
        $infos = Task::where('member_id','=',$user_id); //Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage', compact('infos'));
    }

    public function editTask($id)
    {
        $tasks = Task::all()->sortByDesc("created_at");
        $task = Task::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc')->with('member');
        }])->find($id);
        $departments = Department::all();
        $members = Member::all();

        return view('admin-template.page.task.edit', compact('tasks', 'departments', 'members', 'task'));
    }
    public function updateTask($id, Request $request)
    {
        $task = Task::find($id);
        $task->update($request->all());
//        $validKey = ['member_id', 'department_id', 'deadline', 'status_code'];
//        $task->update($request->all());

        return redirect()->route('get.taskOrder.list');
    }









    public function getTaskList()
    {
        $infos = Task::all(); // Lấy danh sách toàn bộ Task
        return view('admin-template.page.task.index', compact('infos'));
    }





//    public function getTaskDetail($id)
//    {
//        $tasks = Task::all();
//        $task = Task::with(['comments' => function ($query) {
//            $query->orderBy('created_at', 'desc')->with('member');
//        }])->find($id);//->where('task_id','=',$id)->where('status','=','onHold')  Màn sửa task
//        $departments = Department::all();
//        $members = Member::all();
//
//        return view('admin-template.page.task.detail-member', compact('tasks', 'departments', 'members', 'task'));
//    }

    public function updateTaskDetail(Request $request, $id)
    {
        $task = Task::find($id);
        $validKey = ['url_others', 'status_code'];
        $task->update($request->all());

        return redirect()->back();
    }

    public function updateTaskOrder(Request $request,$id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('task.index');
    }

    public function deleteTaskOrder($taskOrder_id)
    {
        // Xóa Yêu cầu theo id
    }

    // tao moi task
    public function store(Request $request)
    {
        $validKeys = [
            'name', 'type', 'department_id', 'deadline',
            'source', 'url_source', 'content', 'product_length',
            'cof_note', 'kol_note', 'editor_note'
        ];

        Task::create($request->only($validKeys));

        return redirect()->back();
    }

    public function comment(Request $request, $id)
    {
        $task = Task::find($id);
        $task->comments()->create([
            'content' => $request->comment,
            'member_id' => Auth::id()
        ]);

        return redirect()->back();
    }
}
