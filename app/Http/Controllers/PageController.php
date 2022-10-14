<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getDepartmentList()
    {
        $info = Department::all();
        return view('admin-template.page.department.index');
    }

    //Task controller
    public function getTaskList()
    {
        $info = Task::all();
        return view('admin-template.page.task.index-manage');
    }
    public function createTask()
    {

    }
    public function storeTask()
    {

    }
    public function editTaskById()
    {

    }
    public function updateTaskById()
    {

    }
    public function deleteTaskById()
    {

    }


}
