<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GuideUserController;
use App\Http\Controllers\GuideController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Routes (index[GET], create[GET], store[POST], show[GET], edit[GET], update[PUT], destroy[DELETE])
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    
    Route::resource('books', BookController::class);
    Route::get('/notes/create/{book}', [NoteController::class, 'create'])->name('notes.create');
    Route::post('notes/store/{book}', [NoteController::class, 'store'])->name('notes.store');
    Route::resource('notes', NoteController::class)->except(['create','store']);
    
    Route::delete('guide_users/show/{guide}',  [GuideUserController::class, 'destroy'])->name('guide_users.destroy');
    Route::get('guide_users/show/{guide}', [GuideUserController::class, 'show'])->name('guide_users.show');
    Route::resource('guide_users', GuideUserController::class)->except(['create','edit','update','show','destroy']);

    Route::resource('guides', GuideController::class);
});
