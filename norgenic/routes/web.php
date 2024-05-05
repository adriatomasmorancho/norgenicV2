<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BookstoreController;

Route::get('/bookstore', [BookstoreController::class, 'index'])->name('bookstore');

Route::get('/bookstore/'.env('APP_LOCALE').'/authors', [AuthorController::class, 'index'])->name('authors');

Route::get('/bookstore/'.env('APP_LOCALE').'/authors/create', [AuthorController::class, 'create'])->name('authors.create');

Route::post('/bookstore/'.env('APP_LOCALE').'/authors/store',  [AuthorController::class, 'store'])->name('authors.store');

Route::get('/bookstore/'.env('APP_LOCALE').'/authors/{id}/edit',  [AuthorController::class, 'edit'])->name('authors.edit');

Route::post('/bookstore/'.env('APP_LOCALE').'/authors/update/{id}',  [AuthorController::class, 'update'])->name('authors.update');

Route::get('/bookstore/'.env('APP_LOCALE').'/authors/remove/{id}',  [AuthorController::class, 'destroy'])->name('authors.remove');

Route::get('/bookstore/'.env('APP_LOCALE').'/books', [BookController::class, 'index'])->name('books');

Route::get('/bookstore/'.env('APP_LOCALE').'/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/bookstore/'.env('APP_LOCALE').'/books/store',  [BookController::class, 'store'])->name('books.store');

Route::get('/bookstore/'.env('APP_LOCALE').'/books/{id}/edit',  [BookController::class, 'edit'])->name('books.edit');

Route::post('/bookstore/'.env('APP_LOCALE').'/books/update/{id}',  [BookController::class, 'update'])->name('books.update');

Route::get('/bookstore/'.env('APP_LOCALE').'/books/remove/{id}',  [BookController::class, 'destroy'])->name('books.remove');

Route::post('/bookstore/language', [LanguageController::class, 'changeAppLocaleTo'])->name('language');

Route::get('/bookstore/'.env('APP_LOCALE').'/genericError/', [ErrorController::class, 'viewGenericError'])->name('error.generic');

Route::get('/bookstore/'.env('APP_LOCALE').'/authorError/', [ErrorController::class, 'viewAuthorError'])->name('error.author');

Route::get('/bookstore/'.env('APP_LOCALE').'/bookError/', [ErrorController::class, 'viewBookError'])->name('error.book');

Route::fallback(function () {
    return redirect()->route('error.generic');
});