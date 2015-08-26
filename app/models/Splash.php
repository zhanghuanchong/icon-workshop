<?php

class Splash extends Eloquent {
    public $incrementing = false;

    public $sizes = array(
        //region Portrait
        'portrait' => array(
            array(
                "extent" => "full-screen",
                "idiom" => "iphone",
                "subtype" => "736h",
                "minimum-system-version" => "8.0",
                "filename" => "Default-736h@3x.png",
                "scale" => "3x",
                'width' => 1242,
                'height' => 2208,
            ),
            array(
                "extent" => "full-screen",
                "idiom" => "iphone",
                "subtype" => "667h",
                "minimum-system-version" => "8.0",
                "filename" => "Default-667h@2x.png",
                "scale" => "2x",
                'width' => 750,
                'height' => 1334,
            ),
            array(
                "idiom" => "iphone",
                "extent" => "full-screen",
                "minimum-system-version" => "7.0",
                "filename" => "Default@2x.png",
                "scale" => "2x",
                'skip' => TRUE,
            ),
            array(
                "extent" => "full-screen",
                "idiom" => "iphone",
                "subtype" => "retina4",
                "filename" => "Default-568h@2x.png",
                "minimum-system-version" => "7.0",
                "scale" => "2x",
                'skip' => TRUE,
            ),
            array(
                "idiom" => "ipad",
                "extent" => "full-screen",
                "minimum-system-version" => "7.0",
                "filename" => "Default-Portrait-bar~ipad.png",
                "scale" => "1x",
                'width' => 768,
                'height' => 1024,
            ),
            array(
                "idiom" => "ipad",
                "extent" => "full-screen",
                "minimum-system-version" => "7.0",
                "filename" => "Default-Portrait-bar@2x~ipad.png",
                "scale" => "2x",
                'width' => 1536,
                'height' => 2048,
            ),
            array(
                "idiom" => "iphone",
                "extent" => "full-screen",
                "filename" => "Default.png",
                "scale" => "1x",
                'width' => 320,
                'height' => 480,
            ),
            array(
                "idiom" => "iphone",
                "extent" => "full-screen",
                "scale" => "2x",
                "filename" => "Default@2x.png",
                'width' => 640,
                'height' => 960,
            ),
            array(
                "idiom" => "iphone",
                "extent" => "full-screen",
                "subtype" => "retina4",
                "filename" => "Default-568h@2x.png",
                "scale" => "2x",
                'width' => 640,
                'height' => 1136,
            ),
            array(
                "idiom" => "ipad",
                "extent" => "to-status-bar",
                "filename" => "Default-Portrait~ipad.png",
                "scale" => "1x",
                'width' => 768,
                'height' => 1004,
            ),
            array(
                "idiom" => "ipad",
                "extent" => "to-status-bar",
                "filename" => "Default-Portrait@2x~ipad.png",
                "scale" => "2x",
                'width' => 1536,
                'height' => 2008,
            )
        ),
        //endregion
        //region Landscape
        'landscape' => array()
        //endregion
    );

    public function getLogoPath() {
        if (!$this->logo) {
            return 'img/ruihong.png';
        }
        return 'files/' . $this->folder . '/' . $this->id . '/' . $this->logo;
    }

    public function generate() {
        $root = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';

        $logo = Image::make(public_path() . '/' . $this->getLogoPath());
        $logo->backup();

        $bg = NULL;
        $bgRatio = 1.0;
        if ($this->bg) {
            $bg = Image::make($root . $this->bg);
            $bg->backup();

            $bgRatio = $bg->height() * 1.0 / $bg->width();
        }

        $folder = $root . '/LaunchImage.launchimage/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $json = array(
            'images' => array(),
            'info' => array(
                'version' => 1,
                'author' => 'icon.wuruihong.com'
            )
        );
        $platforms = explode(',', $this->platform);
        foreach($this->sizes as $s) {
            if (!in_array($s['idiom'], $platforms)) {
                continue;
            }
            $item = $s;
            unset($item['width']);
            unset($item['height']);
            unset($item['skip']);

            $json['images'][] = $item;
            if (isset($s['skip']) && $s['skip']) {
                continue;
            }

            $img = Image::canvas($s['width'], $s['height'], $this->color ? $this->color : '#ffffff');
            if ($bg) {
                $bg->reset();
                $ratio = $s['height'] * 1.0 / $s['width'];
                if ($ratio > $bgRatio) {
                    $bg->heighten($s['height']);
                } else {
                    $bg->widen($s['width']);
                }
                $img->insert($bg, 'center');
            }
            $logo->reset();
            $logo->widen(round($s['width'] * .65));
            $img->insert($logo, 'top', 0, round($s['height'] * .45 - $logo->height() / 2));
            $img->save($folder . $s['filename']);
        }
        $json_string = json_encode($json, JSON_PRETTY_PRINT);
        file_put_contents($folder . 'Contents.json', $json_string);
    }

    public function package($regenerate = FALSE) {
        $folder = public_path('files') . '/' . $this->folder . '/' . $this->id . '/';
        $path = $folder . 'splash.zip';
        if (!file_exists($path) || $regenerate) {
            $zip = Zipper::make($path);
            $zip->folder('LaunchImage.launchimage')->add($folder . 'LaunchImage.launchimage');
            $zip->close();
        }
        return $path;
    }
}