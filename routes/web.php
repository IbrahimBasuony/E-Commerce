<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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



Route::middleware(['auth','is-admin'])->group(function(){
    Route::get('category',[CategoryController::class,'categoryForm']);
    Route::post('category',[CategoryController::class,'createCategory']);

    Route::delete('deleteCategory/{id}',[CategoryController::class,'deleteCategory']);

    Route::get('product',[ProductController::class,'productForm']);
    Route::post('product',[ProductController::class,'createProduct']);

    Route::delete('delete/{id}',[ProductController::class,'delete']);

    Route::get('allProducts',[ProductController::class,'allProducts']);

});



Route::middleware('guest')->group(function(){
Route::get('signup',[AuthController::class,'signupForm']);
Route::post('signup',[AuthController::class,'signup']);

Route::get('login',[AuthController::class,'loginForm']);
Route::post('login',[AuthController::class,'login']);

});


Route::middleware('auth')->group(function(){
Route::get('/',[AuthController::class,'shop']);
Route::get('shop',[AuthController::class,'shop']);
Route::post('logout',[AuthController::class,'logout']);

// cart ---------------------------------------------------------------------
Route::get('cart',[CartController::class,'cart']);
Route::post('addToCart/{id}',[CartController::class,'addToCart']);
Route::post('destroy/{id}',[CartController::class,'destroy']);

});

