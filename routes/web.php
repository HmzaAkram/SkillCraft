<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\RoadmapController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\NoteController as AdminNoteController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\ContactController; // For frontend contact form
use App\Http\Controllers\Admin\ContactController as AdminContactController; // For admin panel


/*
|-------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
*/

// Public Routes
Route::get('/community', [CommunityController::class, 'index'])->name('community');
Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');

// AI recommendation
Route::post('/ai/recommend', [AIController::class, 'recommend'])->name('ai.recommend');

// Skill Roadmap
Route::get('/roadmap/{id}', [RoadmapController::class, 'show'])->name('roadmap.show');

// Auth Routes
Auth::routes(['verify' => true]);

// User Panel Routes (Authenticated)
Route::middleware(['auth' , 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
 Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{id}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    Route::post('/courses/{courseId}/lessons/{lessonId}/complete', [CourseController::class, 'completeLesson'])->name('courses.lesson.complete');
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress');
    Route::get('/certifications', [CertificationController::class, 'index'])->name('certifications.index');
    Route::get('/certifications/{id}/download', [CertificationController::class, 'download'])->name('certifications.download');
    Route::post('/chatbot/handle', [ChatbotController::class, 'handleMessage'])->name('chatbot.handle');
Route::delete('/chatbot/clear', [ChatbotController::class, 'clearHistory'])->name('chatbot.clear');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/courses/{id}/mcq-test', [CourseController::class, 'showMcqTest'])->name('courses.mcq.test');
    Route::post('/courses/{id}/submit-mcq', [CourseController::class, 'submitMcq'])->name('courses.mcq.submit');
    Route::post('/community/post', [CommunityController::class, 'storePost'])->name('community.post.store');
Route::post('/community/comment/{postId}', [CommunityController::class, 'storeComment'])->name('community.comment.store');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::patch('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/notes', [AdminNoteController::class, 'index'])->name('admin.notes.index');
    Route::get('/notes/create', [AdminNoteController::class, 'create'])->name('admin.notes.create');
    Route::post('/notes', [AdminNoteController::class, 'store'])->name('admin.notes.store');
    Route::get('/notes/{note}/edit', [AdminNoteController::class, 'edit'])->name('admin.notes.edit');
    Route::put('/notes/{note}', [AdminNoteController::class, 'update'])->name('admin.notes.update');
    Route::delete('/notes/{note}', [AdminNoteController::class, 'destroy'])->name('admin.notes.destroy');
    Route::get('/courses', [CourseController::class, 'adminIndex'])->name('admin.courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::get('/courses/{course}/mcqs', [CourseController::class, 'adminMcqsIndex'])->name('admin.mcqs.index');
    Route::get('/courses/{course}/mcqs/create', [CourseController::class, 'adminMcqCreate'])->name('admin.mcqs.create');
    Route::post('/courses/{course}/mcqs', [CourseController::class, 'adminMcqStore'])->name('admin.mcqs.store');
    Route::get('/courses/{course}/mcqs/{mcq}/edit', [CourseController::class, 'adminMcqEdit'])->name('admin.mcqs.edit');
    Route::put('/courses/{course}/mcqs/{mcq}', [CourseController::class, 'adminMcqUpdate'])->name('admin.mcqs.update');
    Route::delete('/courses/{course}/mcqs/{mcq}', [CourseController::class, 'adminMcqDestroy'])->name('admin.mcqs.destroy');
});// Public Blog Routes
Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');

// Admin Blog Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blogs.store');
});
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('blogs', BlogController::class);
});
// Contact form submit (Frontend)
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Admin - Manage contacts
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy']);
});
