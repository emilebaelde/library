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

/**FRONTEND**/
Route::get('/', function () {

    return view('welcome');
});
Route::resource('/', 'FrontendController');
Route::get('/rentals', [ 'uses'=>'FrontendController@myRentals']);
Route::get('/rentals/history', [ 'uses'=>'FrontendController@history']);




Auth::routes();



/**BACKEND ROUTES**/

Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin', 'HomeController@index');

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/addresses', 'AdminAddressesController');
    Route::resource('/admin/authors', 'AdminAuthorsController');
    Route::resource('/admin/books', 'AdminBooksController');
    Route::resource('/admin/stock', 'AdminStockController');
    Route::resource('/admin/rentals', 'AdminRentalsController');
    Route::post('/admin/books/create/author', 'AdminAuthorsController@storeModal');


});

