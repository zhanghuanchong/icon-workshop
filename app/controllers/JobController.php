<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: hans
 * Date: 16/4/30
 * Time: 下午10:34
 */
class JobController extends Controller
{
    public function getDeleteExpiredFiles()
    {
        $date = Carbon::today()->subDays(15);
        $fileFolder = public_path('files');
        Design::whereDate('created_at', '<', $date)->get()->each(function ($design) use ($fileFolder) {
            $dir = $fileFolder . '/' . $design->folder . '/' . $design->id;
            if (!File::exists($dir)) {
                return;
            }
            $platforms = File::directories($dir);
            foreach($platforms as $platform) {
                File::deleteDirectory($platform);
            }
            $zip = $dir . '/icons.zip';
            if (File::exists($zip)) {
                File::delete($zip);
            }
        });
    }
}