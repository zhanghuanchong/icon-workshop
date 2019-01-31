<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:47
 */

namespace App\Platforms;


abstract class BaseAsset
{
    abstract public function getSizes();

    abstract public static function getAssetName();

    public static function isPlatformExists($key)
    {
        return isset(Platform::NAMES[$key]);
    }

    /**
     * @return BaseAsset
     * @param $key
     */
    public static function getInstance($key)
    {
        $name = Platform::NAMES[$key];
        $class = "App\Platforms\\$name\\" . static::getAssetName();
        if (class_exists($class)) {
            return new $class;
        }
        return null;
    }
}