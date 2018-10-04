<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:58
 */

namespace App\Platforms\Android;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size'   => 36,
                'folder' => 'drawable-ldpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size'   => 48,
                'folder' => 'drawable-mdpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size'   => 48,
                'scale'  => 1.5,
                'folder' => 'drawable-hdpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size'   => 48,
                'scale'  => 2,
                'folder' => 'drawable-xhdpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size'   => 48,
                'scale'  => 3,
                'folder' => 'drawable-xxhdpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size'   => 48,
                'scale'  => 4,
                'folder' => 'drawable-xxxhdpi',
                'name'   => 'ic_launcher',
            ],
            [
                'size' => 512,
                'name' => 'playstore-icon',
            ],
        ];
    }
}
