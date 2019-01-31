<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 17:56
 */

namespace App\Services;


class BaseService
{
    public function __construct()
    {
    }

    public static function ensureDir($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

}