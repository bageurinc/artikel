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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'homeController@index')->name('home');
Route::get('/about', 'aboutController@index')->name('about');
Route::get('/haji', 'hajiController@index')->name('haji');
Route::get('/haji/{id}/{any}', 'hajiController@detailhaji')->name('detailhaji');
Route::get('/umroh', 'umrohController@index')->name('umroh');
Route::get('/umroh/{id}/{any}', 'umrohController@detailumroh')->name('detailumroh');
Route::get('/gallery', 'galleryController@index')->name('gallery');
Route::get('/gallery/{id}/{any}', 'galleryController@detailgallery')->name('detailgallery');
Route::get('/rewards-acknowlegement', 'rewardsController@index')->name('rewards');
Route::get('/news', 'newsController@index')->name('news');
Route::get('/artikel/{id}/{any}', 'newsController@detailartikel')->name('detailartikel');
