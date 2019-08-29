<?php


namespace App\Services;


class Util
{
    public static function ensureDir($dir)
    {
        if (!file_exists($dir) || !is_dir($dir)) {
            /** @noinspection NotOptimalIfConditionsInspection */
            if (!mkdir($dir, 0777, TRUE) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
            }
        }
        return $dir;
    }
}