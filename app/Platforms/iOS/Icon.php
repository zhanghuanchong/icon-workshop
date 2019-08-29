<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:55
 */

namespace App\Platforms\iOS;


use App\Design;
use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size' => 20,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 20,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 29,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 29,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 40,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 57,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 57,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 60,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 60,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ],
            [
                'size' => 20,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-20-ipad',
            ],
            [
                'size' => 20,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-20@2x-ipad',
            ],
            [
                'size' => 29,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-29-ipad',
            ],
            [
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-29@2x-ipad',
            ],
            [
                'size' => 40,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ],
            [
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ],
            [
                'size' => 50,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 50,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 72,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 72,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'level' => Design::IOS_LEVEL_5,
            ],
            [
                'size' => 76,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ],
            [
                'size' => 76,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ],
            [
                'size' => 83.5,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ],
            [
                'size' => 1024,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ios-marketing',
            ],
        ];
    }

    public function getSizesForDesign(Design $design)
    {
        $all = $this->getSizes();
        $level = $design->ios_level ?: Design::IOS_LEVEL_7;
        $all = array_filter($all, static function ($item) use ($level) {
            return !isset($item['level']) || $item['level'] === $level;
        });
        return $all;
    }

}
