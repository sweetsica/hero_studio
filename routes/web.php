<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TaskController;

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
    return view('admin-template.page.dashboard.index');
});

Route::get('/login', function () {
    return view('admin-template.page.authencation.login');
});

Route::prefix('phong-ban')->group(function (){
    Route::get('danh-sach',[DepartmentController::class,'getDepartmentList'])->name('get.department');
    Route::get('them-moi',[DepartmentController::class,'createDepartment'])->name('create.department');
    Route::post('luu',[DepartmentController::class,'storeDepartment'])->name('store.department');
    Route::get('cap-nhat/{department_id}',[DepartmentController::class,'editDepartmentById'])->name('edit.department');
    Route::put('cap-nhat/{department_id}',[DepartmentController::class,'updateDepartmentById'])->name('update.department');
    Route::delete('xoa/{department_id}',[DepartmentController::class,'deleteTaskById'])->name('destroy.department');
});
Route::prefix('cong-viec')->group(function (){
    Route::get('danh-sach',[TaskController::class,'getTaskList'])->name('get.task');
    Route::get('danh-sach/{phong_ban_id}',[TaskController::class,'getTaskListByDepartmentId'])->name('get.task.department');
    Route::get('chi-tiet/{task_id}',[TaskController::class,'getTaskDetail'])->name('get.task.id');

//    Route::get('them-moi',[PageController::class,'createTask'])->name('create.task');
//    Route::post('luu',[PageController::class,'storeTask'])->name('store.task');
//    Route::get('cap-nhat/{task-id}',[PageController::class,'editTaskById'])->name('edit.task');
//    Route::put('cap-nhat/{task-id}',[PageController::class,'updateTaskById'])->name('update.task');
//    Route::delete('xoa/{task-id}',[PageController::class,'deleteTaskById'])->name('destroy.task');
});
Route::prefix('nguoi-dung')->group(function (){
    Route::get('danh-sach',[MemberController::class,'getUserList'])->name('get.member');
//    Route::get('them-moi',[MemberController::class,'createUser'])->name('create.member');
//    Route::post('luu',[MemberController::class,'storeUser'])->name('store.member');
//    Route::get('cap-nhat/{user-id}',[MemberController::class,'editUserById'])->name('edit.member');
//    Route::put('cap-nhat/{user-id}',[MemberController::class,'updateUserById'])->name('update.member');
//    Route::delete('xoa/{user-id}',[MemberController::class,'deleteUserById'])->name('destroy.member');

    Route::get('dang-nhap',[MemberController::class,'getLoginView'])->name('get.user.login');
//    Route::get('kiem-tra',[MemberController::class,'getUserList'])->name('post.user.check');
    Route::get('dang-ky',[MemberController::class,'getRegisterView'])->name('get.user.register');
//    Route::get('dang-xuat',[MemberController::class,'getUserList'])->name('get.user.logout');

});

Route::prefix('media')->group(function (){
    Route::get('danh-sach',[MediaController::class,'getViewMediaStorage'])->name('get.media');
//    Route::get('them-moi',[MediaController::class,'createUser'])->name('create.user');
//    Route::post('luu',[MediaController::class,'storeUser'])->name('store.user');
//    Route::delete('xoa/{user-id}',[MediaController::class,'deleteUserById'])->name('destroy.user');
});

Route::prefix('yeu-cau')->group(function (){
    Route::get('danh-sach',[TaskController::class,'getTaskOrder'])->name('get.taskOrder.list'); //Sẽ có get TaskOrder theo status (Đang chờ - Đã hoàn thành - Cần chỉnh sửa)
    Route::get('danh-sach/{phong_ban_id}',[TaskController::class,'getTaskOrderByDepartmentId'])->name('get.taskOrder.byDepartmentId'); //Sẽ có get TaskOrder theo status (Đang chờ - Đã hoàn thành - Cần chỉnh sửa)
    Route::get('them-moi',[TaskController::class,'createTaskOrder'])->name('create.taskOrder');
    Route::post('luu',[TaskController::class,'storeUser'])->name('store.taskOrder');
    Route::get('chinh-sua/{task_id}',[TaskController::class,'editTaskOrder'])->name('edit.taskOrder');
    Route::put('cap-nhat/{task_id}',[TaskController::class,'updateTaskOrderById'])->name('update.taskOrder');
    Route::delete('xoa/{task_id}',[TaskController::class,'deleteTaskOrderById'])->name('destroy.taskOrder');
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
