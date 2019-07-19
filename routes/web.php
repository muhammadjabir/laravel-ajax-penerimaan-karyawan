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
Route::get('/seleksi',function(){
	return view('uiuser.seleksi');
})->name('seleksi');

Route::get('/seleksi/hasil','CalonController@seleksi')->name('hasil.seleksi');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lamaran', 'CalonController@lamaran')->name('lamaran');
Route::get('/calon/data', 'CalonController@data')->name('data.calon');
Route::get('/print/jadwal', 'PrintController@jadwal')->name('print.jadwal');
Route::get('/interview/data', 'InterviewController@data')->name('data.interview');
Route::get('/interview/tindakan', 'InterviewController@tindakan')->name('interview.tindakan');
Route::get('/download/{id}', 'CalonController@download')->name('download');
Route::resource('calon', 'CalonController');
Route::get('/users/data','UserController@data')->name('data.users');
Route::resource('users', 'UserController');
Route::resource('interview', 'InterviewController');
Route::get('/karyawan', 'KaryawanController@index')->name('karyawan.index');
Route::get('/karyawan/data','KaryawanController@data')->name('data.karyawan');
Route::get('/print/karyawan','PrintController@karyawan')->name('print.karyawan');
Route::get('/loker','InterviewController@loker')->name('loker');
