<?php

namespace Botble\Rss\Providers;

use Botble\Rss\Models\Rss;
use Illuminate\Support\ServiceProvider;
use Botble\Rss\Repositories\Caches\RssCacheDecorator;
use Botble\Rss\Repositories\Eloquent\RssRepository;
use Botble\Rss\Repositories\Interfaces\RssInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class RssServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(RssInterface::class, function () {
            return new RssCacheDecorator(new RssRepository(new Rss));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/rss')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
//            ->loadAndPublishTranslations()
            ->loadRoutes(['web', 'api']);

        Event::listen(RouteMatched::class, function () {
//            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
//                \Language::registerModule([Rss::class]);
//            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-rss',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => __('RSS'),
                'icon'        => 'fa fa-list',
                'url'         => route('rss.index'),
                'permissions' => ['rss.index'],
            ]);
        });
    }
}
