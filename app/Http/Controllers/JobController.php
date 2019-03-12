<?php

namespace App\Http\Controllers;

use App\Design;
use App\Splash;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: hans
 * Date: 16/4/30
 * Time: 下午10:34
 */
class JobController extends BaseController
{
    public function deleteExpiredDesignFiles()
    {
        //////////////////// Icon /////////////////////
        // 删除1天前的所有数据
        Design::where('created_at', '<', Carbon::now()->subDay())->get()->each(function (Design $design) {
            $design->delete();
        });
    }

    public function deleteExpiredDesignCaches()
    {
        // 删除1小时前的Cache
        Design::where('created_at', '<', Carbon::now()->subHour())->get()->each(function (Design $design) {
            $design->deleteCache();
        });
    }

    public function deleteExpiredSplashFiles()
    {
        //////////////////// Splash /////////////////////
        // 删除1天前的所有数据
        Splash::where('created_at', '<', Carbon::now()->subDay())->get()->each(function (Splash $splash) {
            $splash->delete();
        });
    }

    public function deleteExpiredSplashCaches()
    {
        // 删除1小时前的Cache
        Splash::where('created_at', '<', Carbon::now()->subHour())->get()->each(function (Splash $splash) {
            $splash->deleteCache();
        });
    }

    public function removeOldSplashFiles()
    {
        $before = Carbon::now()->subDay()->getTimestamp();
        $folder = Carbon::now()->format('Ym');
        $dirs = \File::directories(public_path('files') . '/' . $folder . '/');
        foreach ($dirs as $dir) {
            $time = \File::lastModified($dir);
            if ($time < $before) {
                \File::deleteDirectory($dir);
                var_dump($dir);
            }
        }
    }
}