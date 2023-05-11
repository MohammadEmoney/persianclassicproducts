<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LanguageController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\SearchController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home')->middleware('languages');
// Route::get('/languages', [\App\Http\Controllers\Front\LanguageController::class, 'setLanguage'])->name('front.langs');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories', [\App\Http\Controllers\Front\CategoryController::class, 'index'])->name('categories.index');


Route::get('/', [HomeController::class, 'index'])->name('front.home')->middleware(['languages', 'visit-tracker']);
Route::get('/languages', [LanguageController::class, 'setLanguage'])->name('front.langs');

Route::middleware(['languages', 'visit-tracker'])->group(function(){
    Auth::routes();
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['languages', 'visit-tracker'])->group(function(){
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('products/search', [SearchController::class, 'index'])->name('products.search');
    Route::post('products/{product:slug}/comment', [ProductController::class, 'comment'])->name('products.comment')->middleware(['auth']);
    Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
});

Route::group(['middleware' => ['languages', 'visit-tracker'], 'as' => 'front.'], function(){
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
});
