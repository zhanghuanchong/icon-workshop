<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class SplashController extends BaseController
{
    public function index()
    {
        return View::make('splash');
    }

    public function generate(Request $request)
    {
/*
 * {
    "id": "c17d2e36-ad02-46f6-8789-0742cb416214",
    "proto": "Scene",
    "hidden": false,
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
            "id": "5ccc6f3f-ff28-4025-8857-2f9501a73075",
            "proto": "Image",
            "hidden": false,
            "url": "/files/temp/FYSqCwkpyliREALb.png",
            "left": 50,
            "top": 12,
            "scale": 0.55,
            "version": 0
        },
        {
            "id": "0f0b1ae2-bea7-4f8b-9302-1565e04dc373",
            "proto": "Image",
            "hidden": false,
            "url": "/files/temp/ALIGUOVpAA5Rg1sh.png",
            "left": 50,
            "top": 50,
            "scale": 0.12,
            "version": 0
        },
        {
            "id": "9131a0f0-4abe-476c-b376-0070592717f2",
            "proto": "Image",
            "hidden": false,
            "url": "/files/temp/SOcokaWFZvVYSKCJ.png",
            "left": 50,
            "top": 90,
            "scale": 1,
            "version": 0
        }
    ]
}
         */
        return $this->success($request->get('scene'));
    }
}
