<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */
namespace App;

use App\Services\DesignService;
use Image;

/**
 * App\Design
 *
 * @property string $id
 * @property string $folder
 * @property string $ext
 * @property string $original_name
 * @property string $mime_type
 * @property string|null $platform
 * @property string|null $sizes
 * @property string|null $bg_color
 * @property string|null $android_folder
 * @property string|null $android_name
 * @property float|null $radius
 * @property string|null $user_agent
 * @property string|null $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string|null $deleted_at
 * @property-read mixed $sanitized_android_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscribers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereAndroidFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereAndroidName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereRadius($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereUserAgent($value)
 * @mixin \Eloquent
 */
class Design extends BaseModel {

    const CUSTOM_FOLDER = 'custom';

    public $incrementing = false;

    protected $appends = [
        'sanitized_android_name',
    ];

    public function setSizesAttribute($value)
    {
        $sizes = json_decode($value, TRUE);
        $result = [];
        $lengths = [];
        foreach($sizes as $size) {
            if (isset($size['length'])) {
                $length = $size['length'];
                if ($length && !in_array($length, $lengths)) {
                    $result[] = $size;

                    $lengths[] = $length;
                }
            }
        }

        $this->attributes['sizes'] = json_encode($result);
    }

    public function getSizesAttribute($value)
    {
        return json_decode($value, TRUE);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getFolder() {
        return $this->folder . '/' . $this->id;
    }

    public function getFilePath($name = 'origin') {
        return $this->getFolder() . '/' . $name . '.' . $this->ext;
    }

    public function getSize() {
        $root = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $img = Image::make($root . 'origin.' . $this->ext);
        return [
            'width' => $img->getWidth(),
            'height' => $img->getHeight(),
        ];
    }

    public function getSanitizedAndroidNameAttribute()
    {
        if (!$this->android_name) {
            return 'ic_launcher';
        }
        // Remove anything which isn't a word, whitespace, number
        // or any of the following caracters -_~,;[]().
        // If you don't need to handle multi-byte characters
        // you can use preg_replace rather than mb_ereg_replace
        // Thanks @Łukasz Rysiak!
        $file = mb_ereg_replace('([^\w\s\d\-_~,;\[\]\(\).])', '', $this->android_name);
        // Remove any runs of periods (thanks falstro!)
        return mb_ereg_replace('([\.]{2,})', '', $file);
    }

    public function getService()
    {
        return new DesignService($this);
    }

    public function delete()
    {
        $this->getService()->deleteFolder();
        parent::delete();
    }

    public function deleteCache()
    {
        $this->getService()->deleteCache();
    }
}
