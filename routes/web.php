<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('home');
        // Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
        // Route::get('/profile/edit', [MemberController::class, 'editProfile'])->name('editProfile');
        // Route::put('/profile/update', [MemberController::class, 'updateProfile'])->name('updateProfile');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
