<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;


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
//Book API
Route::get("/books", [BookController::class, 'getBook']);
Route::get("/books/{id}", [BookController::class, 'getBookById']);
Route::post("/books", [BookController::class, 'addBook']);
Route::put("/books/{id}", [BookController::class, 'updateBook']);
Route::delete("/books/{id}", [BookController::class, 'deleteBook']);

//Author API
Route::get("/authors", [AuthorController::class, 'getAuthor']);
Route::get("/authors/{id}", [AuthorController::class, 'getAuthorById']);
Route::post("/authors", [AuthorController::class, 'addAuthor']);
Route::put("/authors/{id}", [AuthorController::class, 'updateAuthor']);
Route::delete("/authors/{id}", [AuthorController::class, 'deleteAuthor']);

//Category API
Route::get("/categories", [CategoryController::class, 'getCategory']);
Route::get("/categories/{id}", [CategoryController::class, 'getCategoryById']);
Route::post("/categories", [CategoryController::class, 'addCategory']);
Route::put("/categories/{id}", [CategoryController::class, 'updateCategory']);
Route::delete("/categories/{id}", [CategoryController::class, 'deleteCategory']);

//Borrow API
Route::get("/borrows", [BorrowController::class, 'getBorrow']);
Route::get("/borrows/{id}", [BorrowController::class, 'getBorrowById']);
Route::post("/borrows", [BorrowController::class, 'addBorrow']);
Route::put("/borrows/{id}", [BorrowController::class, 'updateBorrow']);
Route::delete("/borrows/{id}", [BorrowController::class, 'deleteBorrow']);

//User API
Route::get("/users", [UserController::class, 'getUsers']);
Route::get("/users/{id}", [UserController::class, 'getUserById']);
Route::post("/users", [UserController::class, 'addUser']);
Route::put("/users/{id}", [UserController::class, 'updateUser']);
Route::delete("/users/{id}", [UserController::class, 'deleteUser']);
