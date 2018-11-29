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
    abstract public function getSizes();

    public static function isPlatformExists($key)
    {
        return isset(Platform::NAMES[$key]);
    }

    /**
     * @return BaseIcon
     * @param $key
     */
    public static function getInstance($key)
    {
        $name = Platform::NAMES[$key];
        $class = "App\Platforms\\$name\Icon";
        return new $class;
    }
}
