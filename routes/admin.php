<?php


Route::any('/admin', 'Admin\IndexController@index');

Route::any('/admin/index', 'Admin\AdminController@index');
Route::any('/admin/add', 'Admin\AdminController@add');

//Route::any('/admin/welcome', 'Admin\IndexController@welcome');