<?php


Route::any('/admin', 'Admin\IndexController@index');

Route::any('/admin/index', 'Admin\AdminController@index');
Route::any('/admin/add', 'Admin\AdminController@add');

Route::any('/devops/index', 'Admin\DevopsController@index');
Route::any('/devops/import', 'Admin\DevopsController@import');
Route::any('/devops/export', 'Admin\DevopsController@export');

//Route::any('/admin/welcome', 'Admin\IndexController@welcome');