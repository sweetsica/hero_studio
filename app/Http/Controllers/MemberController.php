<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function getLoginView()
    {
        return view('admin-template.page.authencation.login');
    }

    public function getRegisterView()
    {
        return view('admin-template.page.authencation.register');
    }
}
