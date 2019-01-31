<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:07
 */

namespace App\Services;


use App\Splash;

class SplashService extends BaseService
{
    /** @var Splash $splash */
    public $splash;

    public function __construct(Splash $splash)
    {
        $this->splash = $splash;
        parent::__construct();
    }

    public function generate()
    {
        /*
         * {
            "proto": "Scene",
            "backgroundColor": "#ffffff",
            "platforms": [
                "android",
                "ios"
            ],
            "orientations": [
                "landscape",
                "portrait"
            ],
            "objects": [
                {
                    "proto": "Image",
                    "url": "/files/temp/FYSqCwkpyliREALb.png",
                    "left": 50,
                    "top": 12,
                    "scale": 0.55,
                },
                {
                    "proto": "Image",
                    "url": "/files/temp/ALIGUOVpAA5Rg1sh.png",
                    "left": 50,
                    "top": 50,
                    "scale": 0.12,
                },
                {
                    "proto": "Image",
                    "url": "/files/temp/SOcokaWFZvVYSKCJ.png",
                    "left": 50,
                    "top": 90,
                    "scale": 1,
                }
            ]
        }
         */
        $config = $this->splash->config;
    }
}