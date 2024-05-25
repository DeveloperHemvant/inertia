<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
    Route::resource('project', ProjectController::class)->names([
        'index' => 'project.index',
        'create' => 'project.create',
        'store' => 'project.store',
        'show' => 'project.show',
        'edit' => 'project.edit',
        'update' => 'project.update',
        'destroy' => 'project.destroy',
    ]);
    Route::resource('task', TaskController::class)->names([
        'index' => 'task.index',
        'create' => 'task.create',
        'store' => 'task.store',
        'show' => 'task.show',
        'edit' => 'task.edit',
        'update' => 'task.update',
        'destroy' => 'task.destroy',
    ]);
    Route::resource('user', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
