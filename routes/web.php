<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GuideUserController;
use App\Http\Controllers\GuideController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/tasks');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Routes (index[GET], create[GET], store[POST], show[GET], edit[GET], update[PUT], destroy[DELETE])
Route::middleware('auth', 'verified')->group(function () {
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
