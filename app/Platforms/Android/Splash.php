<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 19:15
 */

namespace App\Platforms\Android;


use App\Platforms\BaseSplash;

class Splash extends BaseSplash
{

    public function getSizes()
    {
        return [
            [
                'width' => 800,
                'height' => 480,
                'folder' => 'drawable-land-hdpi',
                'name' => 'screen',
            ],
            [
                'width' => 320,
                'height' => 200,
                'folder' => 'drawable-land-ldpi',
                'name' => 'screen',
            ],
            [
                'width' => 480,
                'height' => 320,
                'folder' => 'drawable-land-mdpi',
                'name' => 'screen',
            ],
            [
                'width' => 1280,
                'height' => 720,
                'folder' => 'drawable-land-xhdpi',
                'name' => 'screen',
            ],
            [
                'width' => 1600,
                'height' => 960,
                'folder' => 'drawable-land-xxhdpi',
                'name' => 'screen',
            ],
            [
                'width' => 1920,
                'height' => 1280,
                'folder' => 'drawable-land-xxxhdpi',
                'name' => 'screen',
            ],
            [
                'width' => 480,
                'height' => 800,
                'folder' => 'drawable-port-hdpi',
                'name' => 'screen',
            ],
            [
                'width' => 200,
                'height' => 320,
                'folder' => 'drawable-port-ldpi',
                'name' => 'screen',
            ],
            [
                'width' => 320,
                'height' => 480,
                'folder' => 'drawable-port-mdpi',
                'name' => 'screen',
            ],
            [
                'width' => 720,
                'height' => 1280,
                'folder' => 'drawable-port-xhdpi',
                'name' => 'screen',
            ],
            [
                'width' => 960,
                'height' => 1600,
                'folder' => 'drawable-port-xxhdpi',
                'name' => 'screen',
            ],
            [
                'width' => 1280,
                'height' => 1920,
                'folder' => 'drawable-port-xxxhdpi',
                'name' => 'screen',
            ],
        ];
    }
}