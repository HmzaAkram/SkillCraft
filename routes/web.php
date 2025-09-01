<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\NoteController as AdminNoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home / Dashboard
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

Route::get('/notes',function(){
    return view('notes.index');
})->name('notes');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
// AI recommendation
Route::post('/ai/recommend', [AIController::class, 'recommend'])->name('ai.recommend');

// Skill Roadmap
Route::get('/roadmap/{id}', [RoadmapController::class, 'show'])->name('roadmap.show');

// User Progress
Route::get('/progress', [UserController::class, 'trackProgress'])->name('user.progress');

// Home + Chatbot
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Chatbot (only logged-in users)
Route::middleware(['auth'])->group(function () {
    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');
    Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');
});

// Notes (User side)
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
});

// Auth Routes
Auth::routes();

// =====================
// ✅ ADMIN ROUTES
// =====================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return "Welcome Admin Panel";
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::patch('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Notes (Admin CRUD)
    Route::get('/notes', [AdminNoteController::class, 'index'])->name('admin.notes.index');
    Route::get('/notes/create', [AdminNoteController::class, 'create'])->name('admin.notes.create');
    Route::post('/notes', [AdminNoteController::class, 'store'])->name('admin.notes.store');
    Route::get('/notes/{note}/edit', [AdminNoteController::class, 'edit'])->name('admin.notes.edit');
    Route::put('/notes/{note}', [AdminNoteController::class, 'update'])->name('admin.notes.update');
    Route::delete('/notes/{note}', [AdminNoteController::class, 'destroy'])->name('admin.notes.destroy');
});
