<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */
namespace App;

use App\Platforms\BaseIcon;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Database\Eloquent\Model;
use Imagick;
use File;
use Image;
use ImagickDraw;
use ImagickPixel;

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
class Design extends Model {

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        Image::configure(array('driver' => 'imagick'));
    }

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

    public function generateIcons($formats = NULL, $alsoSizes = TRUE) {
        if (!$formats) {
            $formats = explode(',', $this->platform);
        }

        $root = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $appleFormats = array('ios', 'iwatch');
        $specialKeys = array('role', 'subtype');
        $img = Image::make($root . 'origin.' . $this->ext);
        $maxLength = 1024;
        if ($img->getWidth() > $maxLength || $img->getHeight() > $maxLength) {
            $img->resize($maxLength, $maxLength);
        }
        $img->backup();

        // 自动圆角
        $imgRound = null;
        if (array_intersect($formats, ['android', 'webapp']) && $this->radius) {
            $imagickDraw = new ImagickDraw();
            $round = $this->radius / 100 * 1024;
            $imagickDraw->setFillColor(new ImagickPixel('white'));
            $imagickDraw->roundRectangle(0, 0, 1024, 1024, $round, $round);

            $imagick = new Imagick();
            $imagick->newImage(1024, 1024, new ImagickPixel('black'));
            $imagick->drawImage($imagickDraw);
            $imagick->setImageFormat('png');

            $imgRound = Image::make($root . 'origin.' . $this->ext);
            $imgRound->resize(1024, 1024);
            $imgRound->mask($imagick, false);
            $imgRound->backup();
        }

        $bgColor = $this->bg_color ? $this->bg_color : '#ffffff';
        $canvas = Image::canvas($img->width(), $img->height(), $bgColor);
        $imgBg = $canvas->insert($img);
        $imgBgCore = $imgBg->getCore();
        if ($imgBgCore->getImageAlphaChannel()) {
            $imgBgCore->setImageAlphaChannel(Imagick::ALPHACHANNEL_DEACTIVATE);
        }
        $imgBg->backup();

        foreach($formats as $format) {
            if (!BaseIcon::isPlatformExists($format)) {
                continue;
            }
            $format_root = $root . $format . '/';
            if (!file_exists($format_root)) {
                mkdir($format_root);
            }
            $platform = BaseIcon::getInstance($format);
            $sizes = $platform->getSizes();
            $json_folder = '';
            $json = array();
            if (in_array($format, $appleFormats)) {
                $json = array(
                    'images' => array(),
                    'info' => array(
                        'version' => 1,
                        'author' => 'icon.wuruihong.com'
                    )
                );
            }
            $webappLinks = $format == 'webapp' ? array() : NULL;
            foreach($sizes as $s) {
                $folder = $format_root;
                if (isset($s['folder'])) {
                    if ($format == 'android' && $this->android_folder) {
                        $s['folder'] = str_replace('drawable', $this->android_folder, $s['folder']);
                    }

                    $folder = $format_root . $s['folder'] . '/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                }
                $scale = isset($s['scale']) ? $s['scale'] : 1;
                $length = $s['size'] * $scale;
                if (in_array($format, $appleFormats) || isset($s['bg'])
                    || $format == 'windowsphone')
                {
                    $_img = &$imgBg;
                } else if ($imgRound) {
                    $_img = &$imgRound;
                } else {
                    $_img = &$img;
                }
                $_img->reset();
                $_img->resize($length, $length);
                $this->optimize($_img, $length);

                if ($format === 'android' && $this->android_name) {
                    $name = $this->sanitized_android_name;
                } else if (isset($s['name'])) {
                    $name = $s['name'];
                } else {
                    $name = 'icon-' . $s['size'] . ($scale == 1 ? '' : '@' . $scale . 'x');
                }
                $_img->save($folder . $name . '.png');

                if ($format == 'webapp') {
                    $webappLinks[] = array(
                        'sizes' => $length . 'x' . $length,
                        'href' => $name . '.png'
                    );
                }

                if (isset($s['idiom'])) {
                    $item = array(
                        'size' => $s['size'] . 'x' . $s['size'],
                        'idiom' => $s['idiom'],
                        'filename' => $name . '.png',
                        'scale' => $scale . 'x',
                    );
                    foreach($specialKeys as $key) {
                        if (isset($s[$key])) {
                            $item[$key] = $s[$key];
                        }
                    }
                    $json['images'][] = $item;
                    $json_folder = $folder;
                }
            }
            if ($webappLinks) {
                $s = array();
                foreach($webappLinks as $w) {
                    $_ = '<link rel="apple-touch-icon"';
                    if ($w['sizes'] != '60x60') {
                        $_ .= ' sizes="' . $w['sizes'] . '"';
                    }
                    $_ .= ' href="' . $w['href'] . '" />';
                    $s[] = $_;
                }
                file_put_contents($format_root . 'readme.txt', implode("\r\n", $s));
            }
            if (in_array($format, $appleFormats)) {
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                file_put_contents($json_folder . 'Contents.json', $json_string);
            }
        }

        $sizes = $this->sizes;
        if ($alsoSizes && $sizes) {
            $folder = $root . static::CUSTOM_FOLDER . '/';
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            foreach($sizes as $size) {
                if (isset($size['length'])) {
                    $length = $size['length'];

                    $_img = &$img;
                    $_img->reset();
                    $_img->resize($length, $length);
                    $this->optimize($_img, $length);

                    $_img->save($folder . $length . 'x' . $length . '.png');
                }
            }

            if (in_array('win_ico', $formats)) {
                // TODO
            }

            if (in_array('mac_icns', $formats)) {
                // TODO
            }
        }
    }

    protected function optimize(\Intervention\Image\Image &$_img, $length) {
        if ($length <= 30) {
            $_img->sharpen(5);
        } else if ($length <= 50) {
            $_img->sharpen(2);
        }
    }

    public function package($regenerate = FALSE) {
        $folder = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $path = $folder . 'icons.zip';
        if (!file_exists($path) || $regenerate) {
            /** @var \Chumper\Zipper\Zipper $zip */
            $zip = Zipper::make($path);
            $formats = explode(',', $this->platform);
            foreach($formats as $f) {
                $zip->folder($f)->add($folder . $f);
            }

            $custom_folder = $folder . static::CUSTOM_FOLDER;
            if (file_exists($custom_folder)) {
                $zip->folder(static::CUSTOM_FOLDER)->add($custom_folder);
            }

            $zip->close();
        }
        return $path;
    }

    public function isGenerated()
    {
        $path = public_path('files') . '/' . $this->getFolder();
        if (!file_exists($path)) {
            return null;
        }
        $dirs = File::directories($path);
        return count($dirs) > 0;
    }

    public function deleteCache()
    {
        $dir = public_path('files') . '/' . $this->folder . '/' . $this->id;
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
    }

    public function deleteFolder()
    {
        $dir = public_path('files') . '/' . $this->folder . '/' . $this->id;
        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }
    }

    public function delete()
    {
        $this->deleteFolder();
        parent::delete();
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
}
