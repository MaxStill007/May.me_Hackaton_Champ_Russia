<?php

use App\Http\Controllers\CompetitionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompetitionController::class, 'index']);
Route::post('/script', [CompetitionController::class, 'script']);

