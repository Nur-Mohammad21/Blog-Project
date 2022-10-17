<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\PostController;
use App\Http\Controllers\Member\ProfileController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\ReplyController;
use App\Http\Controllers\Member\MemberCommentController;
//Member Login
Route::middleware(['member.login'])->group(function(){
    Route::get('/member-login',[DashboardController::class,'login'])->name('member.login');
    Route::post('/member-check-login',[DashboardController::class,'memberLoginCheck'])->name('member.login.check');
});

//Member Dashboard
Route::middleware(['member'])->group(function(){
    Route::get('/member-dashboard',[DashboardController::class,'dashboard'])->name('member.dashboard');
    Route::post('/member-logout',[DashboardController::class,'logout'])->name('member.logout');
    Route::controller(ProfileController::class)->group(function(){
        //update profile
        Route::get('/member-profile','profile')->name('member.profile');
        Route::post('/member-update-profile','update')->name('member.profile.update');
        //update password
        Route::get('/member-profile-password-check','checkPassword')->name('member.password.check');
        Route::post('/check-current-password','checkCurrentPassword')->name('member.current.password');
        Route::post('/member-update-password','updatePassword')->name('member.update.password');
    });
    //Start Post
    Route::controller(PostController::class)->group(function(){
        Route::get('/member-posts','index')->name('member.post.index');
        Route::get('/member-create-post','create')->name('member.post.create');
        Route::post('/member-store-post','store')->name('member.post.store');
        Route::get('/member-edit-post/{id}','edit')->name('member.post.edit');
        Route::post('/member-update-post/{id}','update')->name('member.post.update');
        Route::get('/member-delete-post/{id}','destroy')->name('member.post.delete');
    });
    //End post
    //Member Comment
    Route::controller(MemberCommentController::class)->group(function(){
        Route::get('/member-comments','index')->name('member.comment.index');
        Route::get('/member-comment-edit/{id}','edit')->name('member.comment.edit');
        Route::post('/member-comment-update','update')->name('member.comment.update');
        Route::get('/member-comment-delete/{id}','destroy')->name('member.comment.delete');
    });



    //For Frontend
    //Start Comment
    Route::post('/comment',[CommentController::class,'store'])->name('comment.store');
    //End Comment
    //Start Reply
    Route::post('/reply',[ReplyController::class,'store'])->name('reply.store');
    //End Reply
});
