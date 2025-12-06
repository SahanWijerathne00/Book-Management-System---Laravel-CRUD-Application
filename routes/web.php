<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookBorrowingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);
Route::resource('users', UserController::class);

Route::prefix('borrowings')->name('borrowings.')->group(function () {
    Route::get('/', [BookBorrowingController::class, 'index'])->name('index');
    Route::get('/create', [BookBorrowingController::class, 'create'])->name('create');
    Route::post('/', [BookBorrowingController::class, 'store'])->name('store');
    Route::post('/{borrowing}/return', [BookBorrowingController::class, 'return'])->name('return');
});

