<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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




/*Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('books/create', [BookController::class, 'create'])->name('books.create'); //CREATE

Route::post('books/store', [BookController::class, 'store'])->name('books.store');

Route::get('books/show/{book}', [BookController::class, 'show'])->name('books.show'); //READ

Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit'); //UPDATE

Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');

Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy'); //DELETE*/