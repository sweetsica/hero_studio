<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('upload');
});

Route::post('/', function (\Illuminate\Http\Request $request) {
    $file = $request->image;
    // TODO:: add validation file type if can
//    $request->validate([
//        'image' => 'file'
//    ]);
    $file = $request->image;
    $fileUrl = \Illuminate\Support\Facades\Storage::put('file', $request->image);
    dd($fileUrl, $file->extension(), $file);
});
