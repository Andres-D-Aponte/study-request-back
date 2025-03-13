<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\StudyRequestController;
use App\Http\Controllers\StudyTypeController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('candidate')->group(function () {
        Route::post('', [CandidateController::class, 'create']);
        Route::put('/{id}', [CandidateController::class, 'update']);
        Route::get('', [CandidateController::class, 'findAll']);
        Route::delete('/{id}', [CandidateController::class, 'delete']);
    });

    Route::prefix('study-type')->group(function () {
        Route::post('', [StudyTypeController::class, 'create']);
        Route::put('/{id}', [StudyTypeController::class, 'update']);
        Route::get('', [StudyTypeController::class, 'findAll']);
        Route::delete('/{id}', [StudyTypeController::class, 'delete']);
    });

    Route::prefix('study-request')->group(function () {
        Route::post('', [StudyRequestController::class, 'create']);
        Route::put('/{id}', [StudyRequestController::class, 'update']);
        Route::get('', [StudyRequestController::class, 'findAll']);
        Route::delete('/{id}', [StudyRequestController::class, 'delete']);

        Route::put('/{id}/{status}', [StudyRequestController::class, 'updateStatus']);
    });
});