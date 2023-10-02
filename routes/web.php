<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PetController as AdminPetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pet\MarkAsAdoptedController;
use App\Http\Controllers\Pet\MarkAsAvailableController;
use App\Http\Controllers\Pet\PetController;
use App\Http\Controllers\Pet\PetImagesController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController as ProfileSettingsController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Favorites;

/*f
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

Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', Favorites::class)->name('favorites.index');

    Route::get('/pets/{pet}/images', PetImagesController::class)->name('pets.images.index');
    Route::post('/pets/{pet}/mark-as-available', MarkAsAvailableController::class)->name('pets.mark-as-available');
    Route::post('/pets/{pet}/mark-as-adopted', MarkAsAdoptedController::class)->name('pets.mark-as-adopted');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', SettingsController::class)->name('index');
        Route::put('/profile', [ProfileSettingsController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileSettingsController::class, 'destroy'])->name('profile.destroy');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'check_admin'])->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::resource('users', UserController::class);
    Route::resource('pets', AdminPetController::class);
    Route::resource('media', MediaController::class, ['parameters' => ['media' => 'media']])->only(['destroy']);
});

Route::get('@{username}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__ . '/auth.php';
