<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:55
 */

namespace App\Platforms;


abstract class BaseIcon
{
    const keys = [
        'ios' => 'iOS',
        'iwatch' => 'watchOS',
        'android' => 'Android',
        'webapp' => 'WebApp',
        'phonegap' => 'Cordova',
        'windowsphone' => 'WindowsPhone',
        'win_ico' => 'Windows',
        'mac_icns' => 'macOS',
    ];

    abstract public function getSizes();

    public static function isPlatformExists($key)
    {
        return isset(static::keys[$key]);
    }

    /**
     * @return BaseIcon
     * @param $key
     */
    public static function getInstance($key)
    {
        $name = static::keys[$key];
        $class = "App\Platforms\\$name\Icon";
        return new $class;
    }
}
