<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2018/10/30
 * Time: 09:18
 */

namespace App\Platforms;


class Platform
{
    const IOS = 'ios';
    const IWATCH = 'iwatch';
    const ANDROID = 'android';
    const WEB_APP = 'webapp';
    const PHONEGAP = 'phonegap';
    const WINDOWS_PHONE = 'windowsphone';
    const WIN_ICO = 'win_ico';
    const MAC_ICNS = 'mac_icns';

    const NAMES = [
        'ios' => 'iOS',
        'iwatch' => 'watchOS',
        'android' => 'Android',
        'webapp' => 'WebApp',
        'phonegap' => 'Cordova',
        'windowsphone' => 'WindowsPhone',
        'win_ico' => 'Windows',
        'mac_icns' => 'macOS',
    ];
}
