<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;

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

Route::post('posts', [PostController::class, 'store']);
Route::get('users/{user}/posts', [PostController::class, 'userPosts']);
Route::get('top_posts', [PostController::class, 'listTopPosts']);
Route::post('reviews/{post}', [PostController::class, 'listTopPosts']);
