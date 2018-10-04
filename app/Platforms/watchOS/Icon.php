<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:57
 */

namespace App\Platforms\watchOS;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size' => 24,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'notificationCenter',
                'subtype' => '38mm'
            ],
            [
                'size' => 27.5,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'notificationCenter',
                'subtype' => '42mm'
            ],
            [
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'companionSettings'
            ],
            [
                'size' => 29,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'companionSettings'
            ],
            [
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'appLauncher',
                'subtype' => '38mm'
            ],
            [
                'size' => 44,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'longLook',
                'subtype' => '42mm'
            ],
            [
                'size' => 86,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'quickLook',
                'subtype' => '38mm'
            ],
            [
                'size' => 98,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'quickLook',
                'subtype' => '42mm'
            ],
        ];
    }
}
