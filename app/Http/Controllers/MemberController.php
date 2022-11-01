<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function getLoginView()
    {
        //Màn tạo người dùng
        return view('admin-template.page.authencation.login');
    }

    public function getRegisterView()
    {
        //Màn đăng kí người dùng
        return view('admin-template.page.authencation.register');
    }

    public function loginUser(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
//            return redirect()->back()->flash('error','Sai tài khoản hoặc mật khẩu!');
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu!');
        }
        $user = User::with('member')->where('email', '=', $request->email)->first();
        session()->put('user', $user);
        return redirect()->route('dashboard');
    }

    public function registerMember(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles($request->role);

        $member = Member::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'code' => $request->code,
            'special_access' => $request->get('special_access', 'off')  === 'on' ? 1 : 0
        ]);
        $member->departments()->sync($request->departments);

        //Màn đăng kí người dùng
        return redirect()->back();
    }

    public function registerUser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles(Role::ROLE_EDITOR);

        $member = Member::create([
            'user_id' => $user->id,
            'name' => $request->name
        ]);

        //Màn đăng kí người dùng
        return redirect()->route('get.user.login');
    }

    public function createMember()
    {
        $members = Member::with('user')->get();
        $departments = Department::all();
        $roles = Role::all();

        return view('admin-template.page.member.create', compact('members', 'departments', 'roles'));
    }

    public function editMember(Request $request, $id) {
        $member = Member::find($id);
        $departments = Department::all();
        $roles = Role::all();
        $memberDepartmentIds = $member->departments->pluck('id')->toArray();

        return view('admin-template.page.member.edit', compact('member', 'departments', 'roles', 'memberDepartmentIds'));
    }

    public function updateMember(Request $request, $id) {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $member = Member::find($id);
        $user = $member->user;
        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->update();
        }
        $user->update($request->only(['name', 'email']));
        if ($request->role) {
            $user->syncRoles([$request->role]);
        }

        if ($request->date_of_birth) {
            $member->date_of_birth = $request->date_of_birth;
        }

        if ($request->special_access) {
            $member->special_access = $request->special_access;
        }

        $member->name = $request->name;
        $member->code = $request->code;
        $member->special_access = $request->get('special_access', 'off')  === 'on' ? 1 : 0;
        $member->departments()->sync($request->departments);
        $member->update();

        return redirect()->route('create.member');
    }

    public function getUserList()
    {
        $authUserDepartments = collect(Auth::user()->departments)->pluck('id')->toArray();
        $memberQuery = Member::query();
        if (Auth::user()->hasRole(Role::ROLE_COF)) {
            $memberQuery = $memberQuery->whereHas('departments', function ($query) use ($authUserDepartments) {
                return $query->whereIn('department_id', $authUserDepartments);
            });
        }
        $members = $memberQuery->get();

        return view('admin-template.page.member.index', compact('members'));
    }
}
