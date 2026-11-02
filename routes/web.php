<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserRoleController;

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
});


// Route daftar buku: semua role yang sudah login
Route::middleware(['auth', 'can:books.view'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])
        ->name('books.index');
});

// Route tambah buku: Admin dan Dosen
Route::middleware(['auth', 'can:books.create'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');
});

// Route edit buku: Admin dan Dosen
Route::middleware(['auth', 'can:books.edit'])->group(function () {
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->name('books.edit');

    Route::put('/books/{book}', [BookController::class, 'update'])
        ->name('books.update');
});

// Route hapus buku: Admin saja
Route::middleware(['auth', 'can:books.delete'])->group(function () {
    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->name('books.destroy');
});

// Pengelolaan Role Pengguna (Khusus Admin)
Route::middleware(['auth', 'permission:users.manage-roles'])->group(function () {
    Route::get('/users/roles', [UserRoleController::class, 'index'])
        ->name('users.roles.index');

    Route::put('/users/{user}/role', [UserRoleController::class, 'update'])
        ->name('users.roles.update');
});

require __DIR__.'/auth.php';
