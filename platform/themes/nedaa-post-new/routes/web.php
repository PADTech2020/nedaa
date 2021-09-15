<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\NedaaPost\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'NedaaPostController@getHello');
        Route::get('/', [
            'as'   => 'public.index',
            'uses' => 'NedaaPostController@home2',
        ]);
        Route::get('/home2', [
            'as'   => 'public.index',
            'uses' => 'NedaaPostController@getIndex',
        ]);

        Route::get('/about-us', [
            'as'   => 'public.about',
            'uses' => 'NedaaPostController@aboutPage',
        ]);
        
        Route::get('/getSiteMap', [
            'as'   => 'public.getSiteMap',
            'uses' => 'NedaaPostController@getSiteMap',
        ]);
        
        Route::get('/researchers/{id}', [
            'as'   => 'public.about',
            'uses' => 'NedaaPostController@researcherPage',
        ]);
        Route::get('/articles/{id}', [
            'as'   => 'public.about',
            'uses' => 'NedaaPostController@postsForResearchers',
        ]);

//        Route::get('/', 'NedaaPostController@home2')
//            ->name('public.index');
        Route::get('/contact-us', [
            'as'   => 'public.index',
            'uses' => 'NedaaPostController@contact',
        ]);
    });

});

Theme::routes();

Route::group(['namespace' => 'Theme\NedaaPost\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

//        Route::get('/', 'NedaaPostController@getIndex')
//            ->name('public.index');
        Route::get('/', [
            'as'   => 'public.index',
            'uses' => 'NedaaPostController@home2',
        ]);
        Route::get('sitemap.xml', 'NedaaPostController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'NedaaPostController@getView')
            ->name('public.single');

    });
});
