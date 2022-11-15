<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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


Route::get('nguoi-dung/dang-nhap', [MemberController::class, 'getLoginView'])->name('get.user.login');
Route::post('nguoi-dung/dang-nhap', [MemberController::class, 'loginUser']);
Route::get('nguoi-dung/dang-ky', [MemberController::class, 'getRegisterView'])->name('get.user.register'); // Đăng ký tài khoản bởi người dùng
Route::post('nguoi-dung/dang-ky', [MemberController::class, 'registerUser']); // Đăng ký tài khoản bởi người dùng

Route::middleware('auth')->group(function () {
    Route::get('', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('nhiem-vu')->group(function () {
        //Danh sách yêu cầu theo KOL
        Route::get('danh-sach', [TaskController::class, 'getTaskOrder'])->name('get.taskOrder.list');

        Route::get('danh-sach-dang-cho-xu-ly', [TaskController::class, 'getPendingTaskOrder'])->name('get.taskOrder.pendingList');
        Route::get('danh-sach-dang-thuc-hien', [TaskController::class, 'getInprogressTaskOrder'])->name('get.taskOrder.inprogressList');
        Route::get('danh-sach-hoan-thanh', [TaskController::class, 'getDoneTaskOrder'])->name('get.taskOrder.doneList');
        Route::get('danh-sach-xem-lai', [TaskController::class, 'getRedoTaskOrder'])->name('get.taskOrder.redoList');
        Route::get('danh-sach-duoc-tai-tro', [TaskController::class, 'getSponsorTaskOrder'])->name('get.taskOrder.sponsor');

        Route::get('danh-sach/kol/{kol_id}', [TaskController::class, 'getTaskOrderKOL'])->name('get.taskOrderKOL.list');
        //KOL- Tạo yêu cầu
        Route::get('them-moi', [TaskController::class, 'createTaskOrder'])->name('create.taskOrder'); //Thêm mới yêu cầu
        //KOL- Sửa yêu cầu
        Route::get('chinh-sua/{task_id}', [TaskController::class, 'editTask'])->name('edit.taskOrder'); //Màn phân công yêu cầu (nhiệm vụ)
        Route::put('chinh-sua/{task_id}', [TaskController::class, 'updateTask'])->name('edit.updateTaskOrder'); // Update route bên trên

        Route::get('xoa/{task_id}', [TaskController::class, 'deleteTaskOrder'])->name('delete.task');

        //Danh sách yêu cầu theo COF
        Route::get('danh-sach/{phong_ban_id}', [TaskController::class, 'getTaskOrderByDepartmentId'])->name('get.taskOrder.byDepartmentId');
        //COF -> Nhận yêu cầu
        Route::get('chinh-sua/{task_id}', [TaskController::class, 'editTask'])->name('edit.taskOrder'); //Màn phân công yêu cầu (nhiệm vụ)
        //COF -> Sửa yêu cầu
//        Route::put('cap-nhat/{task_id}', [TaskController::class, 'updateTask'])->name('update.taskOrder');
        //Editor - Nhận yêu cầu -> Sửa yêu cầu
        Route::get('danh-sach/{user_id}', [TaskController::class, 'getTaskListByUserId'])->name('get.taskOrder.byUserId');

    });


    Route::prefix('nguoi-dung')->middleware('listUserPermission')->group(function () {
        Route::get('danh-sach', [MemberController::class, 'getUserList'])->name('get.member'); // Lấy danh sách người dùng
        Route::get('them-moi', [MemberController::class, 'createMember'])->name('create.member'); // Thêm người dùng (admin)
        Route::get('chinh-sua/{id}', [MemberController::class, 'editMember'])->name('edit.member'); // Thêm người dùng (admin)
        Route::post('chinh-sua/{id}', [MemberController::class, 'updateMember'])->name('update.member'); // Thêm người dùng (admin)
        Route::get('chi-tiet/{id}', [MemberController::class, 'analytics'])->name('member.analytics'); // Thêm người dùng (admin)
        Route::post('them-moi', [MemberController::class, 'registerMember']); // Thêm người dùng (admin)
    });


    Route::prefix('yeu-cau')->group(function () {
        Route::post('luu', [TaskController::class, 'store'])->name('store.taskOrder'); //Lưu yêu cầu (nhiệm vụ dạng đang chờ)
        Route::delete('xoa/{task_id}', [TaskController::class, 'deleteTaskOrderById'])->name('destroy.taskOrder'); //Xóa yêu cầu (nhiệm vụ)

        Route::prefix('media')->group(function () {
            Route::get('danh-sach', [MediaController::class, 'getViewMediaStorage'])->name('get.media'); // Màn upload media kèm tên file, người up, danh mục media
        });

        Route::post('comment/{taskId}', [TaskController::class, 'comment'])->name('comment-task');
    });

    Route::prefix('phong-ban')->group(function () {
        Route::get('danh-sach', [DepartmentController::class, 'createDepartment'])->name('get.department'); // Lấy danh sách phòng ban
        Route::post('them-moi', [DepartmentController::class, 'storeDepartment'])->name('store.department'); // Lưu thông tin phòng ban
        Route::get('cap-nhat/{department_id}', [DepartmentController::class, 'editDepartmentById'])->name('edit.department'); // Màn sửa thông tin phòng ban
        Route::put('cap-nhat/{department_id}', [DepartmentController::class, 'updateDepartment'])->name('update.department'); // Cập nhật thông tin phòng ban, thành viên của phòng ban
        Route::delete('xoa/{department_id}', [DepartmentController::class, 'deleteTaskById'])->name('destroy.department'); // Xóa phòng ban
        Route::post('cap-nhat-member/{department_id}', [DepartmentController::class, 'updateMemberDepartment'])->name('update.department.member');
    });

    Route::get('/post/danh-sach', [PostController::class, 'index'])->name('post');
    Route::get('/post/tao-moi', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/tao-moi', [PostController::class, 'store']);
    Route::get('/post/chi-tiet/{id}', [PostController::class, 'detail'])->name('post.detail');
    Route::get('/post/chinh-sua/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/chinh-sua/{id}', [PostController::class, 'update']);

    Route::get('/test/chat', function () {
        return view('admin-template.page.comment.chat');
    });

    Route::get('download', function (\Illuminate\Http\Request $request) {
        $file = \Illuminate\Support\Facades\Storage::disk('public')->path($request->file);

        return response()->download($file);
    })->name('download');

    Route::get('/thong-bao', [\App\Http\Controllers\NotifyController::class, 'create'])->name('noti.create');
    Route::post('/thong-bao', [\App\Http\Controllers\NotifyController::class, 'store'])->name('noti.save');
    Route::post('/thong-bao/{id}', [\App\Http\Controllers\NotifyController::class, 'update'])->name('noti.update');
    Route::delete('/thong-bao/{id}', [\App\Http\Controllers\NotifyController::class, 'destroy'])->name('noti.delete');

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('get.user.login')->with('success', 'Đăng xuất thành công!');
    })->name('logout');
});

