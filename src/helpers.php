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

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string  $name
     * @return string
     */
    function config_path($name = '')
    {
        if (is_callable(app(), 'getConfigurationPath')) {
            return app()->getConfigurationPath($name);
        } elseif (app()->has('path.config')) {
            return app()->make('path.config') . ($name ? DIRECTORY_SEPARATOR . $name : $name);
        } else {
            return app()->make('path') . '/../config' . ($name ? DIRECTORY_SEPARATOR . $name : $name);
        }
    }
}
