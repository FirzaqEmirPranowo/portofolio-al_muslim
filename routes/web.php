<?php

use App\Http\Controllers\CerpenController;
use Illuminate\Support\Facades\Auth;
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
//     return view('landingpage.page.welcome');
// });

Route::post('/proses-register', [App\Http\Controllers\Auth\LoginController::class, 'register'])->name('proses.register');
Route::get('/', [App\Http\Controllers\LandingpageController::class, 'index'])->name('index');
Route::get('home/list-blog', [App\Http\Controllers\LandingpageController::class, 'list_blog'])->name('home.list-blog');
Route::get('home/list-cerpen', [App\Http\Controllers\LandingpageController::class, 'list_cerpen'])->name('home.list-cerpen');
Route::get('home/list-fotografi', [App\Http\Controllers\LandingpageController::class, 'list_fotografi'])->name('home.list-fotografi');
Route::get('home/list-vidiografi', [App\Http\Controllers\LandingpageController::class, 'list_vidiografi'])->name('home.list-vidiografi');
Route::get('home/list-cerpen/cerpen-detail/{slug}', [App\Http\Controllers\LandingpageController::class, 'detail_cerpen'])->name('cerpen.detail');
Route::get('home/list-blog/blog-detail/{slug}', [App\Http\Controllers\LandingpageController::class, 'detail_blog'])->name('blog.detail');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get(
        'dashboard',
        [App\Http\Controllers\HomeController::class, 'index']
    )->name('dashboard');
    // cerpen
    Route::get('cerpen', [App\Http\Controllers\CerpenController::class, 'index'])->name('cerpen.index');
    Route::get('cerpen/create', [App\Http\Controllers\CerpenController::class, 'create'])->name('cerpen.create');
    Route::post('cerpen/store', [App\Http\Controllers\CerpenController::class, 'store'])->name('cerpen.store');
    Route::get('cerpen/edit/{id}', [App\Http\Controllers\CerpenController::class, 'edit'])->name('cerpen.edit');
    Route::post('cerpen/update/{id}', [App\Http\Controllers\CerpenController::class, 'update'])->name('cerpen.update');
    Route::get('cerpen/destroy/{id}', [App\Http\Controllers\CerpenController::class, 'destroy'])->name('cerpen.delete');
    //blog
    Route::get('blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
    Route::post('blog/store', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/destroy/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.delete');
    //fotografi
    Route::get('fotografi', [App\Http\Controllers\FotografiController::class, 'index'])->name('fotografi.index');
    Route::get('fotografi/create', [App\Http\Controllers\FotografiController::class, 'create'])->name('fotografi.create');
    Route::post('fotografi/store', [App\Http\Controllers\FotografiController::class, 'store'])->name('fotografi.store');
    Route::get('fotografi/edit/{id}', [App\Http\Controllers\FotografiController::class, 'edit'])->name('fotografi.edit');
    Route::post('fotografi/update/{id}', [App\Http\Controllers\FotografiController::class, 'update'])->name('fotografi.update');
    Route::get('fotografi/destroy/{id}', [App\Http\Controllers\FotografiController::class, 'destroy'])->name('fotografi.delete');
    //vidiografi
    Route::get('vidiografi', [App\Http\Controllers\VidiografiController::class, 'index'])->name('vidiografi.index');
    Route::get('vidiografi/create', [App\Http\Controllers\VidiografiController::class, 'create'])->name('vidiografi.create');
    Route::post('vidiografi/store', [App\Http\Controllers\VidiografiController::class, 'store'])->name('vidiografi.store');
    Route::get('vidiografi/edit/{id}', [App\Http\Controllers\VidiografiController::class, 'edit'])->name('vidiografi.edit');
    Route::post('vidiografi/update/{id}', [App\Http\Controllers\VidiografiController::class, 'update'])->name('vidiografi.update');
    Route::get('vidiografi/destroy/{id}', [App\Http\Controllers\VidiografiController::class, 'destroy'])->name('vidiografi.delete');
});
