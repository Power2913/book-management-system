<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;

Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::get('/bookdetail/{id}', [BookController::class, 'bookdetail'])->name('bookdetail');

Route::post('/books/{id}/comments', [BookController::class, 'storeComment'])->name('books.storeComment');

Route::post('/books/{id}/rating', [BookController::class, 'updateRating'])->name('books.updateRating');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [LoginController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
