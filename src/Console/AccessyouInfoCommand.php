<?php

namespace Huangdijia\Accessyou\Console;

use Exception;
use Illuminate\Console\Command;

class AccessyouInfoCommand extends Command
{
    protected $signature   = 'accessyou:info';
    protected $description = 'Check account info of accessyou';

    public function handle()
    {
        $accessyou = app('sms.accessyou');
        $result = $accessyou->info();

        if (!$result) {
            $this->error($accessyou->getError(), 1);
            return;
        }

        $this->info("account_no:{$result['account_no']}");
        $this->info("balance:{$result['balance']}");
        $this->info("expiry_date:{$result['expiry_date']}");
    }
}