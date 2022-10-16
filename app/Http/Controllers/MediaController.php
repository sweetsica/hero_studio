<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function getViewMediaStorage()
    {
        return view('admin-template.page.media.index');
    }
}
