<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('HomePage', [
        'name' => 'John Doe',
        'email' => 'john@me.com',
        'title' => 'Home Page', 
    ]);
});

