# SMS gateway for HK accessyou

[![Latest Stable Version](https://poser.pugx.org/huangdijia/laravel-accessyou/version.png)](https://packagist.org/packages/huangdijia/laravel-accessyou)
[![Total Downloads](https://poser.pugx.org/huangdijia/laravel-accessyou/d/total.png)](https://packagist.org/packages/huangdijia/laravel-accessyou)


## Requirements

* PHP >= 7.0
* Laravel >= 5.5

## Installation

First, install laravel 5.5, and make sure that the database connection settings are correct.

~~~bash
composer require huangdijia/laravel-accessyou
~~~

Then run these commands to publish config

~~~bash
php artisan vendor:publish --provider="Huangdijia\Accessyou\AccessyouServiceProvider"
~~~

## Configurations

~~~php
// config/accessyou.php
    'account'  => 'your account',
    'password' => 'your password',
~~~

## Usage

### As Facade

~~~php
use Huangdijia\Accessyou\Facades\Accessyou;

...

if (!Accessyou::send('mobile', 'some message')) {
    echo Accessyou::getError();
    echo Accessyou::getErrno();
} else {
    echo "send success";
}

~~~

### As Command

~~~bash
php artisan accessyou:send 'mobile' 'some message'
# send success
# or
# error
~~~

### As Helper

~~~php
if (!accessyou()->send('mobile', 'some message')) {
    echo accessyou()->getError();
    echo accessyou()->getErrno();
} else {
    echo "send success";
}
if (!$error = accessyou_send('mobile', 'some message')) {
    echo $error;
} else {
    echo "send success";
}
~~~

## Other

> * http://accessyou.com

## License

laravel-ipip is licensed under The MIT License (MIT).