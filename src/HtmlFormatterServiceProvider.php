<?php

namespace Navindex\LaravelHtmlFormatter;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class HtmlFormatterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/htmlformatter.php', 'htmlformatter');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/htmlformatter.php' => App::configPath('htmlformatter.php'),
            ], 'config');
        }
    }
}
