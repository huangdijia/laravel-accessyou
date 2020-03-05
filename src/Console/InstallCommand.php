<?php

namespace Huangdijia\Accessyou\Console;

use Huangdijia\Accessyou\AccessyouServiceProvider;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature   = 'accessyou:install';
    protected $description = 'Install config.';

    public function handle()
    {
        $this->info('Installing Package...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => AccessyouServiceProvider::class,
            '--tag'      => "config",
        ]);

        $this->info('Installed Package');
    }
}
