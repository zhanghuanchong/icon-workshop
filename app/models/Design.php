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
            if ($format == 'ios') {
                $json = array(
                    'images' => array(),
                    'info' => array(
                        'version' => 1,
                        'author' => 'icon.wuruihong.com'
                    )
                );
            }
            foreach($sizes as $s) {
                $folder = $format_root;
                if (isset($s['folder'])) {
                    $folder = $format_root . $s['folder'] . '/';
                    if (!file_exists($folder)) {
                        mkdir($folder);
                    }
                }
                $scale = isset($s['scale']) ? $s['scale'] : 1;
                $length = $s['size'] * $scale;
                $img = Image::make($root . 'origin.' . $this->ext);
                $img->resize($length, $length);
                if ($length <= 30) {
                    $img->sharpen(5);
                } else if ($length <= 40) {
                    $img->sharpen(2);
                }
                if (isset($s['name'])) {
                    $name = $s['name'];
                } else {
                    $name = 'icon-' . $s['size'] . ($scale == 1 ? '' : '@' . $scale . 'x');
                }
                $img->save($folder . $name . '.png');

                if (isset($s['idiom'])) {
                    $json['images'][] = array(
                        'size' => $s['size'] . 'x' . $s['size'],
                        'idiom' => $s['idiom'],
                        'filename' => $name . '.png',
                        'scale' => $scale . 'x',
                    );
                    $json_folder = $folder;
                }
            }
            if ($format == 'ios') {
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
                'android'
            );
            foreach($formats as $f) {
                $zip->folder($f)->add($folder . $f);
            }
            $zip->close();
        }
        return $path;
    }
}