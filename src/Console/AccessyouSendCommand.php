<?php

namespace Huangdijia\Accessyou\Console;

use Exception;
use Illuminate\Console\Command;

class AccessyouSendCommand extends Command
{
    protected $signature   = 'accessyou:send {mobile} {message}';
    protected $description = 'Send a message by accessyou';

    public function handle()
    {
        $mobile  = $this->argument('mobile');
        $message = $this->argument('message');

        if (!$error = accessyou_send($mobile, $message)) {
            $this->error($error);
        }

        $this->info('send success!');
    }
}