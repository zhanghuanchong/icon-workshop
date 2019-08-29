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
    const MAC = 'mac';
    const QUASAR = 'quasar';

    const NAMES = [
        'ios' => 'iOS',
        'iwatch' => 'watchOS',
        'android' => 'Android',
        'webapp' => 'WebApp',
        'phonegap' => 'Cordova',
        'windowsphone' => 'WindowsPhone',
        'mac' => 'macOS',
        'quasar' => 'Quasar',
    ];
}
