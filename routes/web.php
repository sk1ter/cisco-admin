<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login_page');
Route::post('/login', [AuthController::class, 'index'])->name('login_attempt');

Route::get('ap', [PanelController::class, 'index']);