<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoryController;

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
//
//Route::get('/mainpage', function (){
//    return  ('main_Page');
//})->middleware('admin.confirm');




Route::get('/',[CatalogController::class,'showCategories'])->name("show.Categories");
Route::get('/ShowOneCategory/{id}',[CatalogController::class,'ShowOneCategory'])->name("show.One.Category");
Route::get ("/search",[CatalogController::class,"Search"])->name ("search");
Route::get("/addToCart/{product}",[CatalogController::class,"addToCart"])->middleware("auth")->name("addToCart");
Route::get("/cart",[CatalogController::class,"showCart"])->name("showCart");
Route::get("/order",[CatalogController::class,"showOrder"])->name ("order");
Route::post("/order",[CatalogController::class,'saveOrder'])->name("save.order");


Route::get('/login', [LoginController::class,'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'useLogin']);
Route::get('/logout', [LoginController::class,'useLogout']);
Route::get("/CreateAccount",[LoginController::class,"createAccount"])->name("Create.Account");
Route::post("/CreateAccount",[LoginController::class,"createAccountPost"]);


Route::resource ('/admin/products', ProductController::class);
Route::get('/admin/products/delete/{id}',[ProductController::class, 'delete'])->name("products.delete");
Route::get('/admin/products/upload/{id}',[ProductController::class,'upload'])->name("products.img.upload");
Route::post("/admin/products/upload/{id}",[ProductController::class,'saveImg'])->name("products.img.save");



Route::resource ('/admin/category', CategoryController::class);
Route::get('/admin/category/delete/{id}',[CategoryController::class, 'delete'])->name("category.delete");

