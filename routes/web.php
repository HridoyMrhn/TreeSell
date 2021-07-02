<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TreeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\PagesController;

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

Auth::routes(['verify' => true]);




// ====================== All Frontend Controller ======================

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact');
// User Controller





// ====================== All Backend Controller ======================
Route::prefix('admin')->group(function (){

    // Dashboard Controller
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Banner Controller
        Route::resource('banner', BannerController::class);

        // Categgory Controller
        Route::resource('category', CategoryController::class);

        // Banner Controller
        Route::resource('tree', TreeController::class);

        // Contact Controller
        Route::prefix('contact')->group(function (){
            Route::get('/', [ContactController::class, 'index'])->name('contact.index');
            Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
            Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
        });
});
