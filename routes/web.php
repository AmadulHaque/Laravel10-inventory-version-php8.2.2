<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

// admin profile
Route::get('/admin/profile',[AdminController::class, 'adminProfile'])->middleware(['auth', 'verified'])->name('admin.profile');
Route::post('/admin/profile/update',[AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
  Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
Route::get('/dashboard',[AdminController::class, 'adminDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

  


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
