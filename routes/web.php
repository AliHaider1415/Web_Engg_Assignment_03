<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/services', function () {
    return view('services');
})->middleware(['auth', 'verified'])->name('services');

// Route::get('/trainings', function () {
//     return view('trainings');
// })->middleware(['auth', 'verified'])->name('trainings');

Route::get('/contact_us', function () {
    return view('contact_us');
})->middleware(['auth', 'verified'])->name('contact_us');

Route::get('/about_us', function () {
    return view('about_us');
})->middleware(['auth', 'verified'])->name('about_us');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Get all courses for the authenticated user
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

    // Display the form to create a new course (view: courses/create.blade.php)
    Route::get('/courses/create', function () {
        return view('courses.create');
    })->name('courses.create');

    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


    Route::put('/courses/{id}', [CourseController::class, 'edit'])->name('courses.edit');
    
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


    Route::get('/trainings', [TrainingController::class, 'index'])->name('trainings.index');
    
    // Create a new training
    Route::get('/trainings/create', [TrainingController::class, 'create'])->name('trainings.create');
    Route::post('/trainings', [TrainingController::class, 'store'])->name('trainings.store');

    // Edit a training
    Route::get('/trainings/{id}/edit', [TrainingController::class, 'edit'])->name('trainings.edit');
    Route::put('/trainings/{id}', [TrainingController::class, 'update'])->name('trainings.update');
    
    // Delete a training
    Route::delete('/trainings/{id}', [TrainingController::class, 'destroy'])->name('trainings.destroy');


    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


});






require __DIR__.'/auth.php';
