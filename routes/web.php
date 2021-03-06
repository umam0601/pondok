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

// Route::get('/', function () {
Route::group(['middleware' => ['guest', 'web']], function () {
	Route::get('/admin/login', 'Admin\login_controller@showLoginForm')->name('admin.login');
	Route::post('authenticate', ['uses' => 'Admin\login_controller@authenticate'])->name('login.auth');
	Route::post('authuser', ['uses' => 'Admin\login_controller@authenticate_user'])->name('login.auth_user');
});

Route::prefix('/')->group(function(){
	Route::get('/frontend2', function(){
		return view('main2');
	});
  Route::get('','Frontend\FrontendController@index')->name('frontend.index');
	Route::get('/get-maps', 'Frontend\FrontendController@get_maps')->name('frontend.get_maps');
  Route::get('/pondok-pesantren','Frontend\FrontendController@pondok')->name('frontend.pondok');
  Route::get('/pondok-pesantren/context-of/{id}', ['uses' => 'Frontend\FrontendController@pondok_context'])->name('frontend.pondok_context');
	Route::get('/pondok-pesantren/search', 'Frontend\FrontendController@searching')->name('frontend.pondok.search');
	Route::get('/pondok-pesantren/filter', 'Frontend\FrontendController@filter')->name('frontend.pondok.filter');
	Route::get('/pondok-pesantren/wilayah', ['uses' => 'Frontend\FrontendController@wilayah'])->name('frontend.pondok.wilayah');

  // Review Pondok
  Route::get('/review', 'Frontend\FrontendController@review')->name('frontend.review');
  Route::get('/review/get-review', 'Frontend\FrontendController@get_review')->name('frontend.get_review');
  Route::get('/review/grap-review', 'Frontend\FrontendController@grapReview')->name('frontend.grap_review');
  Route::get('/review/cari-pondok', 'Frontend\FrontendController@cari_pondok')->name('frontend.cari_pondok');
  Route::get('/review/set-pondok', 'Frontend\FrontendController@set_pondok')->name('frontend.set_pondok');
  Route::post('/review/save-review', 'Frontend\FrontendController@save_review')->name('frontend.save_review');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'adminonly']], function () {
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	// Master Pondok ----------------------------------------------------------------------------------
	Route::get('/pondok', 'Admin\AdminController@pondok')->name('admin.pondok');
	Route::get('/pondok/get-data', 'Admin\AdminPondokController@get_pondok')->name('admin.pondok.get');
	Route::get('/pondok/get-detail/{id}', 'Admin\AdminPondokController@get_detail_pondok')->name('admin.pondok.getDetail');
	Route::get('/pondok/add-data', 'Admin\AdminPondokController@add_pondok')->name('admin.pondok.add');
	Route::get('/pondok/add-data-galeri/{id}', 'Admin\AdminPondokController@add_galeriPondok')->name('admin.pondok.addGaleri');
	Route::post('/pondok/save-data', 'Admin\AdminPondokController@save_pondok')->name('admin.pondok.save');
	Route::get('/pondok/edit-data/{id}', 'Admin\AdminPondokController@edit_pondok')->name('admin.pondok.edit');
	Route::post('/pondok/update-data', 'Admin\AdminPondokController@update_pondok')->name('admin.pondok.update');
	Route::post('/pondok/upload-image', 'Admin\AdminPondokController@save_image')->name('admin.pondok.upload_image');
	Route::post('/pondok/hapus-data', 'Admin\AdminPondokController@hapus_pondok')->name('admin.pondok.hapus');
	Route::post('/pondok/slider/{id}', 'Admin\AdminPondokController@slider')->name('admin.pondok.slider');
	Route::get('/pondok/map/{id}', 'Admin\AdminPondokController@map')->name('admin.pondok.map');
	Route::get('/pondok/get-maps', 'Admin\AdminPondokController@get_maps')->name('admin.pondok.get_maps');
	Route::get('/pondok/get-latlng', 'Admin\AdminPondokController@get_lat_long')->name('admin.pondok.get_lat_long');
	Route::post('/pondok/save-map', 'Admin\AdminPondokController@save_map')->name('admin.pondok.save_map');
	Route::get('/pondok/check_latlng', 'Admin\AdminPondokController@check_latlng')->name('admin.pondok.check_latlng');

	// Master Kitab ----------------------------------------------------------------------------------
	Route::get('/kitab', 'Admin\AdminController@kitab')->name('admin.kitab');
	Route::get('/kitab/get-data', 'Admin\AdminKitabController@get_kitab')->name('admin.kitab.get');
	Route::post('/kitab/save-data', 'Admin\AdminKitabController@save_kitab')->name('admin.kitab.save');
	Route::get('/kitab/get-detail', 'Admin\AdminKitabController@get_detail')->name('admin.kitab.get_detail');
	Route::get('/kitab/edit-data', 'Admin\AdminKitabController@edit_kitab')->name('admin.kitab.edit');
	Route::post('/kitab/update-data', 'Admin\AdminKitabController@update_kitab')->name('admin.kitab.update');
	Route::post('/kitab/hapus-data', 'Admin\AdminKitabController@hapus_kitab')->name('admin.kitab.hapus');

	// Master Rieview
	Route::get('/user', 'Admin\AdminController@user')->name('admin.user');
	Route::get('/user/resource', 'Admin\AdminController@get_user')->name('admin.user.resource');

	// Master Rieview
	Route::get('/review', 'Admin\AdminController@review')->name('admin.review');
	Route::get('/review/resource', 'Admin\AdminController@get_review')->name('admin.review.resource');

	Route::post('signout', ['uses' => 'Admin\login_controller@logout'])->name('login.signout');
});

Route::get('/get-city/{id}', 'WilayahController@get_city')->name('get.city');
Route::get('/get-kecamatan/{id}', 'WilayahController@get_kecamatan')->name('get.kecamatan');
Route::get('/get-desa/{id}', 'WilayahController@get_desa')->name('get.desa');
Route::get('/get-pondok/{id}', 'Frontend\FrontendController@get_pondok')->name('get.pondok');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
