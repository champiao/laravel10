<?php

use App\Http\Controllers\seriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Middleware\OwnCors;


Route::get('/', function () {
    return redirect('/series');
});
Route::middleware(OwnCors::class)->group(function () {
    Route::resource('series', seriesController::class)->except(['show']);
});
Route::get('/users/login',[User::class,'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [User::class, 'getUser'])->name('user')->middleware('auth');
    Route::get('/users/all', [User::class, 'getAll'])->name('users.all')->middleware('auth');
});

// Route::middleware('guest')->group(function () {
//     Route::get('/users/all', function () {
//         return redirect('/users/login');//->route('users/login');
//     })->name('users.all');
// });
Route::post('/users/auth',[User::class,'auth']);
Route::get('/users/auth', [User::class, 'auth']);
Route::get('/users/all', [User::class, 'getAll'])->name('users.all');
Route::get('users/login', [ User::class, 'login'])->name('users.login');
Route::get('/users/create', [User::class, 'create']);
Route::post('/users/store', [User::class, 'store']);
Route::delete('/users/delete/{id}', [User::class, 'destroy'])->name('user.destroy');
