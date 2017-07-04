<?php


//Route::group(['prefix' => 'admin', 'middleware' => 'Woldy\Cms\Http\Middleware\Admin'], function() {
//




Route::get('/font/{font}','Woldy\ResController@font');
Route::get('/fonts/{font}','Woldy\ResController@font');
Route::get('/res', 'Woldy\ResController@res');



// Route::resource('index', 'Portal\IndexController');

// // Route::group(['prefix' => 'index'], function() {
// // 	Route::get('/', function(){
// // 		return Redirect::to('index/index');
// // 	});

// // });



Route::group(['prefix' => 'admin','middleware' => 'auth.admin'], function() {
	// Route::get('/', function(){
	// 	return Redirect::to('admin/index');
	// });
	Route::get('/', 'Admin\IndexController@index');
	Route::resource('index', 'Admin\IndexController');


	Route::get('/menu/list/{type}', 'Admin\MenuController@getList');
	Route::post('/menu/sort', 'Admin\MenuController@postSort');
	Route::get('/menu/del', 'Admin\MenuController@getDel');
	Route::get('/menu/edit', 'Admin\MenuController@getEdit');
	Route::get('/menu/item', 'Admin\MenuController@getItem');
	Route::post('/menu/item', 'Admin\MenuController@postItem');


	Route::get('/model/edit/{table}', 'Admin\ModelController@getEdit');
	Route::post('/model/edit/{table}', 'Admin\ModelController@postEdit');
	Route::get('/model/list', 'Admin\ModelController@getList');
	Route::get('/model/config/list/{table}', 'Admin\ConfigController@getList');
	Route::get('/model/config/form/{table}', 'Admin\ConfigController@getForm');


	Route::get('/model/show/{table}', 'Admin\ModelController@getShow');
	Route::post('/model/addtable', 'Admin\ModelController@postAddtable');
	Route::post('/model/deltable', 'Admin\ModelController@postDeltable');

	Route::get('/category/list', 'Admin\CategoryController@getList');
});


Route::group(['prefix' => 'auth'], function() {
	// Route::get('/', function(){
	// 	return Redirect::to('user/login');
	// });
	Route::resource('/', 'Auth\UserController@login');
	Route::resource('/admin/login', 'Auth\AdminController');
	Route::resource('/user', 'Auth\UserController');
});

Route::group(['middleware' => ['\Woldy\Cms\Http\Middleware\WikiAuth::class']], function(){
	Route::get('/wiki/{name}', 'Wiki\IndexController@show');
	Route::get('/wiki/edit/{name}', 'Wiki\EditController@show');
	Route::post('/wiki/edit/{name}', 'Wiki\EditController@store');
});
