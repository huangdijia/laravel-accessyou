<?php

namespace Huangdijia\Accessyou;

use Illuminate\Support\ServiceProvider;

class AccessyouServiceProvider extends ServiceProvider
{
    protected $defer = true;
    protected $commands = [
        'Huangdijia\\Accessyou\\Console\\AccessyouSendCommand',
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config/config.php' => config_path('accessyou.php')]);
        }
    }

    public function register()
    {
        $this->app->singleton('sms.accessyou', function () {
            return new Accessyou(config('accessyou'));
        });
        $this->commands($this->commands);
    }

    public function provides()
    {
        return [
            'sms.accessyou'
        ];
    }
}