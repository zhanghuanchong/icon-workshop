<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:59
 */

namespace App\Platforms\Cordova;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            // res icons: useless now though
            [
                'size' => 57,
                'scale' => 1,
                'folder' => 'res/icon/ios',
                'name' => 'icon-57',
                'bg' => true
            ],
            [
                'size' => 57,
                'scale' => 2,
                'folder' => 'res/icon/ios',
                'name' => 'icon-57-2x',
                'bg' => true
            ],
            [
                'size' => 72,
                'scale' => 1,
                'folder' => 'res/icon/ios',
                'name' => 'icon-72',
                'bg' => true
            ],
            [
                'size' => 72,
                'scale' => 2,
                'folder' => 'res/icon/ios',
                'name' => 'icon-72-2x',
                'bg' => true
            ],
            [
                'size' => 36,
                'scale' => 1,
                'folder' => 'res/icon/android',
                'name' => 'icon-36-ldpi'
            ],
            [
                'size' => 48,
                'scale' => 1,
                'folder' => 'res/icon/android',
                'name' => 'icon-48-mdpi'
            ],
            [
                'size' => 72,
                'scale' => 1,
                'folder' => 'res/icon/android',
                'name' => 'icon-72-hdpi'
            ],
            [
                'size' => 96,
                'scale' => 1,
                'folder' => 'res/icon/android',
                'name' => 'icon-96-xhdpi'
            ],
            // iOS
            [
                'size' => 29,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-small',
                'bg' => true
            ],
            [
                'size' => 29,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-small@2x',
                'bg' => true
            ],
            [
                'size' => 29,
                'scale' => 3,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-small@3x',
                'bg' => true
            ],
            [
                'size' => 40,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-40',
                'bg' => true
            ],
            [
                'size' => 40,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-40@2x',
                'bg' => true
            ],
            [
                'size' => 50,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-50',
                'bg' => true
            ],
            [
                'size' => 50,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-50@2x',
                'bg' => true
            ],
            [
                'size' => 57,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon',
                'bg' => true
            ],
            [
                'size' => 57,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon@2x',
                'bg' => true
            ],
            [
                'size' => 60,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-60@2x',
                'bg' => true
            ],
            [
                'size' => 60,
                'scale' => 3,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-60@3x',
                'bg' => true
            ],
            [
                'size' => 72,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-72',
                'bg' => true
            ],
            [
                'size' => 72,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-72@2x',
                'bg' => true
            ],
            [
                'size' => 76,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-76',
                'bg' => true
            ],
            [
                'size' => 76,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-76@2x',
                'bg' => true
            ],
            [
                'size' => 83.5,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-83.5@2x',
                'bg' => true
            ],
            // Android
            [
                'size' => 36,
                'scale' => 1,
                'folder' => 'platforms/android/app/src/main/res/mipmap-ldpi',
                'name' => 'icon'
            ],
            [
                'size' => 48,
                'scale' => 1,
                'folder' => 'platforms/android/app/src/main/res/mipmap-mdpi',
                'name' => 'icon'
            ],
            [
                'size' => 48,
                'scale' => 1.5,
                'folder' => 'platforms/android/app/src/main/res/mipmap-hdpi',
                'name' => 'icon'
            ],
            [
                'size' => 48,
                'scale' => 2,
                'folder' => 'platforms/android/app/src/main/res/mipmap-xhdpi',
                'name' => 'icon'
            ],
            [
                'size' => 48,
                'scale' => 3,
                'folder' => 'platforms/android/app/src/main/res/mipmap-xxhdpi',
                'name' => 'icon'
            ],
            [
                'size' => 48,
                'scale' => 4,
                'folder' => 'platforms/android/app/src/main/res/mipmap-xxxhdpi',
                'name' => 'icon'
            ],
        ];
    }
}
