<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function (){
    Route::middleware(['ceklevel:admin'])->group(function(){

        Route::get('/products',
    [ProductController::class, 'index'])->name('products.index');
    });
    Route::get('/dashboard', function (){
        return view('dashboard');
    });

Route::get('/category',
[CategoryController::class, 'index'])->name('category.index');

Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::delete('/products/{id}', [ProductController::class,'delete'])->name('products.delete');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::delete('/category/{id}', [CategoryController::class,'delete'])->name('category.delete');

Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');

});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/',[FrontEndController::class, 'index']);

Route::get('/home', function () {
    return view('home');
});
Route::get('/coba_controller',
[App\Http\controllers\CobaController::class, 'index']);

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/register', [LoginController::class, 'registerPost'])->name('register.post');
