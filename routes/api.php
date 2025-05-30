<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Register & Login routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Logout routes
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->group(function () {
    // Article routes
    Route::get('articles', [ArticleController::class, 'index']);                // list
    Route::post('articles', [ArticleController::class, 'store']);               // create
    Route::get('articles/{id}', [ArticleController::class, 'show']);            // detail
    Route::put('articles/{id}', [ArticleController::class, 'update']);          // update
    Route::delete('articles/{id}', [ArticleController::class, 'destroy']);      // delete

    Route::get('articles/search', [ArticleController::class, 'search']);        // search by category

    // Category routes
    Route::get('categories', [CategoryController::class, 'index']);             // list
    Route::post('categories', [CategoryController::class, 'store']);            // create
    Route::get('categories/{id}', [CategoryController::class, 'show']);         // detail
    Route::put('categories/{id}', [CategoryController::class, 'update']);       // update
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);   // delete
});

