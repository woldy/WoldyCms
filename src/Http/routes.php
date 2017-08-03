<?php

Route::group(['prefix' => 'admin','middleware' => '\Woldy\Cms\Http\Middleware\AdminAuth::class'], function() {

	Route::get('/', 'Admin\IndexController@index');
	Route::resource('index', 'Admin\IndexController');


	Route::get('/setting/{type}', 'Admin\SettingController@index');





	Route::get('/menu/list/{type}', 'Admin\MenuController@getList');
	Route::post('/menu/sort', 'Admin\MenuController@postSort');
	Route::get('/menu/del', 'Admin\MenuController@getDel');
	Route::get('/menu/edit', 'Admin\MenuController@getEdit');
	Route::get('/menu/item', 'Admin\MenuController@getItem');
	Route::post('/menu/item', 'Admin\MenuController@postItem');


	Route::get('/model/edit/{table}', 'Admin\ModelController@getEdit');
	Route::post('/model/edit/{table}', 'Admin\ModelController@postEdit');
	Route::get('/model/list', 'Admin\ModelController@getList');

	Route::get('/mitem/list/{table}', 'Admin\MitemController@getList');

	Route::get('/model/config/list/{table}', 'Admin\Model\ConfigController@getList');
	Route::get('/model/config/form/{table}', 'Admin\SettingController@getForm');


	Route::get('/model/show/{table}', 'Admin\ModelController@getShow');
	Route::post('/model/addtable', 'Admin\ModelController@postAddtable');
	Route::post('/model/deltable', 'Admin\ModelController@postDeltable');

	Route::get('/category/list', 'Admin\CategoryController@getList');

	Route::get('/cache/list','Admin\CacheController@getList');
});




//TODO
Route::group(['prefix' => 'user','middleware' => '\Woldy\Cms\Http\Middleware\UserAuth::class'], function() {
	Route::get('/', 'User\ProfileController@index');
	Route::resource('index', 'User\ProfileController');



	Route::resource('profile', 'User\ProfileController');//TODO
	Route::resource('reg', 'Auth\RegController');//TODO
	Route::resource('reset', 'User\LoginController');//TODO
});






Route::group(['prefix' => 'auth'], function() {
	Route::resource('/', 'Auth\UserController@login');
	Route::resource('/admin/login', 'Auth\AdminController');
	Route::resource('/user/login', 'Auth\UserController');
	Route::resource('/user/reg', 'Auth\RegController');
	Route::get('logout', 'Auth\UserController@logout');
});

Route::group(['middleware' => ['\Woldy\Cms\Http\Middleware\WikiAuth::class']], function(){
	Route::get('/wiki/{name}', 'Wiki\IndexController@show');
	Route::get('/wiki/edit/{name}', 'Wiki\EditController@show');
	Route::post('/wiki/edit/{name}', 'Wiki\EditController@store');
});
