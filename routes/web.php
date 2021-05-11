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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'index'])->name('login_attempt');


Route::middleware('auth:web')->prefix('ap')->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('panel');
    Route::get('/point-of-sales', [PanelController::class, 'pointOfSales'])->name('pointOfSales');
    Route::post('/point-of-sales', [PanelController::class, 'pointOfSales'])->name('pointOfSales.createOrUpdate');
    Route::delete('/point-of-sales', [PanelController::class, 'pointOfSales'])->name('pointOfSales.delete');
    Route::get('/products', [PanelController::class, 'products'])->name('products');
    Route::post('/products', [PanelController::class, 'createOrUpdateProduct'])->name('products.createOrUpdateProduct');
    Route::delete('/products/{product}', [PanelController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/products/form', [PanelController::class, 'productForm'])->name('productForm');
    Route::get('/products/{product}', [PanelController::class, 'getProduct'])->name('product.get');

});
