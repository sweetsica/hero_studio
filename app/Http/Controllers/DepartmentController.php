<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function getDepartmentList()
    {
        $datas = Department::all(); // Lấy danh sách phòng ban
        return view('admin-template.page.department.index',compact('datas'));
    }

    public function createDepartment()
    {
        // Màn tạo phòng ban
        return view('admin-template.page.department.create');
    }

    public function storeDepartment()
    {
        // Lưu phòng ban
        return view('admin-template.page.department.index');
    }

    public function editDepartmentById($department_id)
    {
        // Sửa phòng ban theo id
        return view('admin-template.page.department.edit');
    }

    public function updateDepartment(Request $request)
    {
        // Cập nhật phòng ban theo id
        return view('admin-template.page.department.index');
    }

    public function deleteDepartment($department_id)
    {
        // Xóa phòng ban theo id
        $notice = "Xoá thành công phòng ban";
        return view('admin-template.page.department.index',compact('notice'));
    }
}
