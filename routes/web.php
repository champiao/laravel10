<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use Fruitcake\Cors\HandleCors;

Route::get('/', function () {
    return redirect('/series');
});
Route::resource('series', SeriesController::class)->except(['show']);

Route::get('/users/login',[User::class,'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [User::class, 'getUser'])->name('user')->middleware('auth');
    Route::get('/users/all', [User::class, 'getAll'])->name('users.all')->middleware('auth');
});

Route::middleware('guest')->group(function () {
    Route::get('/users/all', function () {
        return redirect('/users/login');//->route('users/login');
    })->name('users.all');
});
Route::post('/users/auth',[User::class,'auth']);
Route::get('/users/auth', [User::class, 'auth']);
Route::get('/users/create', [User::class, 'create']);
Route::post('/users/store', [User::class, 'store']);
Route::post('/users/delete/{id}', [User::class, 'destroy']);
