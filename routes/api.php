<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\PasienController;

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

//kategori
Route::get('/kategoris', [KategoriController::class, 'index']);
Route::get('/kategoris/{id}', [KategoriController::class, 'show']);
Route::post('/kategoris', [KategoriController::class, 'store']);
Route::put('/kategoris/{id}', [KategoriController::class, 'update']);
Route::delete('/kategoris/{id}', [KategoriController::class, 'destroy']);

Route::apiResource('tasks', TaskController::class);
Route::middleware('custom')->get('/dashboard', function () {
    return view('dashboard');
});



Route::resource('goals', GoalController::class);
Route::put('goals/{goal}/complete', [GoalController::class, 'markAsCompleted']);
Route::get('goals/search', [GoalController::class, 'search']);

Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/pasien/{id}', [PasienController::class, 'show']);
Route::post('/pasien', [PasienController::class, 'store']);
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'destroy']);

