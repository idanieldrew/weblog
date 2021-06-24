<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentPostController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

//show landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Route::post('like',[ContentPostController::class,'fetchLikes'])->name('like1');
Route::post('like/{id}',[ContentPostController::class,'manageLike'])->name('like2');
// add comment
// Route::post('/addCom', [ContentPostController::class,'store'])->name('contentp.store');



// PANEL
Route::prefix('/panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.Dashboard');
    })->name('dashboard');

    // routes for user
    Route::prefix('user')->group(function () {

        Route::get('/show', [UserController::class, 'show'])->name('user.show');

        Route::get('/add', [UserController::class, 'create'])->name('user.create');

        Route::post('/store', [UserController::class, 'store'])->name('user.store');

        Route::get('/{user}', [UserController::class, 'edit'])->name('user.edit');

        Route::put('/{user}', [UserController::class, 'update'])->name('user.update');

        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // routes for categories
    Route::prefix('category')->group(function () {

        Route::get('/add', [CategoryController::class, 'create'])->name('category.create');

        Route::get('/show', [CategoryController::class, 'index'])->name('category.index');

        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');

        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');

        Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
    });

    // routes for posts
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');

        Route::get('add', [PostController::class, 'create'])->name('post.create');

        Route::post('/store', [PostController::class, 'store'])->name('post.store');

        Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');

        Route::get('/{post}', [PostController::class, 'edit'])->name('post.edit');

        Route::put('/{post}', [PostController::class, 'update'])->name('post.update');
    });
    Route::post('/upload', [PostController::class, 'uploadCheckEditor'])->name('ck-upload');

    //check comment
    Route::get('/comment', array(CommentController::class, 'index'))->name('comment.index');

    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::put('/{comment}', [CommentController::class, 'update'])->name('comment.update');

    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::get('post/{post:slug}', [ContentPostController::class, 'index'])->name('content');


require __DIR__ . '/auth.php';