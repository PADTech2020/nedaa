<?php
Route::get('ajax-featured-posts', 'AutoReloadPostsAPIController@ajaxFeaturedPosts');
Route::group([
    'middleware' => 'api',
    'prefix'     => 'api/v1',
    'namespace'  => 'Botble\AutoReloadPosts\Http\Controllers\API',
], function () {

    Route::post('ajax-featured-posts', 'AutoReloadPostsAPIController@ajaxFeaturedPosts');
    Route::get('ajax-featured-posts', 'AutoReloadPostsAPIController@ajaxFeaturedPosts');
});


