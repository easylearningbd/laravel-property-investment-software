<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Http\Controllers\Admin\PropertyController;

Route::get('/', function () {
    return view('welcome');
});

/// Only User Role Access Started

Route::middleware(['auth', IsUser::class])->group(function(){

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); 


});

/// End User Role Access Started





/// Only Admin Role Access Started

Route::middleware(['auth', IsAdmin::class])->group(function(){

 Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');  
 Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
 Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

 Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
 Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');


Route::controller(PropertyController::class)->group(function(){
    Route::get('/all/times', 'AllTimes')->name('all.times');
    Route::get('/add/times', 'AddTimes')->name('add.times');

});





});

/// End Admin Role Access Started










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

require __DIR__.'/auth.php';
