<?php

Route::group(['middleware' => 'web', 'prefix' => 'blog', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'BlogController@index');

    Route::group(['prefix' => 'postagem'], function() {
        Route::get('criar', ['uses'=>'BlogController@criar', 'as'=>'post.criar']);
        Route::post('salvar', ['uses'=>'BlogController@salvar', 'as'=>'post.salvar']);
    });
});