Route::get('/export/user/{id}', function (\Illuminate\Http\Request $request, $id) {
    $user = \App\Models\User::query()->find($id);
    $member = $user->member;
    $tasks = $member->tasks()->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
    )->with('creator', 'member', 'department')->with('creator')->get()->map(function ($task) {
        return [
            'name' => $task->name,
            'creator' => $task->creator->name,
            'product_length' => $task->product_length,
            'url_others' => $task->url_others,
            'created_at' => $task->created_at ? $task->created_at->format('d-m-Y') : '',
            'updated_at' => $task->updated_at ? $task->updated_at->format('d-m-Y') : '',
            'completed_at' => $task->completed_at ? $task->completed_at->format('d-m-Y') : '',
        ];
    });

    $params = [
        'data' => $tasks->toArray(),
        'title' => $user->member->name,
        'headings' => [
            'Tên yêu cầu',
            'Người giao',
            'Thời lượng',
            'Link hoàn thành',
            'Ngày tạo',
            'Ngày cập nhật',
            'Ngày hoàn thành',
        ],
        'rowMaps' => ['name', 'creator', 'product_length', 'url_others', 'created_at', 'updated_at', 'completed_at']
    ];

    $export = new \App\Exports\ExportData($params);

    return Excel::download($export, "$user->name.xlsx", \Maatwebsite\Excel\Excel::XLSX);
})->name('report.user');

