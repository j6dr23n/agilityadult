<?php

use App\Http\Controllers\PageController;
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
Route::get('/',[VideoController::class,'index'])->name('videos.index');
Route::get('/plan',[PageController::class,'plan'])->name('pages.plan');
Route::get('/search/{name}',[PageController::class,'search'])->name('pages.search');

Route::middleware(['auth'])->group(function () {
    Route::get('/view/{video:slug}',[VideoController::class,'show'])->name('videos.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
