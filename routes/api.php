<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\ADMIN;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login' , [Authentication::class , 'login'])->name('auth_login');
Route::post('/register' , [Authentication::class , 'register'])->name('auth_register');
Route::post('/forgot' , [Authentication::class , 'forgot_code'])->name('forgot_code');
Route::post('/new-password' , [Authentication::class , 'new_password'])->name('new_password');
Route::post('/complete' , [API::class , 'complete'])->name('complete');
Route::post('/submit-post' , [API::class , 'submit_post'])->name('submit_post');
Route::post('/delete_post' , [API::class , 'delete_post'])->name('delete_post');
Route::post('/verify' , [API::class , 'verify'])->name('verify');
Route::post('/verify-code' , [API::class , 'verify_code'])->name('verify_code');
Route::post('/apply' , [API::class , 'apply'])->name('apply');
Route::post('/remove-alert' , [API::class , 'remove_alert'])->name('remove_alert');
Route::post('/show_apply' , [API::class , 'show_apply'])->name('show_apply');
Route::post('/delete_own_apply' , [API::class , 'delete_own_apply'])->name('delete_own_apply');
Route::post('/image_change' , [API::class , 'image_change'])->name('image_change');
Route::post('/skills' , [API::class , 'skills'])->name('skills');
Route::post('/admin-accept-post' , [ADMIN::class , 'accept_post'])->name('accept_post');
Route::post('/admin-reject-post' , [ADMIN::class , 'reject_post'])->name('reject_post');
Route::post('/admin-message' , [ADMIN::class , 'message'])->name('message');
Route::post('/admin-post' , [ADMIN::class , 'post'])->name('admin_post');
Route::post('/admin-block' , [ADMIN::class , 'block'])->name('block');
Route::post('/admin-update' , [ADMIN::class , 'update'])->name('update');
Route::post('/admin-delete-user' , [ADMIN::class , 'delete_user'])->name('delete_user');
Route::post('/admin-new-admin' , [ADMIN::class , 'new_admin'])->name('new_admin');
Route::post('/admin-new-search' , [ADMIN::class , 'new_admin_search'])->name('new_admin_search');
Route::post('/admin-new-user' , [ADMIN::class , 'new_user'])->name('new_users');
