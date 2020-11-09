<?php

Route::get('/cxy',function(){
    return 'Hi! I am your father';
});

Route::prefix('system')->group(function (){
    Route::get('parameters','Parameter@index');
});