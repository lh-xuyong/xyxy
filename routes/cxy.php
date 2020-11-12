<?php

// api
Route::prefix('api')->group(function (){
    Route::get('parameters','Api\CxyController@parameters');
    Route::post('parameters/create','Api\CxyController@parameterCreate');
});

// view
Route::prefix('system')->group(function (){
    Route::get('parameters','System\ParameterController@index');
    Route::get('parameters/create','System\ParameterController@create');
    Route::get('parameters/edit/{id}','System\ParameterController@edit');
    Route::put('parameters/edit/{id}','System\ParameterController@update');
});