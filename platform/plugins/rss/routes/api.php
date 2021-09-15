<?php

Route::group([
    'middleware' => 'api',
    'prefix'     => 'api/v1',
    'namespace'  => 'Botble\Rss\Http\Controllers',
], function () {

    Route::get('rss', 'PublicController@rss');


});
