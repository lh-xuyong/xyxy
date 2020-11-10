<?php

// api
Route::prefix('api')->group(function (){
    Route::get('parameters','Api\CxyController@parameters');
});

// view
Route::prefix('system')->group(function (){
    Route::get('parameters','System\ParameterController@index');
});