<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Message;
use Mail;

/**
 * App\Subscription
 *
 * @property int $id
 * @property string $mail
 * @property string $design_id
 * @property string|null $user_agent
 * @property string|null $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Design $design
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUserAgent($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 */
class Subscription extends Model {

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function sendZip()
    {
        $design = $this->design;
        try {
            $path = $design->getService()->package();
        } catch (\Exception $e) {
            return;
        }
        $data = array(
            'path' => $path
        );
        Mail::send('emails.icon', $data, function(Message $message) use ($path, $design)
        {
            $subject = '批量生成应用图标：' . $design->original_name;
            $message->to($this->mail)->subject($subject);
            $message->attach($path);
        });
    }

}