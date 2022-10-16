<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
