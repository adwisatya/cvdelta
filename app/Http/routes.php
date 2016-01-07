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
Route::get('/index','SiteController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('index','LoginController@validateLogin');

Route::get('logout','LoginController@logout');

Route::get('teknisi','SiteController@teknisiPage');

Route::post('teknisi','SiteController@teknisiPage');

Route::get('find-komponen','SiteController@findKomponenView');

Route::post('find-komponen','SiteController@requestKomponenPage');

// Route::get('request_komponen','SiteController@requestKomponenPage');
Route::post('request_komponen','SiteController@requestKomponen');


Route::get('history','SiteController@historyPage');

Route::get('onprogress','SiteController@onprogressPage');

Route::get('admin','SiteController@adminPage');

Route::get('profile','SiteController@profilePage');

Route::post('profile','SiteController@profileUpdate');

Route::get('adminprofile','SiteController@adminprofilePage');

Route::post('adminprofile','SiteController@adminprofileUpdate');

// Route::get('invoice','SiteController@invoice');
Route::get('admin/request', 'ComponentController@request');

Route::get('admin/stock', 'ComponentController@stock');

Route::get('admin/minimum', 'ComponentController@min');

Route::get('admin/add', 'ComponentController@add');

Route::post('admin/stock-baru','ComponentController@addNewStock');

// Route::post('admin/stock','ComponentController@addStock');
Route::get('admin/invoice-per-customer','SiteController@chooseCustomer');

Route::post('admin', 'ComponentController@input');

Route::get('admin/add-barang-rusak', 'ComponentController@addBarangRusak');

Route::get('admin/customer','ComponentController@customer');

Route::get('admin/customer-search/{query}','ComponentController@customerBySearch');

Route::post('admin/customer','ComponentController@addCustomer');

Route::get('admin/customer/edit/{nama_perus}','SiteController@editCustomerView');

Route::get('admin/customer/delete/{id}','SiteController@deleteCustomer');

Route::post('admin/barang-masuk','BarangRusakController@addBarang');

Route::get('admin/barang-masuk/view','BarangRusakController@viewBarang');

Route::get('admin/barang-selesai/view','SiteController@viewBarangSelesai_billed');

Route::get('admin/barang-selesai/viewbySearch/{query}','SiteController@viewBarangSelesai_billed_bySearch');

Route::get('admin/barang-selesai/viewbyCustomer','SiteController@viewBarangSelesai_billed_byCustomer');

Route::get('admin/barang-selesai/viewbyTglDatang','SiteController@viewBarangSelesai_billed_byTglDatang');

Route::get('admin/barang-selesai/viewbyTglSelesai','SiteController@viewBarangSelesai_billed_byTglSelesai');

Route::get('admin/barang-selesai/viewbyTeknisi','SiteController@viewBarangSelesai_billed_byTeknisi');

Route::get('admin/barang-selesai/viewbyStatus','SiteController@viewBarangSelesai_billed_byStatus');


Route::post('pilihBarangRusak','BarangRusakController@perbaiki');

Route::post('admin/barang-masuk/selesai','BarangRusakController@selesai');

Route::post('teknisi/barang-masuk/unrepairable','BarangRusakController@unrepairable');

Route::get('admin/tambah-stock/{id}','ComponentController@tambahStokView');

Route::post('admin/tambah-jumlah-stok','ComponentController@addStock');

Route::get('admin/update-stock/{id}','ComponentController@updateStockView');

Route::get('admin/delete-stock/{id}','ComponentController@deleteStock');

Route::post('admin/updateStock', 'ComponentController@updateStock');

Route::get('admin/perusahaan-unbilled','SiteController@perusahaanUnbilled');

//yang ngeprint:
// Route::post('admin/pilih-customer','PrintController@showPDF'); //--> yang bener
Route::post('admin/invoice','SiteController@showInvoice'); //--> editable invoice
Route::post('admin/showInvoice','SiteController@showInvoicePerusahaan');

// Route::get('admin/pilih-customer/pdf','SiteController@showInvoicePDF'); // bikin PDF

// Route::get('admin/pilih-customer/pdf','PrintController@showPDF');
// Route::post('admin/pilih-customer','SiteController@invoice');
Route::post('admin/request/approval','ComponentController@approval');

Route::post('admin/request/selesai','BarangRusakController@selesai');

Route::get('user','SiteController@user');

Route::get('/check','ComponentController@checkRequest');

Route::get('/check/count','ComponentController@countRequest');

Route::get('/admin/currency','SiteController@showCurrency');

Route::post('/admin/change','SiteController@changeCurrency');

Route::post('/admin/cari', 'ComponentController@cari');

Route::get('/admin/cari', 'ComponentController@cari');

Route::post('/admin/caristokhabis', 'ComponentController@findfewstock');

Route::get('/admin/caristokhabis', 'ComponentController@findfewstock');

Route::post('/admin/status', 'BarangRusakController@changeStatusBarang');
