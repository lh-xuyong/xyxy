<?php

// api
Route::prefix('api')->group(function (){
    Route::get('parameters','Api\CxyController@parameters');
    Route::post('parameters/create','Api\CxyController@parameterCreate');
});

// view
Route::prefix('system')->group(function (){
    Route::any('parameters','System\ParameterController@index');
    Route::get('parameters/create','System\ParameterController@create');
    Route::get('parameters/edit/{id}','System\ParameterController@edit');
    Route::put('parameters/edit/{id}','System\ParameterController@update');
    Route::post('parameters/store','System\ParameterController@store');
    Route::delete('parameters/delete/{id}', 'System\ParameterController@destroy');
    Route::get('parameters/show/{id}', 'System\ParameterController@show');
    Route::get('parameters/show/{id}', 'System\ParameterController@show');
});