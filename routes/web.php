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

Route::get('/users/create', function () {
    return Inertia::render('Users/CreatePage');
});

Route::post('/users', function () {
    // Validate and create the user
    $attributes = request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // User::create([
    //     'name' => request('name'),
    //     'email' => request('email'),
    //     'password' => bcrypt(request('password')),
    // ]);

    User::create($attributes);

    return redirect('/users');
});

Route::get('/users/{user}/edit', function (User $user) {
    return inertia('Users/EditPage', [
        'user' => $user,
    ]);
});

Route::put('/users/{user}', function (User $user) {
    // Validate and update the user
    $attributes = request()->validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        'password' => ['nullable', 'min:6'],
    ]);

    if ($attributes['password']) {
        $attributes['password'] = bcrypt($attributes['password']);
    } else {
        unset($attributes['password']);
    }

    $user->update($attributes);

    return redirect('/users');
});

Route::delete('/users/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    
    return redirect()->back();
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

