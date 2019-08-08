<?php


namespace App\Services;


class Security
{
    public static function getClientIp()
    {
        $all = static::getClientIps();
        return $all ? $all[0] : null;
    }

    public static function getClientIps()
    {
        $all = [];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $all[] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $all[] = $_SERVER['REMOTE_ADDR'];
        }
        $all = array_merge($all, \Request::getClientIps() ?: []);
        return array_unique($all);
    }
}