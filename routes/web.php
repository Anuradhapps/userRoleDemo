<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'useradmin'], function () {
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('/panel/role', [RoleController::class, 'list']);
    Route::get('/panel/role/add', [RoleController::class, 'add']);
    Route::post('/panel/role/insert', [RoleController::class, 'insert']);
    Route::post('/panel/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('/panel/role/update/{id}', [RoleController::class, 'update']);
    Route::Delete('/panel/role/delete/{id}', [RoleController::class, 'delete']);

    Route::get('/panel/user', [UserController::class, 'list']);
    Route::get('/panel/user/add', [UserController::class, 'add']);
    Route::post('/panel/user/insert', [UserController::class, 'insert']);
    Route::post('/panel/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/panel/user/update/{id}', [UserController::class, 'update']);
    Route::Delete('/panel/user/delete/{id}', [UserController::class, 'delete']);
});
