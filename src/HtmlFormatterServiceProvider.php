<?php

namespace Navindex\LaravelHtmlFormatter;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Navindex\LaravelHtmlFormatter\HtmlFormatter;

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

        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(HtmlFormatter::class);
    }
}
