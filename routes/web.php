<?php
Auth::routes();
Route::get('/logout-manula',function(){
    request()->session()->invalidate();
});
Route::get('/{any}', 'AppController@index')->where('any','.*');
