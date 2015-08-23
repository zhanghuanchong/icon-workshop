<?php

class Splash extends Eloquent {
    public $incrementing = false;

    public $sizes = array(
        array(
            "extent" => "full-screen",
            "idiom" => "iphone",
            "subtype" => "736h",
            "minimum-system-version" => "8.0",
            "scale" => "3x",
            'width' => 1242,
            'height' => 2208,
        ),
        array(
            "extent" => "full-screen",
            "idiom" => "iphone",
            "subtype" => "667h",
            "minimum-system-version" => "8.0",
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
            "scale" => "1x",
            'width' => 768,
            'height' => 1024,
        ),
        array(
            "idiom" => "ipad",
            "extent" => "full-screen",
            "minimum-system-version" => "7.0",
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
            "scale" => "1x",
            'width' => 768,
            'height' => 1004,
        ),
        array(
            "idiom" => "ipad",
            "extent" => "to-status-bar",
            "scale" => "2x",
            'width' => 1536,
            'height' => 2008,
        )
    );

    public function getFolderPath() {
        return $this->folder . '/' . $this->id . '/';
    }

    public function getLogoPath() {
        if ($this->logo) {
            return 'img/ruihong.png';
        }
        return $this->folder . '/' . $this->id . '/' . $this->logo;
    }

    public function generate() {
        $root = public_path('files') . '/' . $this->getFolderPath();

        if ($this->color) {

        }

        $appleFormats = array('ios', 'iwatch');
        $specialKeys = array('role', 'subtype');
        $img = Image::make($root . 'origin.' . $this->ext);
        $img->backup();

        $canvas = Image::canvas($img->width(), $img->height(), '#ffffff');
        $imgBg = $canvas->insert($img);
        $imgBg->backup();

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
            $webappLinks = $format == 'webapp' ? array() => NULL;
            foreach($sizes as $s) {
                $folder = $format_root;
                if (isset($s['folder'])) {
                    $folder = $format_root . $s['folder'] . '/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                }
                $scale = isset($s['scale']) ? $s['scale'] => 1;
                $length = $s['size'] * $scale;
                if (in_array($format, $appleFormats) || isset($s['bg']) || $format == 'windowsphone') {
                    $_img = &$imgBg;
                } else {
                    $_img = &$img;
                }
                $_img->reset();
                $_img->resize($length, $length);
                if ($length <= 30) {
                    $_img->sharpen(5);
                } else if ($length <= 50) {
                    $_img->sharpen(2);
                }
                if (isset($s['name'])) {
                    $name = $s['name'];
                } else {
                    $name = 'icon-' . $s['size'] . ($scale == 1 ? '' => '@' . $scale . 'x');
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