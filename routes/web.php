<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\GirlController;
use App\Http\Controllers\Admin\MangaController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MangaController as PagesMangaController;
use App\Http\Controllers\PageController;
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
Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/plan', [PageController::class, 'plan'])->name('pages.plan');
Route::get('/lists/{name}', [PageController::class, 'search'])->name('pages.search');
Route::post('/results', [PageController::class, 'searchInput'])->name('pages.searchInput');
Route::get('/categories', [PageController::class, 'categories'])->name('pages.categories');
Route::get('/girls', [PageController::class, 'girls'])->name('pages.girls');
Route::get('/view/{video:slug}', [VideoController::class, 'show'])->name('videos.show')->middleware('checkExpired');
Route::resource('/manga', PagesMangaController::class)->names([
    'index' => 'pages.manga.index', 'show' => 'pages.manga.show',
])->scoped([
    'manga' => 'slug',
])->only('index', 'show');
Route::get('/manga/{manga:slug}/chapter/{chapter:chapter_no}', [PagesMangaController::class, 'show_chapter'])->name('pages.chapter.show');

Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [PageController::class, 'profile'])->name('pages.profile');
    Route::post('/profile/{id}', [PageController::class, 'profile_update'])->name('pages.profile_update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::resource('reports', ReportController::class);

    Route::prefix('agadult')->middleware(['admin', 'optimizeImages'])->group(function () {
        Route::get('dashboard', [AdminPageController::class, 'index'])->name('admin.index');
        Route::resource('videos', VideoController::class)->except('show');
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('sub-categories', SubCategoryController::class)->except('create');
        Route::resource('manga', MangaController::class);
        Route::resource('girls', GirlController::class);
        Route::resource('chapter', ChapterController::class)->except('create');
        Route::get('working-days',[AdminPageController::class,'working_days'])->name('pages.working-day');
        Route::post('/upload-advanced', [VideoController::class, 'uploadLargeFiles'])->name('files.upload.large');
        Route::get('/chapter/{id}/create', [ChapterController::class, 'create'])->name('chapter.create');
        Route::get('/sub-categories/{id}/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
    });
});
