<?php

use App\Models\User;
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
        'time' => now()->toDateTimeString(),
    ]);
});

Route::get('/users', function () {
    return Inertia::render('Users/IndexPage', [
        'users' => User::query()
            ->when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))
            ->paginate(5)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]),
        'filters' => request()->only(['search']),
    ]);
});

# For simple pages without controller logic:
// Route::inertia('/about', 'About');

Route::get('/about', function () {
    return Inertia::render('AboutPage', [
        'title' => 'About Page',
    ]);
});

Route::get('/contact', function () {
    return Inertia::render('ContactPage', [
        'title' => 'Contact Page',
    ]);
});

Route::post('/logout', function () {
    // Perform logout logic here (e.g., Auth::logout())
    // return redirect('/')->with('message', 'Logged out successfully');
    dd('Logged out successfully', request('foo'));
});

