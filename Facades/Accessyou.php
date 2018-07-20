<?php

namespace Huangdijia\Accessyou\Facades;

use Illuminate\Support\Facades\Facade;

class Accessyou extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms.accessyou'; 
    }
}