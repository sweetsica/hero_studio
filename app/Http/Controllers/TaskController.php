<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTaskList()
    {
        $data = Task::all(); // Lấy danh sách toàn bộ Task
        return view('admin-template.page.task.index',compact('data'));
    }

    public function getTaskListByDepartmentId($phong_ban_id)
    {
        $info = Task::all();//->where('department_id','=',$phong_ban_id) Lấy danh sách Task theo department_id
        return view('admin-template.page.task.index-manage',compact('info'));
    }

    public function getTaskOrder()
    {
        $info = Task::all();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Lấy các Task đang ở trạng thái "Chờ" theo id của KOL
        return view('admin-template.page.request.index',compact('info'));
    }

    public function createTaskOrder()
    {
        $info = Task::all();//->where('userOrder_id','=',$user_id)->where('status','=','onHold')  Màn tạo Task
        return view('admin-template.page.task.create',compact('info'));
    }

    public function editTask($id)
    {
        $info = Task::all();//->where('task_id','=',$id)->where('status','=','onHold')  Màn sửa task
        return view('admin-template.page.task.edit',compact('info'));
    }

    public function getTaskDetail($task_id)
    {
        $info = Task::all();//->where('id','=',$task_id) Lấy thông tin Task theo task_id
        return view('admin-template.page.task.detail-member',compact('info'));
    }

    public function updateTaskOrder(Request $request)
    {
        // Cập nhật Yêu cầu theo id
    }

    public function deleteTaskOrder($taskOrder_id)
    {
        // Xóa Yêu cầu theo id
    }
}
