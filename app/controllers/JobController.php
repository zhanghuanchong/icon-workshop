<?php

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
        $folders = File::directories(public_path('files'));
        $thisMonth = (int)date('Ym');
        foreach($folders as $folder) {
            $month = (int)File::name($folder);
            if ($month >= $thisMonth) {
                continue;
            }
            $designs = File::directories($folder);
            foreach($designs as $design) {
                $platforms = File::directories($design);
                foreach($platforms as $platform) {
                    File::deleteDirectory($platform);
                }
                $zip = $design . '/icons.zip';
                if (File::exists($zip)) {
                    File::delete($zip);
                }
            }
        }
    }
}