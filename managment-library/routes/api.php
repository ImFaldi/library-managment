<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/books", [BookController::class, 'getBook']);
Route::get("/books/{id}", [BookController::class, 'getBookById']);
Route::post("/books", [BookController::class, 'addBook']);
Route::put("/books/{id}", [BookController::class, 'updateBook']);
Route::delete("/books/{id}", [BookController::class, 'deleteBook']);

Route::get("/authors", [AuthorController::class, 'getAuthor']);
Route::get("/authors/{id}", [AuthorController::class, 'getAuthorById']);
Route::post("/authors", [AuthorController::class, 'addAuthor']);
Route::put("/authors/{id}", [AuthorController::class, 'updateAuthor']);
Route::delete("/authors/{id}", [AuthorController::class, 'deleteAuthor']);
