<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TreeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontTreeController;

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
Route::get('category/{slug}', [PagesController::class, 'category'])->name('category');
Route::get('/profile/{user_name}', [PagesController::class, 'profile'])->name('profile');
Route::get('/tree/search', [FrontTreeController::class, 'treeSearch'])->name('tree.search');
Route::get('tree/most-search', [FrontTreeController::class, 'mostSearch'])->name('most.search');
Route::get('tree/most-view', [FrontTreeController::class, 'mostView'])->name('most.view');
Route::get('tree/recent', [FrontTreeController::class, 'treeRecent'])->name('tree.recent');

// Tree Controller
Route::prefix('tree')->group(function() {
    Route::get('/upload', [FrontTreeController::class, 'upload'])->name('user.tree.upload');
    Route::post('/post', [FrontTreeController::class, 'store'])->name('user.tree.post');
    Route::get('/{slug}', [FrontTreeController::class, 'treeShow'])->name('user.tree.show');
    Route::post('/update/{id}', [FrontTreeController::class, 'treeUpdate'])->name('user.tree.update');
    Route::get('delete/{slug}', [FrontTreeController::class, 'treeDelete'])->name('user.tree.delete');
    // Route::get('recent', [FrontTreeController::class, 'treeRecent'])->name('tree.recent');
    // Route::get('/search', [FrontTreeController::class, 'treeSearch'])->name('tree.search');
    // Route::get('/most-search', [FrontTreeController::class, 'mostSearch'])->name('most.search');
});

// Dashboard Controller
Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('user.dashboard')->middleware('verified');
    Route::post('/update/{id}', [DashboardController::class, 'dashboardUpdate'])->name('user.dashboard.update');
});





// ====================== All Backend Controller ======================
Route::prefix('admin')->group(function (){

    // Dashboard Controller
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Banner Controller
        Route::resource('banner', BannerController::class);

        // Categgory Controller
        Route::resource('category', CategoryController::class);

        // Banner Controller
        Route::resource('tree', TreeController::class);
        Route::post('tree/approve/{id}', [TreeController::class, 'approve'])->name('tree.approve');
        Route::post('tree/unapprove/{id}', [TreeController::class, 'unapprove'])->name('tree.unapprove');

        // Contact Controller
        Route::prefix('contact')->group(function (){
            Route::get('/', [ContactController::class, 'index'])->name('contact.index');
            Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
            Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
        });
});
