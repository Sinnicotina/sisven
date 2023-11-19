<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\ComunaController;
use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comunas',[ComunaController::class, 'index'])->name('comunas');

Route::get('/customers',[CustomerController::class, 'index'])->name('customers');
Route::post('/customers',[CustomerController::class, 'store'])->name('customers.store');
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{customer}',[CustomerController::class, 'show'])->name('customers.show');
Route::put('/customers/{customer}',[CustomerController::class, 'update'])->name('customers.update');



Route::get('/categories',[CategoryController::class, 'index'])->name('categories');