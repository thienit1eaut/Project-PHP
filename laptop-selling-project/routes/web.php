<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DragonHouseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// main home
Route::get('/',[DragonHouseController::class,'home'])->name('dragonHouse.home');
Route::get('/shop/{id}',[DragonHouseController::class,'shop'])->name('dragonHouse.shop');
Route::post('/contact',[ContactController::class,'contact'])->name('contact');

Route::get('/layout',function(){
    return view('layout');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::middleware(['prevent-back-history'])->group(function(){
    // profile url
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/profile/edit',[UserController::class,'edit'])->name('profile.edit');
    Route::post('/profile/password',[UserController::class,'password'])->name('profile.password');
    });

    // admin middleware
    Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard',[adminController::class,'dashboard'])->name('admin.dashboard');
    // Category Urls
    Route::prefix('admin/category')->group(function(){
      Route::get('/page',[CategoryController::class,'page'])->name('category.page');
      Route::post('/create',[CategoryController::class,'create'])->name('category.create');
      Route::get('/list',[CategoryController::class,'list'])->name('category.list');
      Route::get('/edit/{id}',[CategoryController::class,'editPage'])->name('category.editPage');
      Route::post('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
      Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    // product url
    Route::prefix('/admin/product')->group(function(){
        Route::get('/page',[ProductController::class,'page'])->name('product.page');
        Route::post('/create',[ProductController::class,'create'])->name('product.create');
        Route::get('/list',[ProductController::class,'list'])->name('product.list');
        Route::get('/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
      Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    });
    // order url
    Route::prefix('/admin/order')->group(function(){
      Route::get('/list',[OrderController::class,'orderList'])->name('order.list');
      Route::get('/deliver/{id}',[OrderController::class,'orderDeliver'])->name('order.deliver');
      Route::get('/delete/{id}',[OrderController::class,'orderDelete'])->name('order.delete');
      Route::get('/detail/{id}',[OrderDetailController::class,'detail'])->name('order.detail');
    });
    // user account
    Route::prefix('admin/account/user')->group(function(){
       Route::get('/list',[adminController::class,'userList'])->name('user.list');
       Route::get('/detail/{id}',[adminController::class,'userDetail'])->name('user.detail');
       Route::get('/promote/{id}',[adminController::class,'userPromote'])->name('user.promote');
       Route::get('/delete/{id}',[adminController::class,'userDelete'])->name('user.delete');
    });
    // admin account
    Route::prefix('admin/account/')->group(function(){
        Route::get('/list',[adminController::class,'adminList'])->name('admin.list');
       Route::get('/detail/{id}',[adminController::class,'adminDetail'])->name('admin.detail');
       Route::get('/change/{id}',[adminController::class,'userChange'])->name('user.change');
       Route::get('/delete/{id}',[adminController::class,'adminDelete'])->name('admin.delete');
     });
    //  contact
    Route::prefix('admin/contact')->group(function(){
       Route::get('list',[ContactController::class,'list'])->name('contact.list');
       Route::get('detail/{id}',[ContactController::class,'detail'])->name('contact.detail');
       Route::get('delete/{id}',[ContactController::class,'delete'])->name('contact.delete');
    });
    });
    // user
    Route::middleware(['user'])->group(function(){
       Route::post('/cart/add',[CartController::class,'add'])->name('cart.add');
       Route::get('/cart',[CartController::class,'cart'])->name('cart');
       Route::get('/cart/product/delete',[CartController::class,'deleteProduct'])->name('cart.product.delete');
       Route::get('/cart/clear',[CartController::class,'cartClear'])->name('cart.clear');
       // order
       Route::post('/order',[OrderDetailController::class,'order'])->name('order');
    });
});


