<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('home');

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('articles', \App\Http\Controllers\User\UserArticlesPage::class)->name('articles');
});

Route::resources([
    'articles' => \App\Http\Controllers\ArticleController::class,
]);

require __DIR__.'/auth.php';
