<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register_staff', function () {
    return view('auth.register_staff');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('services', ServiceController::class);
        Route::resource('staffs', StaffController::class);
        Route::resource('admins', AdminController::class);
    });
    Route::group(['middleware' => ['role:admin|staff|user']], function () {
        Route::resource('complaints', ComplaintController::class);
    });
});
require __DIR__ . '/auth.php';
