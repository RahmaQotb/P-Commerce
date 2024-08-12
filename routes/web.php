<?php

use App\Http\Controllers\Admin\AdminForgetPasswordController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Auth.Admin.login');
});


Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get('/register', [AdminRegisterController::class, 'create'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'store']);

    Route::get('/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'store']);


    Route::get("/forget-password" , [AdminForgetPasswordController::class , "forgetpassword"])
    ->name("admin.forget.password");
    Route::post("/forget-password" , [AdminForgetPasswordController::class , "forgetpasswordPost"])
    ->name("admin.forget.passwordPost");;

    Route::get("/reset-password/{token}" , [AdminForgetPasswordController::class , "resetpassword"])
    ->name("admin.reset.password");
    Route::post("/reset.password" , [AdminForgetPasswordController::class , "resetpasswordPost"])
    ->name("admin.reset.passwordPost");


    


    
    Route::get("/test" , [AdminProfileController::class , "testview"]);

});

Route::prefix("admin")->middleware('auth:admin')->group(function () {
    
    Route::get("/profile/change-password", [AdminProfileController::class, "changePassword"])
    ->name("admin.change.password");

    Route::post("/profile/change-password", [AdminProfileController::class, "updatePassword"])
    ->name("admin.change.passwordPost");
    
    Route::get('/dashboard', function () {
        return view('Admin.home');
    })->name('Admin.home');
    
    Route::post('/logout', [AdminLoginController::class, 'destroy'])
                ->name('admin.logout');
});
