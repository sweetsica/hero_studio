<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/__health/start', function () {
    return 'ok';
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'createUser']);
    Route::post('login', [AuthController::class, 'loginUser']);

    // Role
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-role', [AuthController::class, 'getRoleUser']);
        Route::post('set-role', [AuthController::class, 'setRoleUser']);
    });

    Route::middleware('kols')->group(function () {

    });

    Route::middleware('cof')->group(function () {

    });

    Route::middleware('editor')->group(function () {

    });
});

Route::resource('categories', \App\Http\Controllers\Api\CategoryController::class);
Route::resource('posts', \App\Http\Controllers\Api\PostController::class);
Route::resource('departments', \App\Http\Controllers\Api\DepartmentController::class);


/** Require token */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/__health', function () {
        return 'ok';
    });
});
