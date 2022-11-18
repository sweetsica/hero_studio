<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function getDepartmentList()
    {
        $datas = Department::all(); // Lấy danh sách phòng ban

        return view('admin-template.page.department.index', compact('datas'));
    }

    public function createDepartment()
    {
        $departments = Department::all();
        $members = Member::doesntHave('user.departments')->get();

        // Màn tạo phòng ban
        return view('admin-template.page.department.create', compact('members', 'departments'));
    }

    public function storeDepartment(Request $request)
    {
        Department::create($request->all());

        return redirect()->route('get.department');
    }

    public function editDepartmentById($department_id)
    {
        $department = Department::find($department_id);
        $departmentMemberIds = collect($department->members)->pluck('id')->toArray();
        $members = Member::get();
        $memberNotHaveDepartment = Member::doesntHave('user.departments')->pluck('id')->toArray();

        // Sửa phòng ban theo id
        return view('admin-template.page.department.edit', compact('department', 'members', 'departmentMemberIds', 'memberNotHaveDepartment'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        $departmentHeadId = $request->department_head_id;


        $member = Member::find($departmentHeadId);
        $member->user->syncRoles([Role::ROLE_COF]);

        // Cập nhật phòng ban theo id
        return redirect()->route('get.department');
    }

    public function updateMemberDepartment(Request $request, $id)
    {
        $department = Department::find($id);
        $department->members()->sync($request->members);

        return redirect()->back();
    }

    public function deleteDepartment($department_id)
    {
        // Xóa phòng ban theo id
        $notice = "Xoá thành công phòng ban";
        return view('admin-template.page.department.index', compact('notice'));
    }
}
