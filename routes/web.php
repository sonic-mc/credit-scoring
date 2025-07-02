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

// Default route redirects to form
Route::get('/', [CreditScoreController::class, 'showForm'])->name('credit.form');

// Handle form submission and send to Flask API
Route::post('/predict', [CreditScoreController::class, 'predict'])->name('credit.predict');

Route::get('/credit-score', [CreditScoreController::class, 'showForm'])->name('credit.form');
Route::post('/credit-score/predict', [CreditScoreController::class, 'predict'])->name('credit.predict');

