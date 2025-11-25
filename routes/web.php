<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;

Route::get('/', [TweetController::class, 'index'])->name('tweets.index');

Route::resource('tweets', TweetController::class)->except(['index', 'create']);

Route::post('/tweets', [TweetController::class, 'store'])
    ->name('tweets.store')
    ->middleware('auth');

Route::post('/tweets/{tweet}/toggle-like', [LikeController::class, 'toggle'])
    ->name('tweets.toggle-like')
    ->middleware('auth');

Route::get('/profiles/{user}', [ProfileController::class, 'show'])
    ->name('profiles.show');

