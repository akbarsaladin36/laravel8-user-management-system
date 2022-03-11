<?php

use App\Http\Controllers\Admin\AdminAllAttendancesController;
use App\Http\Controllers\Admin\AdminAllNotesController;
use App\Http\Controllers\Admin\AdminAllUsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [IndexController::class, 'index'])->name('main.index');


// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('auth.login.index');
Route::post('/login', [LoginController::class, 'store'])->name('auth.login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.store');

// Users
Route::get('/home', [HomeController::class, 'index'])->name('home.user');

Route::get('/profile', [UserController::class, 'show'])->name('profile.user');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit.user');
Route::patch('/profile/update', [UserController::class, 'update'])->name('profile.update.user');

Route::post('/home', [AttendanceController::class, 'store'])->name('attendance.store.user');
Route::get('/edit-notes/{id}', [AttendanceController::class, 'edit'])->name('attendance.edit.user');
Route::patch('/edit-notes/{id}/update', [AttendanceController::class, 'update'])->name('attendance.update.user');

Route::get('/logout', [HomeController::class, 'logout'])->name('user.logout');

// Admin 
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->name('home.admin');

Route::get('/admin/profile', [AdminController::class, 'show'])->name('profile.admin');
Route::get('/admin/profile/edit', [AdminController::class, 'edit'])->name('profile.edit.admin');
Route::patch('/admin/profile/update', [AdminController::class, 'update'])->name('profile.update.admin');

Route::get('/admin/all-users', [AdminAllUsersController::class, 'index'])->name('all-users.admin');
Route::get('/admin/all-users/create-user', [AdminAllUsersController::class, 'create'])->name('all-users.create.admin');
Route::post('/admin/all-users/create-user/create', [AdminAllUsersController::class, 'store'])->name('all-users.store.admin');
Route::delete('/admin/all-users/user/delete/{id}', [AdminAllUsersController::class, 'delete'])->name('all-users.delete.admin');

Route::get('/admin/all-notes', [AdminAllNotesController::class, 'index'])->name('all-notes.admin');
Route::get('/admin/all-notes/note/{id}', [AdminAllNotesController::class, 'show'])->name('all-notes.show.admin');
Route::delete('/admin/all-notes/note/delete/{id}', [AdminAllNotesController::class, 'delete'])->name('all-notes.delete.admin');

Route::get('/admin/all-attendances', [AdminAllAttendancesController::class, 'index'])->name('all-attendances.admin');
Route::delete('admin/all-attendances/delete/{id}', [AdminAllAttendancesController::class, 'delete'])->name('all-attendances.delete.admin');

Route::get('/admin/logout', [AdminHomeController::class, 'logout'])->name('admin.logout');