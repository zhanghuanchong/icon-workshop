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
                'size' => 29
            ),
            array(
                'size' => 29,
                'scale' => 2
            ),
            array(
                'size' => 40
            ),
            array(
                'size' => 40,
                'scale' => 2
            ),
            array(
                'size' => 50
            ),
            array(
                'size' => 50,
                'scale' => 2
            ),
            array(
                'size' => 57
            ),
            array(
                'size' => 57,
                'scale' => 2
            ),
            array(
                'size' => 60,
                'scale' => 2
            ),
            array(
                'size' => 60,
                'scale' => 3
            ),
            array(
                'size' => 72
            ),
            array(
                'size' => 72,
                'scale' => 2
            ),
            array(
                'size' => 76
            ),
            array(
                'size' => 76,
                'scale' => 2
            ),
            array(
                'size' => 512,
                'name' => 'iTunesArtwork'
            ),
            array(
                'size' => 512,
                'scale' => 2,
                'name' => 'iTunesArtwork@2x'
            ),
        ),
        'android' => array(
            array(
                'size' => 36
            ),
            array(
                'size' => 48
            ),
            array(
                'size' => 48,
                'scale' => 1.5
            ),
            array(
                'size' => 48,
                'scale' => 2
            ),
            array(
                'size' => 48,
                'scale' => 3
            ),
            array(
                'size' => 48,
                'scale' => 4
            ),
            array(
                'size' => 512
            ),
        ),
    );

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
            foreach($sizes as $s) {
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
                    $name = 'icon_' . $s['size'] . ($scale == 1 ? '' : '@' . $scale . 'x');
                }
                $img->save($format_root . $name . '.png');
            }
        }
    }
}