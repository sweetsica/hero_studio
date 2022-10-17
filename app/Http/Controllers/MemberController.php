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
            return redirect()->back()->withErrors(['user' => 'Email or password wrong']);
        }
        $user = User::with('member')->where('email', '=', $request->email)->first();

        session()->put('user', $user);

        return redirect()->route('get.task');
    }

    public function registerMember(Request $request) {
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
            'code' => $request->code
        ]);

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

    public function createMember() {
        $members = Member::with('user')->get();
        $departments = Department::all();
        $roles = Role::all();

        return view('admin-template.page.member.create', compact('members','departments', 'roles'));
    }
}
