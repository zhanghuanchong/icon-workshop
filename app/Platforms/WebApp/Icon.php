<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 09:59
 */

namespace App\Platforms\WebApp;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size' => 76,
                'scale' => 1,
                'name' => 'apple-touch-icon-76x76'
            ],
            [
                'size' => 60,
                'scale' => 2,
                'name' => 'apple-touch-icon-120x120'
            ],
            [
                'size' => 76,
                'scale' => 2,
                'name' => 'apple-touch-icon-152x152'
            ],
            [
                'size' => 60,
                'scale' => 3,
                'name' => 'apple-touch-icon-180x180'
            ],
            [
                'size' => 29,
                'scale' => 2,
                'name' => 'android-touch-icon'
            ],
        ];
    }
}
