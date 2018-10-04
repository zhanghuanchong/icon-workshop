<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/4
 * Time: 10:00
 */

namespace App\Platforms\WindowsPhone;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size' => 71,
                'name' => 'Square71x71Logo'
            ],
            [
                'size' => 99,
                'name' => 'Square99x99Logo'
            ],
            [
                'size' => 170,
                'name' => 'Square170x170Logo'
            ],
            [
                'size' => 150,
                'name' => 'Logo'
            ],
            [
                'size' => 210,
                'name' => 'Logo210x210'
            ],
            [
                'size' => 360,
                'name' => 'Logo360x360'
            ],
            [
                'size' => 44,
                'name' => 'SmallLogo'
            ],
            [
                'size' => 62,
                'name' => 'SmallLogo62x62'
            ],
            [
                'size' => 106,
                'name' => 'SmallLogo106x106'
            ],
            [
                'size' => 50,
                'name' => 'StoreLogo'
            ],
            [
                'size' => 70,
                'name' => 'StoreLogo70x70'
            ],
            [
                'size' => 120,
                'name' => 'StoreLogo120x120'
            ],
        ];
    }
}
