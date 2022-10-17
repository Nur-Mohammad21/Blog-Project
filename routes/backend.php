<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashbboardController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\SliderController;

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashbboardController::class,'index'])->name('dashboard');
    /*start section*/
    Route::controller(SectionController::class)->group(function(){
        Route::get('/section','index')->name('section.index');
        Route::get('/add-section','create')->name('section.create');
        Route::post('/store-section','store')->name('section.store');
        Route::get('/edit-section/{id}','edit')->name('section.edit');
        Route::post('/update-section','update')->name('section.update');
        Route::get('/delete-section/{id}','destroy')->name('section.delete');
        Route::post('/update-status-section','updateStatus')->name('section.update.status');
    });
    /*end section*/
    /*Start Category*/
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','index')->name('category.index');
        Route::get('/add-category','create')->name('category.create');
        Route::post('/store-category','store')->name('category.store');
        Route::get('/edit-category/{id}','edit')->name('category.edit');
        Route::post('/update-category','update')->name('category.update');
        Route::get('/delete-category/{id}','destroy')->name('category.delete');
        Route::post('/update-status-category','updateStatus')->name('category.update.status');
    });
    /*End Category*/
    /*Start Post*/
    Route::controller(PostController::class)->group(function(){
        Route::get('/post','index')->name('post.index');
        Route::get('/delete-post/{id}','destroy')->name('post.delete');
        Route::post('/update-status-post','updateStatus')->name('post.update.status');
    });
    /*End Post*/
    /*Start member*/
    Route::controller(MemberController::class)->group(function(){
        Route::get('/members','index')->name('member.index');
        Route::get('/create-member','create')->name('member.create');
        Route::post('/store-member','store')->name('member.store');
        Route::get('/edit-member/{id}','edit')->name('member.edit');
        Route::post('/update-member','update')->name('member.update');
        Route::get('/delete-member/{id}','destroy')->name('member.delete');
    });
    /*End member*/
    /*Start slider*/
    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders','index')->name('sliders.index');
        Route::get('/create-slider','create')->name('slider.create');
        Route::post('/store-slider','store')->name('slider.store');
        Route::get('/edit-slider/{id}','edit')->name('slider.edit');
        Route::post('/update-slider','update')->name('slider.update');
        Route::get('/delete-slider/{id}','destroy')->name('slider.delete');
        Route::post('/update-status-slider','updateStatus')->name('slider.update.slider');
    });
    /*End slider*/

});
