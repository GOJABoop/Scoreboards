<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Routes to books (index[GET], create[GET], store[POST], show[GET], edit[GET], update[PUT], destroy[DELETE])
Route::resource('books', BookController::class);

Route::resource('notes', NoteController::class);

/*Route::get('/notes/{book}', [NoteController::class, 'index'])->name('notes.index');

Route::get('{book}/notes/create', [NoteController::class, 'create'])->name('notes.create');

Route::post('notes/store', [NoteController::class, 'store'])->name('notes.store');

Route::get('notes/show/{note}', [NoteController::class, 'show'])->name('notes.show'); //READ

Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit'); //UPDATE

Route::put('notes/{note}', [NoteController::class, 'update'])->name('notes.update');

Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy'); //DELETE

/*Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('books/create', [BookController::class, 'create'])->name('books.create'); //CREATE

Route::post('books/store', [BookController::class, 'store'])->name('books.store');

Route::get('books/show/{book}', [BookController::class, 'show'])->name('books.show'); //READ

Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit'); //UPDATE

Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');

Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy'); //DELETE*/