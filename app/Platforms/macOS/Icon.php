<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 10:02
 */

namespace App\Platforms\macOS;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size' => 16,
                'scale' => 1,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 16,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 32,
                'scale' => 1,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 32,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 128,
                'scale' => 1,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 128,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 256,
                'scale' => 1,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 256,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 512,
                'scale' => 1,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
            [
                'size' => 512,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'mac',
            ],
        ];
    }
}
