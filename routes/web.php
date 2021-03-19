<?php

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

Route::get('/', function () {
    return view('weblog/landing');
})->name('landing-page');

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.Dashboard');
    })->name('dashboard');

    Route::get('/user', [UserController::class, 'show'])->name('user.show');

    Route::get('/add-user', [UserController::class, 'index'])->name('user.index');

    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('user/{id}', [UserController::class, 'edit'])->name('user.edit');

    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

});

require __DIR__ . '/auth.php';
