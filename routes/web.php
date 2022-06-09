<?php

use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PageController;
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

Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    
    Route::prefix('agadult')->middleware(['admin','optimizeImages'])->group(function (){
        Route::get('dashboard',[AdminPageController::class,'index'])->name('admin.index');
        Route::resource('videos',VideoController::class)->except('show');
        Route::resource('users',UserController::class);
        
    });

    Route::get('/view/{video:slug}',[VideoController::class,'show'])->name('videos.show');
});
