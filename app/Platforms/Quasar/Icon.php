<?php

namespace App\Platforms\Quasar;


use App\Platforms\BaseIcon;

class Icon extends BaseIcon
{

    public function getSizes()
    {
        return [
            [
                'size'   => 128,
                'name'   => 'logo',
            ],
            [
                'size'   => 152,
                'folder' => 'icons',
                'name'   => 'apple-icon-152x152',
            ],
            [
                'size'   => 16,
                'folder' => 'icons',
                'name'   => 'favicon-16x16',
            ],
            [
                'size'   => 32,
                'folder' => 'icons',
                'name'   => 'favicon-32x32',
            ],
            [
                'size'   => 128,
                'folder' => 'icons',
                'name'   => 'icon-128x128',
            ],
            [
                'size'   => 192,
                'folder' => 'icons',
                'name'   => 'icon-192x192',
            ],
            [
                'size'   => 256,
                'folder' => 'icons',
                'name'   => 'icon-256x256',
            ],
            [
                'size'   => 386,
                'folder' => 'icons',
                'name'   => 'icon-384x384',
            ],
            [
                'size'   => 512,
                'folder' => 'icons',
                'name'   => 'icon-512x512',
            ],
            [
                'size'   => 144,
                'folder' => 'icons',
                'name'   => 'ms-icon-144x144',
            ],
        ];
    }
}
