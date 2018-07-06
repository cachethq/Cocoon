<?php

/*
 * This file is part of Cocoon.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cocoon\Events;

use CachetHQ\Cocoon\Manifest;
use CachetHQ\Cocoon\ThemeManager;
use Illuminate\Contracts\Container\Container;

/**
 * This is the theme was called event class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class ThemeWasCalled implements CocoonEventInterface
{
    /**
     * The app instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $app;

    /**
     * Create a new theme was called instance.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     *
     * @return void
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Load a theme into the factory.
     *
     * @param object $theme
     * @param string $path
     *
     * @return void
     */
    public function loadTheme($theme, $path)
    {
        $themeManager = $this->app->make(ThemeManager::class);
        $themeManager->registerTheme(new Manifest($theme, $path));
    }
}
