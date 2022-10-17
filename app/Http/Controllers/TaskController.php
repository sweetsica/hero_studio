<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTaskList()
    {
        $data = Task::all(); // Lấy danh sách toàn bộ Task
        return view('admin-template.page.task.index', compact('data'));
    }

    public function getTaskListByDepartmentId($phong_ban_id)
    {
        $info = Task::all();//->where('department_id','=',$phong_ban_id) Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage', compact('info'));
    }

    public function getTaskOrder()
    {
        $info = Task::all();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        return view('admin-template.page.request.index', compact('info'));
    }

    public function createTaskOrder()
    {
        $tasks = Task::all();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Màn tạo Task
        $departments = Department::all();
        $members = Member::all();


        return view('admin-template.page.task.create', compact('tasks', 'departments', 'members'));
    }

    public function editTask($id)
    {
        $tasks = Task::all();
        $task = Task::find($id);//->where('task_id','=',$id)->where('status','=','onHold')  Màn sửa task
        $departments = Department::all();
        $members = Member::all();

        return view('admin-template.page.task.edit', compact('tasks', 'departments', 'members', 'task'));
    }

    public function updateTask($id, Request $request)
    {
        $task = Task::find($id);
        $validKey = ['member_id', 'department_id', 'deadline', 'status_code'];
        $task->update($request->only($validKey));

        return redirect()->back();
    }

    public function getTaskDetail($id)
    {
        $tasks = Task::all();
        $task = Task::find($id);//->where('task_id','=',$id)->where('status','=','onHold')  Màn sửa task
        $departments = Department::all();
        $members = Member::all();

        return view('admin-template.page.task.detail-member', compact('tasks', 'departments', 'members', 'task'));
    }

    public function updateTaskDetail($id, Request $request)
    {
        $task = Task::find($id);
        $validKey = ['url_others', 'status_code'];
        $task->update($request->only($validKey));

        return redirect()->back();
    }

    public function updateTaskOrder(Request $request)
    {
        // Cập nhật Yêu cầu theo id
    }

    public function deleteTaskOrder($taskOrder_id)
    {
        // Xóa Yêu cầu theo id
    }

    // tao moi task
    public function store(Request $request)
    {
        $validKeys = ['name', 'member_id', 'department_id', 'deadline', 'source', 'url_source', 'content'];
        Task::create($request->only($validKeys));

        return redirect()->back();
    }
}
