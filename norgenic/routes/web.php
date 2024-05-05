<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BookstoreController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::get('/bookstore', [BookstoreController::class, 'index'])->name('bookstore');

Route::get('/bookstore/{locale}/authors', [AuthorController::class, 'index'])->name('authors');

Route::get('/bookstore/{locale}/authors/create', [AuthorController::class, 'create'])->name('authors.create');

Route::post('/bookstore/{locale}/authors/store',  [AuthorController::class, 'store'])->name('authors.store');

Route::get('/bookstore/{locale}/authors/{id}/edit',  [AuthorController::class, 'edit'])->name('authors.edit');

Route::post('/bookstore/{locale}/authors/update/{id}',  [AuthorController::class, 'update'])->name('authors.update');

Route::get('/bookstore/{locale}/authors/remove/{id}',  [AuthorController::class, 'destroy'])->name('authors.remove');

Route::get('/bookstore/{locale}/books', [BookController::class, 'index'])->name('books');

Route::get('/bookstore/{locale}/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/bookstore/{locale}/books/store',  [BookController::class, 'store'])->name('books.store');

Route::get('/bookstore/{locale}/books/{id}/edit',  [BookController::class, 'edit'])->name('books.edit');

Route::post('/bookstore/{locale}/books/update/{id}',  [BookController::class, 'update'])->name('books.update');

Route::get('/bookstore/{locale}/books/remove/{id}',  [BookController::class, 'destroy'])->name('books.remove');

Route::post('/bookstore/language', [LanguageController::class, 'changeAppLocaleTo'])->name('language');

Route::get('/bookstore/{locale}/genericError/', [ErrorController::class, 'viewGenericError'])->name('error.generic');

Route::get('/bookstore/{locale}/authorError/', [ErrorController::class, 'viewAuthorError'])->name('error.author');

Route::get('/bookstore/{locale}/bookError/', [ErrorController::class, 'viewBookError'])->name('error.book');

Route::fallback(function () {
    return redirect()->route('error.generic');
});

});