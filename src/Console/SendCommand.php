<?php

namespace Huangdijia\Accessyou\Console;

use Illuminate\Console\Command;

class SendCommand extends Command
{
    protected $signature   = 'accessyou:send {mobile : Mobile Number} {message : Message Content}';
    protected $description = 'Send a message by accessyou';

    public function handle()
    {
        $mobile  = $this->argument('mobile');
        $message = $this->argument('message');

        try {
            $this->laravel->make('sms.accessyou')->send($mobile, $message);
        } catch (\Exception $e) {
            $this->error($e->getMessage(), 1);
            return;
        }

        $this->info('send success!', 0);
    }
}
