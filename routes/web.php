<?php

use App\Http\Controllers\Admin\Categorycontroller;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/company', AdminCompanyController::class)->names('company');
    Route::resource('/category', Categorycontroller::class)->names('category');
});

require __DIR__.'/auth.php';
