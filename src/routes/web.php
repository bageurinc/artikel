<?php
Route::name('bageur.')->group(function () {
	Route::group(['prefix' => 'bageur/v1','middleware' => 'api'], function () {
		Route::apiResource('artikel', 'bageur\artikel\ArtikelController');
		Route::apiResource('kategori', 'bageur\artikel\KategoriController');
	});
});