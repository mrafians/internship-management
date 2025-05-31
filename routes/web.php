<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified', 'role:siswa'])->group(function () {
    Route::get('/dashboard', App\Livewire\Siswa\Dashboard::class)->name('dashboard');
    Route::get('/teachers', App\Livewire\Siswa\Teachers::class)->name('teacher');
    Route::get('/industries', App\Livewire\Siswa\Industries::class)->name('industry');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('/profile', Profile::class)->name('settings.profile');
    Route::get('/password', Password::class)->name('settings.password');
    Route::get('/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
