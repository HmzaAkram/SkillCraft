<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// // Home / Dashboard

// Route::get('/', [CareerController::class, 'dashboard'])->name('dashboard');
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/notes', function () {
    return view('notes');
})->name('notes');


// AI recommendation
Route::post('/ai/recommend', [AIController::class, 'recommend'])->name('ai.recommend');

// Skill Roadmap
Route::get('/roadmap/{id}', [RoadmapController::class, 'show'])->name('roadmap.show');

// User Progress
Route::get('/progress', [UserController::class, 'trackProgress'])->name('user.progress');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');
Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');


Auth::routes();
