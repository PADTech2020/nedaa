<?php

namespace Botble\AutoReloadPosts\Providers;

use Assets;
use Illuminate\Support\Facades\Auth;
use Botble\Dashboard\Supports\DashboardWidgetInstance;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Throwable;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    /**
     * @return void
     */
    public function registerScripts()
    {
        Assets::addScriptsDirectly( 'vendor/core/plugins/auto-reload-posts/js/script-auto-reload.js');


    }


}
