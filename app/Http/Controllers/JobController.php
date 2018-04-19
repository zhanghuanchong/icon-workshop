<?php

namespace App\Http\Controllers;

use App\Design;
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: hans
 * Date: 16/4/30
 * Time: 下午10:34
 */
class JobController extends BaseController
{
    public function getDeleteExpiredFiles()
    {
        // 删除1天前的所有数据
        Design::where('created_at', '<', Carbon::today()->subDay())->get()->each(function (Design $design) {
            $design->delete();
        });

        // 删除1小时前的Cache
        Design::where('created_at', '<', Carbon::today()->subHour())->get()->each(function (Design $design) {
            $design->deleteCache();
        });
    }
}