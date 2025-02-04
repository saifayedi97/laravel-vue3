<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;


Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::put('/user', [ProfileController::class, 'update']);
});
Route::post('websites', [WebsiteController::class, 'store']);
Route::get('/websites', [WebsiteController::class, 'index']);
Route::get('/websites/{id}', [WebsiteController::class, 'show']);

