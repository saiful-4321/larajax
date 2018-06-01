<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category','categoryController');
Route::resource('sub_category','subcategoryController');
Route::resource('ajax','ajaxController');
//Route::get('submission/getSubCategories/{id}', 'ajaxController@getSubCategories');
Route::post('ajaxMes','ajaxController@getSubCategories');
Route::post('categoryDelete','ajaxController@delete');
Route::post('Edit_ajax','ajaxController@updateAjax');
