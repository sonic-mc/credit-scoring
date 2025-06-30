<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CreditScoreController::class, 'index']);


Route::get('/credit-score', [CreditScoreController::class, 'index']);
Route::post('/credit-score/predict', [CreditScoreController::class, 'predict']);
