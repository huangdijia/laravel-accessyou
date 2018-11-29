<?php

namespace Huangdijia\Accessyou\Console;

use Illuminate\Console\Command;

class SendCommand extends Command
{
    protected $signature   = 'accessyou:send {mobile : Mobile Number} {message : Message Content}';
    protected $description = 'Send a message by accessyou';

    public function handle()
    {
        $mobile    = $this->argument('mobile');
        $message   = $this->argument('message');
        $accessyou = app('sms.accessyou');

        if (!$accessyou->send($mobile, $message)) {
            $this->error($accessyou->getError(), 1);
            return;
        }

        $this->info('send success!', 0);
    }
}
