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
  return view('frontend.landing');
});
Route::prefix('admin')->group(function () {
	Route::get('/', 'AdminController@index')->name('admin');
	// Master Pondok ----------------------------------------------------------------------------------
	Route::get('/pondok', 'AdminController@pondok')->name('admin.pondok');
	Route::get('/pondok/get-data', 'AdminPondokController@get_pondok')->name('admin.pondok.get');
	Route::get('/pondok/get-detail/{id}', 'AdminPondokController@get_detail_pondok')->name('admin.pondok.getDetail');
	Route::get('/pondok/add-data', 'AdminPondokController@add_pondok')->name('admin.pondok.add');
	Route::get('/pondok/add-data-galeri/{id}', 'AdminPondokController@add_galeriPondok')->name('admin.pondok.addGaleri');
	Route::post('/pondok/save-data', 'AdminPondokController@save_pondok')->name('admin.pondok.save');
	Route::get('/pondok/edit-data/{id}', 'AdminPondokController@edit_pondok')->name('admin.pondok.edit');
	Route::post('/pondok/update-data/{id}', 'AdminPondokController@update_pondok')->name('admin.pondok.update');
	Route::post('/pondok/upload-image', 'AdminPondokController@save_image')->name('admin.pondok.upload_image');
});

Route::get('/get-city/{id}', 'WilayahController@get_city')->name('get.city');
Route::get('/get-kecamatan/{id}', 'WilayahController@get_kecamatan')->name('get.kecamatan');
Route::get('/get-desa/{id}', 'WilayahController@get_desa')->name('get.desa');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
