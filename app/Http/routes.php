<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SiteController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('index','SiteController@index');
Route::post('index','LoginController@validateLogin');
Route::get('logout','LoginController@logout');
Route::get('teknisi','SiteController@teknisiPage');
Route::post('teknisi','SiteController@teknisiPage');

Route::get('request_komponen','SiteController@requestKomponenPage');
Route::get('history','SiteController@historyPage');
Route::get('onprogress','SiteController@onprogressPage');


Route::get('admin','SiteController@adminPage');
Route::get('profile','SiteController@profilePage');
Route::post('profile','SiteController@profileUpdate');
// Route::get('invoice','SiteController@invoice');
Route::get('admin/request', 'ComponentController@request');
Route::get('admin/stock', 'ComponentController@stock');
Route::get('admin/minimum', 'ComponentController@min');
Route::get('admin/add', 'ComponentController@add');

Route::get('admin/invoice-per-customer','SiteController@invoice');

Route::post('admin', 'ComponentController@input');
