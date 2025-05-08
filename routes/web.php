<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FormBookController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/books', [BookController::class, 'index'])->name('books'); 
Route::post('/books/search', [BookController::class, 'searchBook'])->name('books.search');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/formbooks', [FormBookController::class, 'index'])->name('booksform');
    Route::post('/formbooks/create', [FormBookController::class, 'store'])->name('books.store');

    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('books.update');  
    Route::get('/books/{id}/delete', [BookController::class, 'destroy'])->name('books.delete');

});


require __DIR__.'/auth.php';
