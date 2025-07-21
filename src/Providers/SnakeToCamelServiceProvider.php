<?php

namespace Rizkussef\LaravelSnakeToCamelCase\Providers;

use Illuminate\Support\ServiceProvider;
use Rizkussef\LaravelSnakeToCamelCase\Middleware\ConvertCamelToSnakeCase;
use Rizkussef\LaravelSnakeToCamelCase\Middleware\ConvertSnakeToCamelCase;

class SnakeToCamelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config so users can override it
        $this->publishes([
            __DIR__ . '/../../Config/snake-to-camel.php' => config_path('snake-to-camel.php'),
        ], 'config');
        // Merge config so defaults work without publishing
        $this->mergeConfigFrom(
            __DIR__ . '/../../Config/snake-to-camel.php',
            'snake-to-camel'
        );
        // Register response middleware if enabled
        if (config('snake-to-camel.convert_response', true)) {
            if (config('snake-to-camel.apply_to') === 'all') {
                $this->app['router']->middleware(ConvertSnakeToCamelCase::class);
            } else {
                $this->app['router']->pushMiddlewareToGroup('api', ConvertSnakeToCamelCase::class);
            }
        }

        // Register request middleware if enabled
        if (config('snake-to-camel.convert_request', true)) {
            if (config('snake-to-camel.apply_to') === 'all') {
                $this->app['router']->middleware(ConvertCamelToSnakeCase::class);
            } else {
                $this->app['router']->pushMiddlewareToGroup('api', ConvertCamelToSnakeCase::class);
            }
        }
    }

    public function register()
    {
        // Config publishing if added later
    }
}
