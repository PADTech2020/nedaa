<?php

Route::group(['namespace' => 'Botble\Subscribe\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'subscribes', 'as' => 'subscribe.'], function () {
            Route::resource('', 'SubscribeController')->parameters(['' => 'subscribe']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'SubscribeController@deletes',
                'permission' => 'subscribe.destroy',
            ]);
        });
    });

});
