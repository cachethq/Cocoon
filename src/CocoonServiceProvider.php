<?php

/*
 * This file is part of Cocoon.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cocoon;

use CachetHQ\Cocoon\Events\ThemeWasCalled;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the cocoon service provider class.
 *
 * @author James Brooks <james@bluebaytravel.co.uk>
 */
class CocoonServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(resource_path('views/vendor/theme'), 'theme');

        $themeWasCalled = app(ThemeWasCalled::class);

        event($themeWasCalled);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ThemeManager::class, function (Container $app) {
            return new ThemeManager($app);
        });
    }
}
