<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); 
Route::post('/register', [AuthController::class, 'register']); 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/retirar', [TransaccionController::class, 'retirar'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

/*
|--------------------------------------------------------------------------
| Rutas de Transacciones
|--------------------------------------------------------------------------
*/
Route::post('/retirar', [TransaccionController::class, 'retirar'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Ruta Principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login'); 
});