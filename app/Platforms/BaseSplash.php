<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:46
 */

namespace App\Platforms;


abstract class BaseSplash extends BaseAsset
{
    public static function getAssetName() {
        return 'Splash';
    }
}