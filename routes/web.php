<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexSingleAction;
use App\Http\Middleware\EnsureUserIsAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/', IndexSingleAction::class)->name('index');

Route::get('/create', [UserController::class, 'createform'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');

Route::get('/view/{id}', [UserController::class, 'view'])->name('view');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/update', [UserController::class, 'update'])->name('update');

Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');  

});

Route::get('/guest  ', function(){
    return view('layouts.guest');
})->name('guest'); 