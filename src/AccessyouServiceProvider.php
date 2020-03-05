<?php

namespace Huangdijia\Accessyou;

use Illuminate\Support\ServiceProvider;

class AccessyouServiceProvider extends ServiceProvider
{
    // protected $defer = true;

    protected $commands = [
        Console\SendCommand::class,
        Console\InfoCommand::class,
        Console\InstallCommand::class,
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/accessyou.php' => $this->app->basePath('config/accessyou.php')], 'config');
        }
    }

    public function register()
    {
        $this->app->singleton(Accessyou::class, function () {
            return new Accessyou($this->app['config']->get('accessyou'));
        });

        $this->app->alias(Accessyou::class, 'sms.accessyou');

        $this->commands($this->commands);
    }

    public function provides()
    {
        return [
            Accessyou::class,
            'sms.accessyou',
        ];
    }
}
