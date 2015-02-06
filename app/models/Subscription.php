<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */

class Subscription extends Eloquent {

    public function design()
    {
        return $this->belongsTo('Design');
    }

    public function sendZip()
    {
        $design = $this->design;
        $path = $design->package();
        $data = array(
            'path' => $path
        );
        Mail::send('emails.icon', $data, function($message) use ($path, $design)
        {
            $subject = '批量生成应用图标：' . $design->original_name;
            $message->to($this->mail)->subject($subject);
            $message->attach($path);
        });
    }

}