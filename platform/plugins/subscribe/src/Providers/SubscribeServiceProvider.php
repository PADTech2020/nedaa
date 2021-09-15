<?php

namespace Botble\Subscribe\Providers;

use Botble\Subscribe\Models\Subscribe;
use Illuminate\Support\ServiceProvider;
use Botble\Subscribe\Repositories\Caches\SubscribeCacheDecorator;
use Botble\Subscribe\Repositories\Eloquent\SubscribeRepository;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class SubscribeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SubscribeInterface::class, function () {
            return new SubscribeCacheDecorator(new SubscribeRepository(new Subscribe));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/subscribe')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
//            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Subscribe::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-subscribe2',
                'priority'    => 4,
                'parent_id'   => null,
                'email'        => 'Email',//'plugins/subscribe::subscribes.name',//trans('email'),
                'icon'        => 'fa fa-envelope',
                'url'         => '/admin/subscribes?ref_lang=all',
                'permissions' => ['subscribe.index'],
            ]);
        });
    }
}
