<?php
if (!function_exists('accessyou')) {
    function accessyou()
    {
        return app('sms.accessyou');
    }
}

if (!function_exists('accessyou_send')) {
    function accessyou_send($mobile = '', $message = '')
    {
        return app('sms.accessyou')->send($mobile, $message) ?: app('sms.accessyou')->getError();
    }
}