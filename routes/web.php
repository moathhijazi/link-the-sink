<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routers ;
use App\Http\Controllers\Authentication ;
use App\Http\Controllers\provider_authentication ;
use App\Http\Controllers\chart ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Routers::class , 'home'])->name('home');
Route::get('/login', [Routers::class , 'login'])->name('login');
Route::get('/register', [Routers::class , 'register'])->name('register');
Route::get('/verify-reset', [Routers::class , 'verify_reset'])->name('verify_reset');
Route::get('/new-password', [Routers::class , 'new_password'])->name('new_password');
Route::get('/logout', [Authentication::class , 'logout'])->name('logout');
Route::get('/auth/google/redirect', [provider_authentication::class , 'google'])->name('google');
Route::get('/googleback', [provider_authentication::class , 'google_callback'])->name('google_callback');
Route::get('/auth/github/redirect', [provider_authentication::class , 'github'])->name('github');
Route::get('/gitback', [provider_authentication::class , 'github_callback'])->name('github_callback');
Route::get('/new', [Routers::class , 'new'])->name('new');
Route::get('/own', [Routers::class , 'own'])->name('own');
Route::get('/jobseekers', [Routers::class , 'jobseekers'])->name('jobseekers');
Route::get('/posts', [Routers::class , 'posts'])->name('posts');
Route::get('/verify', [Authentication::class , 'verify'])->name('verify');
Route::get('/forgot', [Authentication::class , 'forgot'])->name('forgot');
Route::get('/sink/{username}', [Routers::class , 'profile'])->name('profile');
Route::get('/show/{id}', [Routers::class , 'show'])->name('show');
Route::get('/hire/{pid}', [Routers::class , 'hire'])->name('hire');
Route::get('/notifications', [Routers::class , 'notifications'])->name('notifications');
Route::get('/admin', [Routers::class , 'admin'])->name('admin');
Route::get('/admin/requests', [Routers::class , 'admin_requests'])->name('admin_requests');
Route::get('/admin/call-center', [Routers::class , 'call_center'])->name('call');
Route::get('/admin/new-post', [Routers::class , 'admin_post'])->name('admin_post');
Route::get('/admin/users', [Routers::class , 'admin_users'])->name('all_users');
Route::get('/admin/new-user', [Routers::class , 'admin_new_user'])->name('new_user');
Route::get('/admin/new-admin', [Routers::class , 'admin_new_admin'])->name('new_admin');
Route::get('/admin/edit', [Routers::class , 'admin_edit'])->name('edit');
Route::get('/admin/all-posts', [Routers::class , 'admin_all_posts'])->name('admin_all_posts');

