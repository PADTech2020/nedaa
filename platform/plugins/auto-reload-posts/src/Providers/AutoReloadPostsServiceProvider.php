<?php

namespace Botble\AutoReloadPosts\Providers;

use Botble\AutoReloadPosts\Models\AutoReloadPosts;
use Illuminate\Support\ServiceProvider;
use Botble\AutoReloadPosts\Repositories\Caches\AutoReloadPostsCacheDecorator;
use Botble\AutoReloadPosts\Repositories\Eloquent\AutoReloadPostsRepository;
use Botble\AutoReloadPosts\Repositories\Interfaces\AutoReloadPostsInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class AutoReloadPostsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(AutoReloadPostsInterface::class, function () {
            return new AutoReloadPostsCacheDecorator(new AutoReloadPostsRepository(new AutoReloadPosts));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/auto-reload-posts')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web','api']);

        add_shortcode('auto-reload-posts', 'Auto Reload Posts', 'Auto Reload Posts', function($shortcode) {
           
             
                return view('plugins/auto-reload-posts::auto-load-posts')->with('number',6)->render();
            

        });


        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([AutoReloadPosts::class]);
            }

//            dashboard_menu()->registerItem([
//                'id'          => 'cms-plugins-auto-reload-posts',
//                'priority'    => 5,
//                'parent_id'   => null,
//                'name'        => 'plugins/auto-reload-posts::auto-reload-posts.name',
//                'icon'        => 'fa fa-list',
//                'url'         => route('auto-reload-posts.index'),
//                'permissions' => ['auto-reload-posts.index'],
//            ]);
        });
    }
}
