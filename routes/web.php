<?php

use App\Http\Livewire\Favorites;
use App\Http\Livewire\PetImages;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PetAvailabilityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WelcomeController::class)->name('welcome');

Route::resource('pets', PetController::class);

Route::middleware('auth')->group(function () {
    Route::get('/favorites', Favorites::class)
        ->name('favorites.index');

    Route::get('/pets/{pet}/images', PetImages::class)
        ->name('pets.images');

    Route::post('/pets/{pet}/mark-as-available', [PetAvailabilityController::class, 'markAsAvailable'])
        ->name('pets.mark-as-available');

    Route::post('/pets/{pet}/mark-as-adopted', [PetAvailabilityController::class, 'markAsAdopted'])
        ->name('pets.mark-as-adopted');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [PasswordController::class, 'edit'])->name('profile.password.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__ . '/auth.php';