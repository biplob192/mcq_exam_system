<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;

// Auth Route Start
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh'])->middleware(['auth:sanctum', 'refreshAbility']);


// Route::get('/subjects', [SubjectController::class, 'index'])->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum', 'accessAbility'])->group(function () {
    Route::get('/token', [AuthController::class, 'tokenStatus']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Auth Route End

    // Subjects Route Start
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/subjects/{id}', [SubjectController::class, 'show']);
    Route::post('/subjects', [SubjectController::class, 'store']);
    Route::put('/subjects/{id}', [SubjectController::class, 'update']);
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);
    // Subjects Route End

    // Questions Route Start
    Route::get('/questions', [QuestionController::class, 'index']);
    Route::get('/questions/{id}', [QuestionController::class, 'show']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::put('/questions/{id}', [QuestionController::class, 'update']);
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);
    // Questions Route End

});
