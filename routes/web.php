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
    $data['menu'] = 1;
    return view('pages.home')->with($data);
});

Route::resource('wisata', 'WisataController');
Route::get('/cetak', 'WisataController@cetak');

// Route::group(['prefix'=>'wisata'], function()
// {
//   Route::get('/', 'WisataController@index');
//   Route::get('/tambah', 'WisataController@create');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
