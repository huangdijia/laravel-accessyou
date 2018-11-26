<?php

namespace Huangdijia\Accessyou\Console;

use Illuminate\Console\Command;

class AccessyouInfoCommand extends Command
{
    protected $signature   = 'accessyou:info';
    protected $description = 'Check account info of accessyou';

    public function handle()
    {
        $accessyou = app('sms.accessyou');
        $result    = $accessyou->info();

        if (!$result) {
            $this->error($accessyou->getError(), 1);
            return;
        }

        $this->info("AccountInfo:");
        $this->table(array_keys($result), [array_values($result)]);
    }
}
