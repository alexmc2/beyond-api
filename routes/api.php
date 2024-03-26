<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


// Publicly accessible routes
Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'showAllPosts']);
Route::get('/posts/popular', [PostController::class, 'showPopularPosts']);
Route::get('/posts/newest', [PostController::class, 'showNewestPosts']);
Route::get('/posts/topic/{topicName}', [PostController::class, 'showPostsByTopic']);

Route::get('/post/{post}', [PostController::class, 'viewSinglePostApi']); // Viewing a single post
Route::get('/search/{term}', [PostController::class, 'searchApi']); // Search posts


Route::get('/profile/{user:name}', [UserController::class, 'profileApi']); // Viewing a user profile
Route::get('/profile/{user:name}/followers', [UserController::class, 'profileFollowersApi']); // Viewing user's followers
Route::get('/profile/{user:name}/following', [UserController::class, 'profileFollowingApi']); // Viewing who the user is following

Route::middleware('auth:sanctum')->group(function () {
    // Actions requiring the user to be logged in

    Route::post('/manage-avatar', [UserController::class, 'storeAvatarApi']);

    // Posting related routes
    Route::post('/create-post', [PostController::class, 'storeNewPostApi']);
    Route::put('/post/{post}', [PostController::class, 'updatePostApi'])->middleware('can:update,post');
    Route::delete('/delete-post/{post}', [PostController::class, 'deleteApi'])->middleware('can:delete,post');

    // Following related routes
    Route::post('/create-follow/{user:name}', [FollowController::class, 'createFollowApi']);
    Route::post('/remove-follow/{user:name}', [FollowController::class, 'removeFollowApi']);
});
