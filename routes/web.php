<?php

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
});

require __DIR__.'/auth.php';
