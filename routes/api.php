<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\MathGameController;
use App\Http\Controllers\Api\AssignClassController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Pupil-specific routes
    Route::get('/myclass-pupils', [ApiAssignClassController::class, 'myclassPupils']);
    Route::get('/mylesson-pupils/{class_id}', [ApiAssignClassController::class, 'mylessonPupils']);
    Route::get('/view-quizzes/{class_id}', [ApiAssignClassController::class, 'viewQuizzes']);

    Route::get('/quiz/{id}', [ApiQuizController::class, 'show']);
    Route::post('/quiz/submit/{quizId}', [ApiQuizController::class, 'submit']);

    Route::get('/rewards', [ApiRewardController::class, 'index']);
    Route::post('/rewards/claim/{rewardId}', [ApiRewardController::class, 'claim']);

    Route::get('/math-game', [ApiMathGameController::class, 'index']);
    Route::post('/math-game/submit', [ApiMathGameController::class, 'submit']);
});


