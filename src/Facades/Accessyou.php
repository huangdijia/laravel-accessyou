<?php

namespace Huangdijia\Accessyou\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static boolean send($mobile, $message)
 * @see \Huangdijia\Accessyou\Accessyou
 */

class Accessyou extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms.accessyou'; 
    }
}