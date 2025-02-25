<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ApiAuthenticatedSessionController;
use App\Http\Controllers\Api\QueueController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/queue/pending0', [QueueController::class, 'getPendingJobs']);

Route::post('/register', [RegisteredUserController::class, 'apiStore']);
Route::post('/login', [ApiAuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/queue/pending', [QueueController::class, 'getPendingJobs']);
    Route::post('/logout', [ApiAuthenticatedSessionController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
