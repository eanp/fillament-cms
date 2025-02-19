<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base'))
    ->prefix(config('filament.path'))
    ->group(function () {
        Route::get('/register', [App\Filament\Pages\Auth\Register::class, 'register'])
            ->name('filament.auth.register');
    });
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
