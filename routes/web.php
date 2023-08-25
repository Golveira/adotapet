<?php

use App\Http\Controllers\Settings\AccountDeletionController;
use App\Http\Controllers\Settings\EmailUpdateController;
use App\Http\Livewire\Favorites;
use App\Http\Livewire\PetImages;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PetAvailabilityController;
use App\Http\Controllers\Settings\ProfileUpdateController;
use App\Http\Controllers\Settings\PasswordUpdateController;

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


    Route::prefix('settings')->name('settings.')->group(function () {
        Route::redirect('/', '/settings/profile');

        Route::get('/profile', [ProfileUpdateController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/profile', [ProfileUpdateController::class, 'update'])
            ->name('profile.update');

        Route::get('/email', [EmailUpdateController::class, 'edit'])
            ->name('email.edit');

        Route::put('/email', [EmailUpdateController::class, 'update'])
            ->name('email.update');

        Route::get('/password', [PasswordUpdateController::class, 'edit'])
            ->name('password.edit');

        Route::put('password', [PasswordUpdateController::class, 'update'])
            ->name('password.update');

        Route::delete('/remove-account', [AccountDeletionController::class, 'destroy'])
            ->name('account.destroy');
    });
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__ . '/auth.php';