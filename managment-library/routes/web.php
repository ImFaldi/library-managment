<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});