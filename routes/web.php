<?php

use App\Http\Controllers\{ProfileController};
use App\Http\Controllers\Admin\{AdminController,ProductController,BrandController,CategoryController};
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['prefix'=>'admin','middlware'=>'redirectAdmin'],function(){
    Route::get('login',[AdminAuthController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[AdminAuthController::class,'login'])->name('admin.login.post');
    Route::get('logout',[AdminAuthController::class,'logout'])->name('admin.logout');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
     Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
     Route::resource('/product',ProductController::class);
     Route::resource('/category',CategoryController::class);
     Route::resource('/brand',BrandController::class);
});
    

require __DIR__.'/auth.php';
