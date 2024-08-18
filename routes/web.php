<?php
//Admin
use App\Http\Controllers\Admin\AdminForgetPasswordController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// User
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\NewPassController;
use App\Http\Controllers\Authentication\PasswordResetController;
use App\Http\Controllers\Authentication\ChangePassController;
use App\Http\Controllers\User\OrderController as UserOrderController;
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
    return view('User.index');
});
//User

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

    Route::get('/reset-password/{token}', [PasswordResetController::class, "show"])
        ->name('password.show');

    Route::post('reset-password', [PasswordResetController::class, 'reset'])
        ->name('password.reset');


    // Route::get("category", [UserProductController::class, "category"]);
    // Route::get("filter/{id}", [UserProductController::class, "filter"]);

});

// Route::get("category", [UserProductController::class, "category"]);
Route::get("filter/{id}", [UserProductController::class, "filter"])->name("categoryFilter");

Route::get("allProducts", [UserProductController::class, "all"]);
Route::get("show/{id}", [UserProductController::class, "show"])->name("product.show");

Route::middleware('auth')->group(function () {
    Route::get('change-password', [ChangePassController::class, 'create'])->name('password.update');
    Route::put('change-password', [ChangePassController::class, 'update']);

    Route::post('logout', [LogoutController::class, 'destroy'])
        ->name('logout');
});





//Admin
Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get('/register', [AdminRegisterController::class, 'create'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'store']);

    Route::get('/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'store']);


    Route::get("/forget-password", [AdminForgetPasswordController::class, "forgetpassword"])
        ->name("admin.forget.password");
    Route::post("/forget-password", [AdminForgetPasswordController::class, "forgetpasswordPost"])
        ->name("admin.forget.passwordPost");;

    Route::get("/reset-password/{token}", [AdminForgetPasswordController::class, "resetpassword"])
        ->name("admin.reset.password");
    Route::post("/reset.password", [AdminForgetPasswordController::class, "resetpasswordPost"])
        ->name("admin.reset.passwordPost");




    Route::get("/test", [AdminProfileController::class, "testview"]);
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


Route::controller(ProductController::class)->prefix("admin")->middleware("auth:admin")->group(function () {
    Route::get("products", "allProducts");
    Route::get("products/show/{id}", "show");
    Route::get("products/create", "create");
    Route::post("products", "store")->name("store");
    Route::get("products/edit/{id}", "edit");
    Route::put("products/{id}", "update")->name("updateProduct");
    Route::delete("products/{id}", "delete");

    // Route::get("/test","testview");

});

Route::controller(CategoryController::class)->prefix("admin")->middleware("auth:admin")->group(function () {
    Route::get("categories", "allCategories");
    Route::get("categories/show/{id}", "show");
    Route::get("categories/create", "create");
    Route::post("categories", "Store")->name("Store");
    Route::get("categories/edit/{id}", "Edit");
    Route::put("categories/{id}", "Update");
    Route::delete("categories/{id}", "delete");
});
Route::controller(OrderController::class)->middleware("auth:admin")->prefix("admin")->group(function () {
    Route::get("orders", "index");
    Route::get("orders/{id}", "show");
});

Route::controller(UserOrderController::class)->middleware("auth")->group(function () {
    Route::get("orders", "myOrders");
    Route::get("orders/{id}", "show");
    Route::post("make_order", "makeOrder")->name("makeOrder");
});

Route::controller(CartController::class)->middleware("auth")->group(function () {
    //Route::get("orders","");
    Route::get("myCart", "myCart")->name("myCart");
    Route::post("addToCart/{id}", "addToCart")->name("addToCart");
});
