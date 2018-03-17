<?php
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
        // 删除1个月前的所有数据
        Design::where('created_at', '<', Carbon::today()->subMonth())->get()->each(function (Design $design) {
            $design->delete();
        });

        // 删除7天前的Cache
        Design::where('created_at', '<', Carbon::today()->subDays(7))->get()->each(function (Design $design) {
            $design->deleteCache();
        });
    }
}