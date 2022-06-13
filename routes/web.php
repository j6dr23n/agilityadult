<?php

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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
Route::get('/',[PageController::class,'index'])->name('pages.index');
Route::get('/plan',[PageController::class,'plan'])->name('pages.plan');
Route::get('/lists/{name}',[PageController::class,'search'])->name('pages.search');
Route::post('/results',[PageController::class,'searchInput'])->name('pages.searchInput');
Route::get('/categories',[PageController::class,'categories'])->name('pages.categories');

Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[PageController::class,'profile'])->name('pages.profile');
    Route::post('/profile/{id}',[PageController::class,'profile_update'])->name('pages.profile_update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::middleware(['checkExpired'])->group(function() {
        Route::get('/view/{video:slug}',[VideoController::class,'show'])->name('videos.show');
    });
    Route::resource('reports',ReportController::class);

    Route::prefix('agadult')->middleware(['admin','optimizeImages'])->group(function (){
        Route::get('dashboard',[AdminPageController::class,'index'])->name('admin.index');
        Route::resource('videos',VideoController::class)->except('show');
        Route::resource('users',UserController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('sub-categories',SubCategoryController::class)->except('create');
        Route::get('/sub-categories/{id}/create',[SubCategoryController::class,'create'])->name('sub-categories.create');
    });
});
