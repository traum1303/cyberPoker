<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/board', function (){
    return view('board');
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'indexLogout']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::resource('tournaments', TournamentController::class)->only(['create', 'edit', 'store', 'index']);
//    Route::resource('account', User::class)->only(['index', 'edit', 'store']);

//    Route::get('users/{user}/roles/{role}', [UsersController::class, 'changeRole'])->scopeBindings()->name('users.change-role');
//    Route::get('users/{user}/districts/{district}', [UsersController::class, 'changeDistrict'])->scopeBindings()->name('users.change-district');
});
