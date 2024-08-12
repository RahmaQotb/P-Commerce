<?php
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\NewPassController;
use App\Http\Controllers\Authentication\PasswordResetController;
use App\Http\Controllers\Authentication\ChangePassController;
///
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    
    Route::get('register', [RegisterController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
                ->name('login');

    Route::post('login', [LoginController::class, 'store']);

    Route::get('forgot-password', [PasswordResetController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetController::class, 'store'])
                ->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class,"show"])
                ->name('password.show');

    Route::post('reset-password', [PasswordResetController::class, 'reset'])
                ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    /*
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
*/
    Route::get('change-password', [ChangePassController::class, 'create'])->name('password.update');
    Route::put('change-password', [ChangePassController::class, 'update']);
    
    Route::post('logout', [LogoutController::class, 'destroy'])
                ->name('logout');
});
