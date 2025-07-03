<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\MainController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;

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

/** Main home */
Route::get('/',[MainController::class,'home'])->name('Main.home');


// Route::get('/Systemadmin/add-account',[AdminController::class,'addAccount'])->name('admin.add-account');
// Route::post('/Systemadmin/add-account',[AdminController::class,'doAddAccount']);

Route::get('/Systemadmin/login',[AdminController::class,'login'])->name('systemadmin.login');
Route::post('/Systemadmin/login',[AdminController::class,'doLogin']);

/** Admin middleware */
// Route::middleware(['system.admin'])->group(function(){
//     Route::get('/Systemadmin/dashboard',[adminController::class,'dashboard'])->name('admin.dashboard');
// });

// Routes Admin
Route::get('/Systemadmin',[AdminController::class,'dashboard'])->name('systemadmin.dashboard');
Route::get('/Systemadmin/dashboard',[AdminController::class,'dashboard'])->name('systemadmin.dashboard');

// Menu
Route::get('/Systemadmin/view/menu',[AdminController::class,'view'])->name('systemadmin.view.menu');
Route::get('/Systemadmin/create/menu',[AdminController::class,'create'])->name('systemadmin.create.menu');
Route::post('/Systemadmin/create/menu',[AdminController::class,'doCreate']);

// Product categories
Route::get('/Systemadmin/view/pro_categories',[AdminController::class,'view'])->name('systemadmin.view.pro_categories');
Route::get('/Systemadmin/create/pro_categories',[AdminController::class,'create'])->name('systemadmin.create.pro_categories');
Route::post('/Systemadmin/create/pro_categories',[AdminController::class,'doCreate']);


Route::get('/Systemadmin/view/post_category',[AdminController::class,'view'])->name('systemadmin.view.post_category');

Route::get('/Systemadmin/create-menu',[MenuController::class,'addMenu'])->name('systemadmin.addmenu');
Route::get('/Systemadmin/add-menu',[MenuController::class,'addMenu'])->name('systemadmin.addmenu');

// post
Route::get('/Systemadmin/post',[PostController::class,'listPost'])->name('systemadmin.post');
Route::get('/Systemadmin/add-post',[PostController::class,'addPost'])->name('systemadmin.post');
