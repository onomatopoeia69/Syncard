<?php

use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\{ChildController, ProductController, SocialsController, ProfileController};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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


// guests

Route::middleware('guest')->group(function () {

    Route::view('/shop', 'home.index')->name('home.index');
    Route::view('/shop2', 'home.index2')->name('home2.index');

    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

    Route::get('/auth/facebook', [FacebookAuthController::class, 'redirect'])->name('facebook.redirect');
    Route::get('/auth/facebook/callback', [FacebookAuthController::class, 'callback'])->name('facebook.callback');



    // children public route
    Route::get('/child/{token}', [ChildController::class, 'show'])->name('child.show');

});

// profile
Route::get('/profiles', [ProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/profiles/create', [ProfileController::class, 'create'])
    ->name('profile.create');

Route::post('/profiles', [ProfileController::class, 'store'])
    ->name('profile.store');

Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::put('/profiles/{profile}', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::put('/profiles/{profile}/delete', [ProfileController::class, 'delete'])
    ->name('profile.destroy');

Route::get('/u/{username}', [ProfileController::class, 'public'])
    ->where('username', '[A-Za-z0-9_-]+')
    ->name('profile.public');

// users

Route::middleware('auth')->group(function () {

    // EmailVerificationRequest for email authentication
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();    //make the user verified
        return redirect('/dashboard');
    })->middleware(['signed'])->name('verification.verify');  // signed middleware for checking it has been hashed

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');


    Route::view('/dashboard', 'users.dashboard')->name('users.dashboard');

    Route::view('/verify', 'users.auth.verify-email')->middleware(['unverified'])->name('users.verify');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home.index')->with('login_required', true);
    })->name('users.logout');


    //children
    Route::view('/children', 'users.child.children')->name('users.children');

    // Socials
    Route::get('/socials', [SocialsController::class, 'index'])->name('socials.index');
    Route::post('/socials/store', [SocialsController::class, 'store'])->name('socials.store');
    Route::put('/socials/{social}', [SocialsController::class, 'update'])->name('socials.update');
    Route::delete('/socials', [SocialsController::class, 'destroy'])->name('socials.destroy');


});





// admin

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

    Route::post('/admin/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home.index')->with('login_required', true);
    })->name('admin.logout');

});


// fallback

Route::fallback(function () {
    return redirect()->route('home.index');
});
