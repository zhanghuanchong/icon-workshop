<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:55
 */

namespace App\Platforms;


use App\Design;

abstract class BaseIcon extends BaseAsset
{
    public static function getAssetName() {
        return 'Icon';
    }

    public function getSizesForDesign(Design $design)
    {
        return $this->getSizes();
    }
}
