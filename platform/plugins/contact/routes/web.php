<?php

Route::group(['namespace' => 'Botble\Contact\Http\Controllers', 'middleware' => 'web'], function () {
    Route::post('contact/send', [
        'as'   => 'public.send.contact',
        'uses' => 'PublicController@postSendContact',
    ]);
    Route::post('contact/subscribe', [
        'as'   => 'public.send.subscribe',
        'uses' => 'PublicController@subscribe',
    ]);

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {

            Route::resource('', 'ContactController')->except(['create', 'store'])->parameters(['' => 'contact']);
            Route::get('subscribe', [
                'as'   => 'subscribe',
                'uses' => 'ContactController@subscribeList',
                'permission' => 'contacts.subscribe',
            ]);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ContactController@deletes',
                'permission' => 'contacts.destroy',
            ]);

            Route::post('reply/{id}', [
                'as'   => 'reply',
                'uses' => 'ContactController@postReply',
            ]);
        });
    });
});
