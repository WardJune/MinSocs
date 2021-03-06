<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');

Auth::routes();

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', [PostController::class, 'index'])->name('home');

//     Route::get('notif', [NotificationController::class, 'index'])->name('notif');

//     Route::get('profile', [ProfileController::class, 'index'])->name('profile');

//     Route::post('posts', [PostController::class, 'store'])->name('posts.create');
//     Route::get('posts/{post:id}', [PostController::class, 'show'])->name('posts.show');
//     Route::get('posts/like/{post:id}', [LikeController::class, 'like'])->name('posts.like');

//     Route::post('posts/comment/{post:id}', [CommentController::class, 'store'])->name('comment.create');

//     Route::get('users/{user:id}', [UserController::class, 'show'])->name('users.show');

//     Route::delete('friends/remove/{user:id}/{status}', [FriendshipController::class, 'remove'])->name('friends.remove');
//     Route::post('friends/request/{user:id}', [FriendshipController::class, 'request'])->name('friends.request');
//     Route::patch('friends/accept/{user:id}', [FriendshipController::class, 'accept'])->name('friends.accept');

//     Route::get('friends', [FriendshipController::class, 'index'])->name('friends');
//     Route::get('friends/list', [FriendshipController::class, 'friends'])->name('friends.mine');
//     Route::get('friends/suggest', [FriendshipController::class, 'suggest'])->name('friends.suggest');
//     Route::get('friends/friend-request', [FriendshipController::class, 'friendRequest'])->name('friends.request-f');
//     Route::get('friends/request-sent', [FriendshipController::class, 'requestFriend'])->name('friends.request-s');
// });
