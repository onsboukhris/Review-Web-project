<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
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
//guest
Route::get('/','GuestController@home');
Route::get('/product/details/{id}','GuestController@productDetails');
Route::get('/products/{category}/list','GuestController@view');


//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/client/dashboard','ClientController@dashboard');
Route::get('/user/home','UserController@home');
//categ
Route::get('/collections',[FrontendController::class,'categories']);
Route::get('categs', 'CategController@index');
Route::get('categs/create', 'CategController@create');
Route::post('categs', 'CategController@store');
Route::get('categs/{id}/edit', 'CategController@edit');
Route::put('categs/{id}', 'CategController@update');
Route::delete('categs/{id}', 'CategController@destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/private', function () {
        return 'bonjour admin';
    });
});
//product
//Route::get('products', [ProductController::class, 'index']);
Route::get('/products','ProductController@index');
Route::post('/addimage','ProductController@store')->name('addimage');
Route::get('products/create', 'ProductController@create');

Route::get('products/{id}/edit', 'ProductController@edit');
Route::put('products/{id}', 'ProductController@update');
Route::delete('products/{id}', 'ProductController@destroy');

//avis
Route::get('avis',[AvisController::class,'index']);
Route::get('avis/create', 'AvisController@create');
Route::post('avis', 'AvisController@store');
Route::get('avis/{id}/edit', 'AvisController@edit');
Route::put('avis/{id}', 'AvisController@update');
Route::delete('avis/{id}', 'AvisController@destroy');
// review
Route::get('reviews',[ReviewController::class,'index']);
Route::post('reviews', 'ReviewController@addReview')->middleware('auth');
Route::delete('reviews/{id}', 'ReviewController@destroy');
//user
Route::get('users',[UserController::class,'index']);
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/{id}/edit', 'UserController@edit');
Route::put('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');

//search
Route::post('/products/search','GuestController@search');













