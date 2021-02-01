<?php 

Route::group(['prefix' => '', 'as' => 'cms.'], function () {
    Route::get('/cms_list', 'CmsController@index')->name('cms_list');
	Route::get('/cms_add', 'CmsController@create')->name('cms_add');
	Route::post('/cms_store', 'CmsController@store')->name('cms_store');
	Route::get('/cms_edit/{id}', 'CmsController@edit')->name('cms_edit');
	Route::post('/cms_update/{id}', 'CmsController@update')->name('cms_update');
	Route::post('/cms_upload', 'CmsController@upload')->name('cms_upload');
	Route::get('/cms_destroy/{id}', 'CmsController@destroy')->name('cms_destroy');
	Route::get('cms_active/{id}', 'CmsController@active')->name('active');
    Route::get('cms_inactive/{id}', 'CmsController@inactive')->name('inactive');
});



