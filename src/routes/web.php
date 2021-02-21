<?php
Route::name('bageur.')->group(function () {
	Route::group(['prefix' => 'bageur/v1','middleware' => 'jwt.verify'], function () {
		Route::apiResource('artikel', 'bageur\artikel\ArtikelController');
		Route::apiResource('kategori', 'bageur\artikel\KategoriController');
		Route::apiResource('author', 'bageur\artikel\AuthorController');
		Route::apiResource('komen', 'bageur\artikel\KomenController');
	});
});