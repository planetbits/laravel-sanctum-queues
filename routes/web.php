<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Log;

Route::get('/send-email', function () {
    Log::info('Attempting to dispatch job');
    // SendEmail::dispatch('user@example.com');
    SendEmail::dispatch('user@example.com')->onQueue('high_priority');

    Log::info('Job dispatched');
    return 'Email job dispatched';
});

Route::get('/queue/pending', [QueueController::class, 'showPendingJobs']);
