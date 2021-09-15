<?php

Route::group(['namespace' => 'Botble\AutoReloadPosts\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'auto-reload-posts', 'as' => 'auto-reload-posts.'], function () {
            Route::resource('', 'AutoReloadPostsController')->parameters(['' => 'auto-reload-posts']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'AutoReloadPostsController@deletes',
                'permission' => 'auto-reload-posts.destroy',
            ]);
        });
    });

});
