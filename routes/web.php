<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\PpdbPublicController;
use App\Http\Controllers\KontakPublicController;
use App\Http\Controllers\Admin\{
    AdminDashboardController,
    AdminUserController,
    AdminGuruController,
    AdminSiswaController,
    AdminBeritaController,
    AdminPengumumanController,
    AdminGaleriController,
    AdminKategoriController,
    AdminHalamanController,
    AdminPpdbController,
    AdminKontakController,
    AdminProfilController,
};

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

    /*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', AdminUserController::class)->except(['show']);
        Route::resource('guru', AdminGuruController::class);
        Route::resource('siswa', AdminSiswaController::class);
        Route::resource('berita', AdminBeritaController::class);
        Route::post('berita/generate-slug', [AdminBeritaController::class, 'generateSlug'])->name('berita.generate-slug');
        Route::resource('pengumuman', AdminPengumumanController::class);
        Route::resource('galeri', AdminGaleriController::class);
        Route::resource('kategori', AdminKategoriController::class);
        Route::resource('halaman', AdminHalamanController::class)->except(['show']);
        Route::post('halaman/generate-slug', [AdminHalamanController::class, 'generateSlug'])->name('halaman.generate-slug');
        Route::resource('ppdb', AdminPpdbController::class)->except(['create', 'store', 'edit', 'update']);
        Route::patch('ppdb/{ppdb}/status', [AdminPpdbController::class, 'updateStatus'])->name('ppdb.update-status');
        Route::resource('kontak', AdminKontakController::class)->except(['create', 'store', 'edit', 'update'])->parameters(['kontak' => 'kontakPesan']);
        Route::patch('kontak/{kontakPesan}/mark-read', [AdminKontakController::class, 'markAsRead'])->name('kontak.mark-read');
        Route::patch('kontak/{kontakPesan}/mark-unread', [AdminKontakController::class, 'markAsUnread'])->name('kontak.mark-unread');
        Route::get('profil', [AdminProfilController::class, 'index'])->name('profil.index');
        Route::put('profil', [AdminProfilController::class, 'update'])->name('profil.update');
    });

    /*
|--------------------------------------------------------------------------
| Guru Routes
|--------------------------------------------------------------------------
*/
    Route::middleware(['auth', 'guru'])->prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', function () {
            return view('guru.dashboard');
        })->name('dashboard');
    });

    /*
|--------------------------------------------------------------------------
| Operator Routes
|--------------------------------------------------------------------------
*/
    Route::middleware(['auth', 'operator'])->prefix('operator')->name('operator.')->group(function () {
        Route::get('/dashboard', function () {
            return view('operator.dashboard');
        })->name('dashboard');
        // Operator bisa manage PPDB dan Siswa
        Route::resource('ppdb', \App\Http\Controllers\Admin\AdminPpdbController::class)->only(['index', 'show', 'updateStatus']);
    });
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/profil', [PublicPageController::class, 'profil'])->name('profil');
Route::get('/guru', [PublicPageController::class, 'guru'])->name('guru');
Route::get('/fasilitas', [PublicPageController::class, 'fasilitas'])->name('fasilitas');
Route::get('/kemitraan', [PublicPageController::class, 'kemitraan'])->name('kemitraan');
Route::get('/ppdb', [PublicPageController::class, 'ppdb'])->name('ppdb');
Route::get('/berita', [PublicPageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PublicPageController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/pengumuman', [PublicPageController::class, 'pengumuman'])->name('pengumuman');
Route::get('/galeri', [PublicPageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');

// Public Form Submissions
Route::post('/ppdb', [PpdbPublicController::class, 'store'])->name('ppdb.store');
Route::post('/kontak', [KontakPublicController::class, 'store'])->name('kontak.store');
