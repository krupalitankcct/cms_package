<?php 

Route::group(['prefix' => '', 'as' => 'cms.'], function () {
    Route::get('/admin/cms_list', 'CmsController@index')->name('cms_list');
	Route::get('/admin/cms_add', 'CmsController@create')->name('cms_add');
	Route::post('/admin/cms_store', 'CmsController@store')->name('cms_store');
	Route::get('/admin/cms_edit/{id}', 'CmsController@edit')->name('cms_edit');
	Route::post('/admin/cms_update/{id}', 'CmsController@update')->name('cms_update');
	Route::post('/admin/cms_upload', 'CmsController@upload')->name('cms_upload');
	Route::get('/admin/cms_destroy/{id}', 'CmsController@destroy')->name('cms_destroy');
	Route::get('/admin/cms_active/{id}', 'CmsController@active')->name('active');
    Route::get('/admin/cms_inactive/{id}', 'CmsController@inactive')->name('inactive');
});



