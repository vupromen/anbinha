<?php

use Illuminate\Support\Facades\Route;

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
//Frontend
Route::get('/','HomeController@index');

Route::get('/trang-chu','HomeController@index');
Route::get('/gioi-thieu','HomeController@gioithieu');
Route::get('/lien-he','HomeController@lienhe');
Route::get('/chi-tiet/{baiviet_id}','QuanLyBaiViet@details');

//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@showdashboard');
Route::get('/dangxuat','AdminController@dangxuat');
Route::post('/admin-dashboard','AdminController@dashboard');
//QlyBaiViet
Route::get('/add-baiviet','QuanLyBaiViet@add_baiviet');
Route::get('/all-hinh/{baiviet_id}','QuanLyBaiViet@all_hinh');
Route::post('/save-img','QuanLyBaiViet@save_img');
Route::get('/delete-hinh/{id}','QuanLyBaiViet@delete_hinh');
Route::get('/edit-baiviet/{baiviet_id}','QuanLyBaiViet@edit_baiviet');
Route::get('/delete-baiviet/{baiviet_id}','QuanLyBaiViet@delete_baiviet');
Route::get('/all-baiviet','QuanLyBaiViet@all_baiviet');
Route::post('/save-baiviet','QuanLyBaiViet@save_baiviet');
Route::post('/update-baiviet/{baiviet_id}','QuanLyBaiViet@update_baiviet');
