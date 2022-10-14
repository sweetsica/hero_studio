<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function getDepartmentList()
    {
        $datas = Department::all();
        return view('admin-template.page.department.index',compact('datas'));
    }

    public function createDepartment()
    {
        return view('admin-template.page.department.create');
    }

    public function storeDepartment()
    {
        return view('admin-template.page.department.index');
    }

    public function editDepartmentById($department_id)
    {
        return view('admin-template.page.department.edit');
    }

    public function updateDepartment(Request $request)
    {
        return view('admin-template.page.department.index');
    }

    public function deleteDepartment($department_id)
    {
        $notice = "Xoá thành công phòng ban";
        return view('admin-template.page.department.index',compact('notice'));
    }
}
