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

Route::get('nguoi-dung/dang-nhap', [MemberController::class, 'getLoginView'])->name('get.user.login');
Route::post('nguoi-dung/dang-nhap', [MemberController::class, 'loginUser']);
//    Route::get('kiem-tra',[MemberController::class,'getUserList'])->name('post.user.check');
Route::get('nguoi-dung/dang-ky', [MemberController::class, 'getRegisterView'])->name('get.user.register'); // Đăng ký tài khoản bởi người dùng
Route::post('nguoi-dung/dang-ky', [MemberController::class, 'registerUser']); // Đăng ký tài khoản bởi người dùng

Route::middleware('auth')->group(function () {
    Route::prefix('nguoi-dung')->group(function () {
        Route::get('danh-sach', [MemberController::class, 'getUserList'])->name('get.member'); // Lấy danh sách người dùng
        Route::get('them-moi', [MemberController::class, 'createMember'])->name('create.member'); // Thêm người dùng (admin)
        Route::post('them-moi', [MemberController::class, 'registerMember']); // Thêm người dùng (admin)
//    Route::post('luu',[MemberController::class,'storeUser'])->name('store.member');
//    Route::get('cap-nhat/{user-id}',[MemberController::class,'editUserById'])->name('edit.member');
//    Route::put('cap-nhat/{user-id}',[MemberController::class,'updateUserById'])->name('update.member');
//    Route::delete('xoa/{user-id}',[MemberController::class,'deleteUserById'])->name('destroy.member');
//    Route::get('dang-xuat',[MemberController::class,'getUserList'])->name('get.user.logout');
    });
    Route::prefix('yeu-cau')->group(function () {
        Route::get('danh-sach', [TaskController::class, 'getTaskOrder'])->name('get.taskOrder.list'); //Sẽ có get TaskOrder theo status (Đang chờ - Đã hoàn thành - Cần chỉnh sửa)
        Route::get('danh-sach/{phong_ban_id}', [TaskController::class, 'getTaskOrderByDepartmentId'])->name('get.taskOrder.byDepartmentId'); //Sẽ có get TaskOrder theo status (Đang chờ - Đã hoàn thành - Cần chỉnh sửa)

        Route::get('them-moi', [TaskController::class, 'createTaskOrder'])->name('create.taskOrder'); //Thêm mới yêu cầu
        Route::post('luu', [TaskController::class, 'store'])->name('store.taskOrder'); //Lưu yêu cầu (nhiệm vụ dạng đang chờ)

        Route::get('chinh-sua/{task_id}', [TaskController::class, 'editTask'])->name('edit.taskOrder'); //Màn phân công yêu cầu (nhiệm vụ)
        Route::post('chinh-sua/{task_id}', [TaskController::class, 'updateTask'])->name('edit.updateTaskOrder'); // Update route bên trên

//    Route::get('chinh-sua/{task_id}', [TaskController::class, 'editTaskOrder'])->name('edit.taskOrder'); //Màn cập nhật yêu cầu (nhiệm vụ)
        Route::put('cap-nhat/{task_id}', [TaskController::class, 'updateTaskOrderById'])->name('update.taskOrder'); //Dùng để cập nhật yêu cầu: Gồm cập nhật trạng thái, cập nhật người phụ trách
        Route::delete('xoa/{task_id}', [TaskController::class, 'deleteTaskOrderById'])->name('destroy.taskOrder'); //Xóa yêu cầu (nhiệm vụ)

        Route::prefix('media')->group(function () {
            Route::get('danh-sach', [MediaController::class, 'getViewMediaStorage'])->name('get.media'); // Màn upload media kèm tên file, người up, danh mục media
//    Route::get('them-moi',[MediaController::class,'createUser'])->name('create.user');
//    Route::post('luu',[MediaController::class,'storeUser'])->name('store.user');
//    Route::delete('xoa/{user-id}',[MediaController::class,'deleteUserById'])->name('destroy.user');
        });

        Route::post('comment/{taskId}', [TaskController::class, 'comment'])->name('comment-task');
    });

    Route::prefix('cong-viec')->group(function () {
        Route::get('danh-sach', [TaskController::class, 'getTaskList'])->name('get.task'); //Lấy danh sách nhiệm vụ
        Route::get('danh-sach/{phong_ban_id}', [TaskController::class, 'getTaskListByDepartmentId'])->name('get.task.department'); //Lấy danh sách nhiệm vụ theo phòng ban

        Route::get('chi-tiet/{task_id}', [TaskController::class, 'getTaskDetail'])->name('get.task.id'); //Lấy thông tin nhiệm vụ theo id
        Route::post('chi-tiet/{task_id}', [TaskController::class, 'updateTaskDetail'])->name('update.task.id'); //Lấy thông tin nhiệm vụ theo id
        //Cập nhật thông tin nhiệm vụ theo id - Gắn người phụ trách vào nhiệm vụ theo id
    });

    Route::prefix('phong-ban')->group(function () {
        Route::get('danh-sach', [DepartmentController::class, 'getDepartmentList'])->name('get.department'); // Lấy danh sách phòng ban
        Route::get('them-moi', [DepartmentController::class, 'createDepartment'])->name('create.department'); // Màn thêm mới phòng ban
        Route::post('luu', [DepartmentController::class, 'storeDepartment'])->name('store.department'); // Lưu thông tin phòng ban
        Route::get('cap-nhat/{department_id}', [DepartmentController::class, 'editDepartmentById'])->name('edit.department'); // Màn sửa thông tin phòng ban
        Route::put('cap-nhat/{department_id}', [DepartmentController::class, 'updateDepartmentById'])->name('update.department'); // Cập nhật thông tin phòng ban, thành viên của phòng ban
        Route::delete('xoa/{department_id}', [DepartmentController::class, 'deleteTaskById'])->name('destroy.department'); // Xóa phòng ban
    });
});

Route::get('test', function () {
    return view('welcome');
});

Route::get('logout', function () {
    \Illuminate\Support\Facades\Auth::logout();

    return redirect()->route('get.user.login');
})->name('logout');






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
