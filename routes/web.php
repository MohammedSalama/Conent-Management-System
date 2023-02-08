<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

/*
* Authentication
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
* Admin Dashboard
*/

Route::get('/admin_dashboard', function () {
    return view('layouts.admin.admin_dashboard');
})->name('admin_dashboard');

// ->middleware(['auth'])

// Route::group(['middleware' => ['web']], function () {
    /*
     *  CRUD For Post
     */
    Route::get('admin_dashboard/posts',[PostController::class,'index'])->name('posts');
    Route::post('admin_dashboard/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::post('admin_dashboard/posts/destroy',[PostController::class,'destroy'])->name('posts.destroy');
    Route::post('admin_dashboard/posts/{id}',[PostController::class,'update'])->name('posts.update');
    /*
     * CRUD For Category
     */
    Route::get('admin_dashboard/categories',[CategoryController::class,'index'])->name('categories');
    Route::post('admin_dashboard/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::post('admin_dashboard/categories/destroy',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::post('admin_dashboard/categories/{id}',[CategoryController::class,'update'])->name('categories.update');
// });

require __DIR__.'/auth.php';
