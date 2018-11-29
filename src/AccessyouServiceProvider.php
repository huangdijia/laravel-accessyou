<?php

namespace Huangdijia\Accessyou;

use Huangdijia\Accessyou\Console\InfoCommand;
use Huangdijia\Accessyou\Console\SendCommand;
use Illuminate\Support\ServiceProvider;

class AccessyouServiceProvider extends ServiceProvider
{
    protected $defer = true;

    protected $commands = [
        SendCommand::class,
        InfoCommand::class,
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => config_path('accessyou.php')]);
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
