<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

Route::get('/', [CalculatorController::class, 'index'])->name('home');
Route::get('/operation/{operation}', [CalculatorController::class, 'showOperation'])->name('operation');
Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculate');
Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculate');


