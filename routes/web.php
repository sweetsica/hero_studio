<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PageController;

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

Route::get('/demo',function (){
   return view('admin-template.main.index');
});

Route::get('/', function () {
    return view('admin-template.page.dashboard.index');
});

//Route::get('/', function () {
//    return view('upload');
//});

//Route::post('/', function (\Illuminate\Http\Request $request) {
//    $file = $request->image;
//    // TODO:: add validation file type if can
////    $request->validate([
////        'image' => 'file'
////    ]);
//    $file = $request->image;
//    $fileUrl = \Illuminate\Support\Facades\Storage::put('file', $request->image);
//    dd($fileUrl, $file->extension(), $file);
//});

Route::prefix('phong-ban')->group(function (){
    Route::get('danh-sach',[PageController::class,'getDepartmentList'])->name('get.department');
    Route::get('them-moi',[PageController::class,'createDepartment'])->name('create.department');
    Route::post('luu',[PageController::class,'storeDepartment'])->name('store.department');
    Route::get('cap-nhat/{department-id}',[PageController::class,'getDepartmentById'])->name('get.department');
    Route::put('cap-nhat/{department-id}',[PageController::class,'updateDepartmentById'])->name('get.department');
    Route::delete('xoa/{department-id}',[PageController::class,'deleteTaskById'])->name('destroy.department');
});
Route::prefix('cong-viec')->group(function (){
    Route::get('danh-sach',[PageController::class,'getTaskList'])->name('get.task');
    Route::get('them-moi',[PageController::class,'createTask'])->name('create.task');
    Route::post('luu',[PageController::class,'storeTask'])->name('store.task');
    Route::get('cap-nhat/{task-id}',[PageController::class,'editTaskById'])->name('edit.task');
    Route::put('cap-nhat/{task-id}',[PageController::class,'updateTaskById'])->name('update.task');
    Route::delete('xoa/{task-id}',[PageController::class,'deleteTaskById'])->name('destroy.task');
});
Route::prefix('nguoi-dung')->group(function (){
    Route::get('danh-sach',[PageController::class,'getUserList'])->name('get.user');
    Route::get('them-moi',[PageController::class,'createUser'])->name('create.user');
    Route::post('luu',[PageController::class,'storeUser'])->name('store.user');
    Route::get('cap-nhat/{user-id}',[PageController::class,'editUserById'])->name('edit.user');
    Route::put('cap-nhat/{user-id}',[PageController::class,'updateUserById'])->name('update.user');
    Route::delete('xoa/{user-id}',[PageController::class,'deleteUserById'])->name('destroy.user');
});
