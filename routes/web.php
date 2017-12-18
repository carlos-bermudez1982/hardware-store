<?php

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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('extranet', function() {
	return view('extranet.adminindex');
})->name('extranet');

Route::resource('category', 'CategoryController');

Route::resource('item', 'ItemController');

Route::resource('profile','AdminUserController');

Route::resource('product', 'ProductAdminController');

Route::resource('cart', 'ShoppingCartController');

Route::resource('contact', 'MessagesController');