<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// USER
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Menu & Order untuk user
    Route::get('/menu', [UserMenuController::class, 'index'])->name('menu.index');
    Route::get('/order', [UserOrderController::class, 'index'])->name('order.index');
    Route::post('/order', [UserOrderController::class, 'store'])->name('order.store');
});

// ADMIN
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/menu', AdminMenuController::class);
    Route::resource('/order', AdminOrderController::class);
    Route::post('/order/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
});

//Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
});