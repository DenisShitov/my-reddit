<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('home');

Route::resources([
    'articles' => \App\Http\Controllers\ArticleController::class,
]);

require __DIR__.'/auth.php';
