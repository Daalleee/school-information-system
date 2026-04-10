<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Only for non-authenticated users)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Login Route
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Logout Route
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // Dashboard - Redirect based on role
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru' => redirect()->route('guru.dashboard'),
            'operator' => redirect()->route('operator.dashboard'),
            default => redirect()->route('home'),
        };
    })->name('dashboard');

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Guru Dashboard
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    })->name('guru.dashboard');

    // Operator Dashboard
    Route::get('/operator/dashboard', function () {
        return view('operator.dashboard');
    })->name('operator.dashboard');
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// School Pages
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/guru', function () {
    return view('guru');
})->name('guru');

Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('fasilitas');

Route::get('/kemitraan', function () {
    return view('kemitraan');
})->name('kemitraan');

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/pengumuman', function () {
    return view('pengumuman');
})->name('pengumuman');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
