<?php

namespace Huangdijia\Accessyou;

use Illuminate\Support\ServiceProvider;

class AccessyouServiceProvider extends ServiceProvider
{
    protected $defer = true;

    protected $commands = [
        Console\SendCommand::class,
        Console\InfoCommand::class,
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => $this->app->basePath('config/accessyou.php')]);
        }
    }

    public function register()
    {
        $this->app->singleton(Accessyou::class, function () {
            return new Accessyou(config('accessyou'));
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