Route::get('/export/department/{id}', function (\Illuminate\Http\Request $request, $id) {
    $department = \App\Models\Department::query()->find($id);

    $tasks = $department->tasks()->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
    )->with('creator', 'member', 'department')->with('creator', 'member')->get()->map(function ($task) {
        return [
            'name' => $task->name,
            'creator' => $task->creator->name,
            'member' => $task->member->name,
            'status_code' => $task->status_code,
            'product_length' => $task->product_length,
            'url_others' => $task->url_others,
            'created_at' => $task->created_at ? $task->created_at->format('d-m-Y') : '',
            'updated_at' => $task->updated_at ? $task->updated_at->format('d-m-Y') : '',
            'completed_at' => $task->completed_at ? $task->completed_at->format('d-m-Y') : '',
        ];
    });

    $params = [
        'data' => $tasks->toArray(),
        'title' => $department->name,
        'headings' => [
            'Tên yêu cầu',
            'Người giao',
            'Người thực hiện',
            'Tình trạng',
            'Thời lượng',
            'Link hoàn thành',
            'Ngày tạo',
            'Ngày cập nhật',
            'Ngày hoàn thành',
        ],
        'rowMaps' => ['name', 'creator', 'member', 'status_code', 'product_length', 'url_others', 'created_at', 'updated_at', 'completed_at']
    ];

    $export = new \App\Exports\ExportData($params);

    return Excel::download($export, "$department->name.xlsx", \Maatwebsite\Excel\Excel::XLSX);
})->name('report.department');

Route::get('/export/admin', function (\Illuminate\Http\Request $request) {
    $tasks = \App\Models\Task::query()->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
    )->with('creator', 'member', 'department')->get()->map(function ($task) {
        return [
            'name' => $task->name,
            'creator' => $task->creator->name,
            'member' => $task->member->name,
            'status_code' => $task->status_code,
            'product_length' => $task->product_length,
            'url_others' => $task->url_others,
            'created_at' => $task->created_at ? $task->created_at->format('d-m-Y') : '',
            'updated_at' => $task->updated_at ? $task->updated_at->format('d-m-Y') : '',
            'completed_at' => $task->completed_at ? $task->completed_at->format('d-m-Y') : '',
        ];
    });

    $params = [
        'data' => $tasks->toArray(),
        'title' => Carbon::now()->format('d-m-Y'),
        'headings' => [
            'Tên yêu cầu',
            'Người giao',
            'Người thực hiện',
            'Tình trạng',
            'Thời lượng',
            'Link hoàn thành',
            'Ngày tạo',
            'Ngày cập nhật',
            'Ngày hoàn thành',
        ],
        'rowMaps' => ['name', 'creator', 'member', 'status_code', 'product_length', 'url_others', 'created_at', 'updated_at', 'completed_at']
    ];

    $export = new \App\Exports\ExportData($params);

    return Excel::download($export, sprintf("%s.xlsx", Carbon::now()->format('d-m-Y')), \Maatwebsite\Excel\Excel::XLSX);
})->name('report.admin');

Route::get('/backup-user', function () {
    $export = new \App\Exports\Backup\BackupExport();

    return Excel::download($export, sprintf('%s.xlsx', Carbon::now()->format('d-m-Y')), \Maatwebsite\Excel\Excel::XLSX);
});

Route::post('/import-user', function (\Illuminate\Http\Request $request) {
    Excel::import(new \App\Imports\Backup\BackupImport(), $request->file('file')->store('temp'));

    return redirect()->back();
});
