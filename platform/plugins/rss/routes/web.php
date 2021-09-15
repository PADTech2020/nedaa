<?php

Route::group(['namespace' => 'Botble\Rss\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'rsses', 'as' => 'rss.'], function () {
            Route::resource('', 'RssController')->parameters(['' => 'rss']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'RssController@deletes',
                'permission' => 'rss.destroy',
            ]);
        });
    });

});
