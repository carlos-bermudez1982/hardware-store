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

Route::get('about', function () {
	return view('aboutus');
})->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('extranet', function() {
	return view('extranet.adminindex');
})->name('extranet');

Route::resource('category', 'CategoryController');

Route::resource('item', 'ItemController');

Route::resource('extranet/profile','AdminUserController');

Route::resource('extranet/product', 'ProductAdminController');

Route::resource('cart', 'ShoppingCartController');

Route::resource('contact', 'MessagesController');

Route::resource('address','AddressController');

Route::resource('card','CardController');

Route::resource('phone', 'PhoneController');

Route::resource('payout', 'InvoiceHeaderController');