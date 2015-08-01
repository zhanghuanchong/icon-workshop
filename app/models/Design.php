<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/9/15
 * Time: 2:42 AM
 */

class Design extends Eloquent {
    public $incrementing = false;

    public $format_sizes = array(
        //region iOS
        'ios' => array(
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
                'size' => 40,
                'scale' => 2,
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
    );

    public function subscribers()
    {
        return $this->hasMany('Subscription');
    }

    public function getFilePath($name = 'origin') {
        return $this->folder . '/' . $this->id . '/' . $name . '.' . $this->ext;
    }

    public function generateIcons($formats) {
        $root = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $appleFormats = array('ios', 'iwatch');
        $specialKeys = array('role', 'subtype');
        foreach($formats as $format) {
            if (!isset($this->format_sizes[$format])) {
                continue;
            }
            $format_root = $root . $format . '/';
            if (!file_exists($format_root)) {
                mkdir($format_root);
            }
            $sizes = $this->format_sizes[$format];
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
                    $folder = $format_root . $s['folder'] . '/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                }
                $scale = isset($s['scale']) ? $s['scale'] : 1;
                $length = $s['size'] * $scale;
                $img = Image::make($root . 'origin.' . $this->ext);
                if (in_array($format, $appleFormats) || isset($s['bg'])) {
                    $canvas = Image::canvas($img->width(), $img->height(), '#ffffff');
                    $img = $canvas->insert($img);
                }
                $img->resize($length, $length);
                if ($length <= 30) {
                    $img->sharpen(5);
                } else if ($length <= 50) {
                    $img->sharpen(2);
                }
                if (isset($s['name'])) {
                    $name = $s['name'];
                } else {
                    $name = 'icon-' . $s['size'] . ($scale == 1 ? '' : '@' . $scale . 'x');
                }
                $img->save($folder . $name . '.png');

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
    }

    public function package($regenerate = FALSE) {
        $folder = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $path = $folder . 'icons.zip';
        if (!file_exists($path) || $regenerate) {
            $zip = Zipper::make($path);
            $formats = array(
                'ios',
                'android',
                'iwatch',
                'webapp',
                'phonegap'
            );
            foreach($formats as $f) {
                $zip->folder($f)->add($folder . $f);
            }
            $zip->close();
        }
        return $path;
    }
}