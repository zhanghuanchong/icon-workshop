<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */
namespace App;

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

    public static $format_sizes = array(
        //region iOS
        'ios' => array(
            array(
                'size' => 20,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 20,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 29,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 29,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 40,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 57,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 57,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 60,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 60,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'iphone',
            ),
            array(
                'size' => 20,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-20-ipad',
            ),
            array(
                'size' => 20,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-20@2x-ipad',
            ),
            array(
                'size' => 29,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-29-ipad',
            ),
            array(
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
                'name' => 'icon-29@2x-ipad',
            ),
            array(
                'size' => 40,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 50,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 50,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 72,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 72,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 76,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 76,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 83.5,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ipad',
            ),
            array(
                'size' => 1024,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'ios-marketing',
            ),
            array(
                'size' => 512,
                'name' => 'iTunesArtwork',
            ),
            array(
                'size' => 512,
                'scale' => 2,
                'name' => 'iTunesArtwork@2x',
            ),
        ),
        //endregion
        //region iOS-old
        'ios_old' => array(
            array(
                'size' => 57,
                'name' => 'icon'
            ),
            array(
                'size' => 57,
                'scale' => 2,
                'name' => 'icon@2x'
            ),
            array(
                'size' => 60
            ),
            array(
                'size' => 72
            ),
            array(
                'size' => 72,
                'scale' => 2
            ),
            array(
                'size' => 50,
                'name' => 'icon-Small-50'
            ),
            array(
                'size' => 50,
                'scale' => 2,
                'name' => 'icon-Small-50@2x'
            ),
            array(
                'size' => 512,
                'name' => 'iTunesArtwork',
            ),
            array(
                'size' => 512,
                'scale' => 2,
                'name' => 'iTunesArtwork@2x',
            ),
        ),
        //endregion
        //region iWatch
        'iwatch' => array(
            array(
                'size' => 24,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'notificationCenter',
                'subtype' => '38mm'
            ),
            array(
                'size' => 27.5,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'notificationCenter',
                'subtype' => '42mm'
            ),
            array(
                'size' => 29,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'companionSettings'
            ),
            array(
                'size' => 29,
                'scale' => 3,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'companionSettings'
            ),
            array(
                'size' => 40,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'appLauncher',
                'subtype' => '38mm'
            ),
            array(
                'size' => 44,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'longLook',
                'subtype' => '42mm'
            ),
            array(
                'size' => 86,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'quickLook',
                'subtype' => '38mm'
            ),
            array(
                'size' => 98,
                'scale' => 2,
                'folder' => 'AppIcon.appiconset',
                'idiom' => 'watch',
                'role' => 'quickLook',
                'subtype' => '42mm'
            ),
        ),
        //endregion
        //region Android
        'android' => array(
            array(
                'size' => 36,
                'folder' => 'drawable-ldpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 48,
                'folder' => 'drawable-mdpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 48,
                'scale' => 1.5,
                'folder' => 'drawable-hdpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 48,
                'scale' => 2,
                'folder' => 'drawable-xhdpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 48,
                'scale' => 3,
                'folder' => 'drawable-xxhdpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 48,
                'scale' => 4,
                'folder' => 'drawable-xxxhdpi',
                'name' => 'ic_launcher',
            ),
            array(
                'size' => 512,
                'name' => 'playstore-icon',
            ),
        ),
        //endregion
        //region WebApp
        'webapp' => array(
            array(
                'size' => 76,
                'scale' => 1,
                'name' => 'apple-touch-icon-76x76'
            ),
            array(
                'size' => 60,
                'scale' => 2,
                'name' => 'apple-touch-icon-120x120'
            ),
            array(
                'size' => 76,
                'scale' => 2,
                'name' => 'apple-touch-icon-152x152'
            ),
            array(
                'size' => 60,
                'scale' => 3,
                'name' => 'apple-touch-icon-180x180'
            ),
            array(
                'size' => 29,
                'scale' => 2,
                'name' => 'android-touch-icon'
            ),
        ),
        //endregion
        //region PhoneGap
        'phonegap' => array(
            array(
                'size' => 128,
                'scale' => 1,
                'folder' => 'www',
                'name' => 'icon'
            ),
            array(
                'size' => 57,
                'scale' => 1,
                'folder' => 'www/res/icon/ios',
                'name' => 'icon-57',
                'bg' => true
            ),
            array(
                'size' => 57,
                'scale' => 2,
                'folder' => 'www/res/icon/ios',
                'name' => 'icon-57-2x',
                'bg' => true
            ),
            array(
                'size' => 72,
                'scale' => 1,
                'folder' => 'www/res/icon/ios',
                'name' => 'icon-72',
                'bg' => true
            ),
            array(
                'size' => 72,
                'scale' => 2,
                'folder' => 'www/res/icon/ios',
                'name' => 'icon-72-2x',
                'bg' => true
            ),
            array(
                'size' => 36,
                'scale' => 1,
                'folder' => 'www/res/icon/android',
                'name' => 'icon-36-ldpi'
            ),
            array(
                'size' => 48,
                'scale' => 1,
                'folder' => 'www/res/icon/android',
                'name' => 'icon-48-mdpi'
            ),
            array(
                'size' => 72,
                'scale' => 1,
                'folder' => 'www/res/icon/android',
                'name' => 'icon-72-hdpi'
            ),
            array(
                'size' => 96,
                'scale' => 1,
                'folder' => 'www/res/icon/android',
                'name' => 'icon-96-xhdpi'
            ),
            array(
                'size' => 48,
                'scale' => 1,
                'folder' => 'www/res/icon/windows-phone',
                'name' => 'icon-48',
                'bg' => true
            ),
            array(
                'size' => 62,
                'scale' => 1,
                'folder' => 'www/res/icon/windows-phone',
                'name' => 'icon-62-tile',
                'bg' => true
            ),
            array(
                'size' => 173,
                'scale' => 1,
                'folder' => 'www/res/icon/windows-phone',
                'name' => 'icon-173-tile',
                'bg' => true
            ),
            array(
                'size' => 29,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-small',
                'bg' => true
            ),
            array(
                'size' => 29,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-small@2x',
                'bg' => true
            ),
            array(
                'size' => 40,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-40',
                'bg' => true
            ),
            array(
                'size' => 40,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-40@2x',
                'bg' => true
            ),
            array(
                'size' => 50,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-50',
                'bg' => true
            ),
            array(
                'size' => 50,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-50@2x',
                'bg' => true
            ),
            array(
                'size' => 57,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon',
                'bg' => true
            ),
            array(
                'size' => 57,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon@2x',
                'bg' => true
            ),
            array(
                'size' => 60,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-60',
                'bg' => true
            ),
            array(
                'size' => 60,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-60@2x',
                'bg' => true
            ),
            array(
                'size' => 60,
                'scale' => 3,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-60@3x',
                'bg' => true
            ),
            array(
                'size' => 72,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-72',
                'bg' => true
            ),
            array(
                'size' => 72,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-72@2x',
                'bg' => true
            ),
            array(
                'size' => 76,
                'scale' => 1,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-76',
                'bg' => true
            ),
            array(
                'size' => 76,
                'scale' => 2,
                'folder' => 'platforms/ios/Resources/icons',
                'name' => 'icon-76@2x',
                'bg' => true
            ),
            array(
                'size' => 96,
                'scale' => 1,
                'folder' => 'platforms/android/res/drawable',
                'name' => 'icon'
            ),
            array(
                'size' => 36,
                'scale' => 1,
                'folder' => 'platforms/android/res/drawable-ldpi',
                'name' => 'icon'
            ),
            array(
                'size' => 48,
                'scale' => 1,
                'folder' => 'platforms/android/res/drawable-mdpi',
                'name' => 'icon'
            ),
            array(
                'size' => 48,
                'scale' => 1.5,
                'folder' => 'platforms/android/res/drawable-hdpi',
                'name' => 'icon'
            ),
            array(
                'size' => 48,
                'scale' => 2,
                'folder' => 'platforms/android/res/drawable-xhdpi',
                'name' => 'icon'
            ),
            array(
                'size' => 48,
                'scale' => 3,
                'folder' => 'platforms/android/res/drawable-xxhdpi',
                'name' => 'icon'
            ),
            array(
                'size' => 110,
                'scale' => 1,
                'folder' => 'platforms/wp8',
                'name' => 'ApplicationIcon',
                'bg' => true
            ),
            array(
                'size' => 202,
                'scale' => 1,
                'folder' => 'platforms/wp8',
                'name' => 'TileMedium',
                'bg' => true
            ),
            array(
                'size' => 110,
                'scale' => 1,
                'folder' => 'platforms/wp8',
                'name' => 'TileSmall',
                'bg' => true
            ),
        ),
        //endregion
        //region Windows Phone
        'windowsphone' => array(
            array(
                'size' => 71,
                'name' => 'Square71x71Logo'
            ),
            array(
                'size' => 99,
                'name' => 'Square99x99Logo'
            ),
            array(
                'size' => 170,
                'name' => 'Square170x170Logo'
            ),
            array(
                'size' => 150,
                'name' => 'Logo'
            ),
            array(
                'size' => 210,
                'name' => 'Logo210x210'
            ),
            array(
                'size' => 360,
                'name' => 'Logo360x360'
            ),
            array(
                'size' => 44,
                'name' => 'SmallLogo'
            ),
            array(
                'size' => 62,
                'name' => 'SmallLogo62x62'
            ),
            array(
                'size' => 106,
                'name' => 'SmallLogo106x106'
            ),
            array(
                'size' => 50,
                'name' => 'StoreLogo'
            ),
            array(
                'size' => 70,
                'name' => 'StoreLogo70x70'
            ),
            array(
                'size' => 120,
                'name' => 'StoreLogo120x120'
            ),
        ),
        //endregion
    );

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

    public function generateIcons($formats = NULL, $alsoSizes = TRUE) {
        if (!$formats) {
            $formats = explode(',', $this->platform);
        }

        $root = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $appleFormats = array('ios', 'iwatch');
        $specialKeys = array('role', 'subtype');
        $img = Image::make($root . 'origin.' . $this->ext);
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
            if (!array_key_exists($format, static::$format_sizes)) {
                continue;
            }
            $format_root = $root . $format . '/';
            if (!file_exists($format_root)) {
                mkdir($format_root);
            }
            $sizes = static::$format_sizes[$format];
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
                    || $format == 'windowsphone' || $format == 'ios_old')
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
            foreach($sizes as $size) {
                if (isset($size['length'])) {
                    $length = $size['length'];

                    $folder = $root . static::CUSTOM_FOLDER . '/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $_img = &$img;
                    $_img->reset();
                    $_img->resize($length, $length);
                    $this->optimize($_img, $length);

                    $_img->save($folder . $length . 'x' . $length . '.png');
                }
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
        $dirs = File::directories(public_path('files') . '/' . $this->getFolder());
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