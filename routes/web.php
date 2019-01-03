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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->middleware('check.access.control');

Route::get('testupload', [
    'as'    => 'test.fileupload',
    'uses'  => 'TestController@fileUpload'
]);

Route::post('uploadsinglefile', [
    'as'    => 'test.singlefile',
    'uses'  => 'TestController@singlefile'
]);

Route::post('uploadmultiplefile', [
    'as'    => 'test.multiplefile',
    'uses'  => 'TestController@multiplefile'
]);

Route::middleware(['web', 'check.access.control'])->group(function () {

    //Route::get('/kategori_soal', 'KategoriSoalController@index')->name('kategori_soal');
    Route::resource('kategori_soal', 'KategoriSoalController');

    Route::get('/zzzz', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});
