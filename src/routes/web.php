<?php
Route::name('bageur.')->group(function () {
	Route::group(['prefix' => 'bageur/v1'], function () {
		Route::apiResource('artikel', 'bageur\artikel\ArtikelController');
	});
});