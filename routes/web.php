<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsNotAuthenticated;
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

Route::get('/', [PageController::class, 'home'])->name('page.home');

// Route::prefix('inventory')->controller(ItemController::class)->group(function () {
//     Route::get('/', 'index')->name('item.index');
//     Route::post('/', 'store')->name('item.store');
//     Route::get('/create', 'create')->name('item.create');
//     Route::get('/{id}', 'show')->name('item.show');
//     Route::get('/{id}/edit', 'edit')->name('item.edit');
//     Route::delete('/{id}', 'destory')->name('item.destory');
//     Route::put(' /{id}', 'update')->name('item.update');
// });


Route::middleware(IsAuthenticated::class)->group(function () {
    Route::resource("item", ItemController::class);
    Route::resource("category", CategoryController::class);
    // Route::resource("student", StudentController::class);
    Route::controller(HomeController::class)->prefix('dashboard')->group(function () {
        Route::get("home", "home")->name('dashboard.home');
    });
});


Route::controller(AuthController::class)->group(function () {
    Route::middleware(IsNotAuthenticated::class)->group(function () {
        Route::get("register", "register")->name('auth.register');
        Route::post("register", "store")->name('auth.store');
        Route::get("login", "login")->name('auth.login');
        Route::post("login", "check")->name('auth.check');
    });

    Route::middleware(IsAuthenticated::class)->group(function () {
        Route::post("logout", "logout")->name('auth.logout');
        Route::get("/password-change", "passwordChange")->name('auth.passwordChange');
        Route::post("/password-change", "passwordChanging")->name('auth.passwordChanging');
        Route::get("/verify", "verify")->name('auth.verify');
        Route::post("/verifying", "verifying")->name('auth.verifying');
    });
});
