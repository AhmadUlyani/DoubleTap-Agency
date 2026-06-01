<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminClientController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.process');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/clients', [AdminClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [AdminClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [AdminClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [AdminClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [AdminClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [AdminClientController::class, 'destroy'])->name('clients.destroy');
});