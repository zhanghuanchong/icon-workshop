<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 17:56
 */

namespace App\Services;

use App\Design;
use App\Platforms\BaseIcon;
use App\Platforms\Platform;
use Chumper\Zipper\Facades\Zipper;
use Image;
use Imagick;
use File;
use ImagickDraw;
use ImagickPixel;

class DesignService extends BaseService
{
    /** @var Design $design */
    public $design;

    public function __construct(Design $design)
    {
        $this->design = $design;
        parent::__construct();
    }

    /**
     * @param null $formats
     * @param bool $alsoSizes
     *
     * @throws \ImagickException
     */
    public function generateIcons($formats = NULL, $alsoSizes = TRUE) {
        if (!$formats) {
            $formats = explode(',', $this->design->platform);
        }

        $root = public_path('files') . '/' . $this->design->folder . '/' . $this->design->id . '/';
        $appleFormats = array('ios', 'iwatch', 'mac');
        $specialKeys = array('role', 'subtype');
        $img = Image::make($root . 'origin.' . $this->design->ext);
        $maxLength = 1024;
        if ($img->getWidth() > $maxLength || $img->getHeight() > $maxLength) {
            $img->resize($maxLength, $maxLength);
        }
        $img->backup();

        // 自动圆角
        $imgRound = null;
        if (array_intersect($formats, ['android', 'webapp', 'quasar']) && $this->design->radius) {
            $imagickDraw = new ImagickDraw();
            $round = $this->design->radius / 100 * 1024;
            $imagickDraw->setFillColor(new ImagickPixel('white'));
            $imagickDraw->roundRectangle(0, 0, 1024, 1024, $round, $round);

            $imagick = new Imagick();
            $imagick->newImage(1024, 1024, new ImagickPixel('black'));
            $imagick->drawImage($imagickDraw);
            $imagick->setImageFormat('png');

            $imgRound = Image::make($root . 'origin.' . $this->design->ext);
            $imgRound->resize(1024, 1024);
            $imgRound->mask($imagick, false);
            $imgRound->backup();
        }

        $bgColor = $this->design->bg_color ?: '#ffffff';
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
            $format_root = Util::ensureDir($root . $format . '/');
            /** @var BaseIcon $platform */
            $platform = BaseIcon::getInstance($format);
            $sizes = $platform->getSizesForDesign($this->design);
            $json_folder = '';
            $json = array();
            if (in_array($format, $appleFormats, TRUE)) {
                $json = array(
                    'images' => array(),
                    'info' => array(
                        'version' => 1,
                        'author' => 'icon.wuruihong.com'
                    )
                );
            }
            $webappLinks = $format === 'webapp' ? array() : NULL;
            foreach($sizes as $s) {
                $folder = $format_root;
                if (isset($s['folder'])) {
                    if ($format === 'android' && $this->design->android_folder) {
                        $s['folder'] = str_replace('drawable', $this->design->android_folder, $s['folder']);
                    }

                    $folder = Util::ensureDir($format_root . $s['folder'] . '/');
                }
                $scale = $s['scale'] ?? 1;
                $length = $s['size'] * $scale;
                if ($format === Platform::WINDOWS_PHONE ||
                    isset($s['bg']) ||
                    in_array($format, ['ios', 'iwatch'], true))
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

                if ($format === 'android' && $this->design->android_name) {
                    $name = $this->design->sanitized_android_name;
                } else if (isset($s['name'])) {
                    $name = $s['name'];
                } else {
                    $name = 'icon-' . $s['size'] . ($scale === 1 ? '' : '@' . $scale . 'x');
                }
                $_img->save($folder . $name . '.png');

                if ($format === 'webapp') {
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
                    if ($w['sizes'] !== '60x60') {
                        $_ .= ' sizes="' . $w['sizes'] . '"';
                    }
                    $_ .= ' href="' . $w['href'] . '" />';
                    $s[] = $_;
                }
                file_put_contents($format_root . 'readme.txt', implode("\r\n", $s));
            }
            if ($format === Platform::PHONEGAP || in_array($format, $appleFormats, TRUE)) {
                $json_string = json_encode($json, JSON_PRETTY_PRINT);
                file_put_contents($json_folder . 'Contents.json', $json_string);
            }
        }

        $sizes = $this->design->sizes;
        if ($alsoSizes && $sizes) {
            $folder = Util::ensureDir($root . Design::CUSTOM_FOLDER . '/');
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
        }
    }

    protected function optimize(\Intervention\Image\Image $_img, $length) {
        if ($length <= 30) {
            $_img->sharpen(5);
        } else if ($length <= 50) {
            $_img->sharpen(2);
        }
    }

    /**
     * @param bool $regenerate
     *
     * @return string
     * @throws \Exception
     */
    public function package($regenerate = FALSE) {
        $folder = public_path('files') . '/' . $this->design->folder . '/' . $this->design->id . '/';
        $path = $folder . 'icons.zip';
        if ($regenerate || !file_exists($path)) {
            /** @var \Chumper\Zipper\Zipper $zip */
            $zip = Zipper::make($path);
            $formats = explode(',', $this->design->platform);
            foreach($formats as $f) {
                $zip->folder($f)->add($folder . $f);
            }

            $custom_folder = $folder . Design::CUSTOM_FOLDER;
            if (file_exists($custom_folder)) {
                $zip->folder(Design::CUSTOM_FOLDER)->add($custom_folder);
            }

            $zip->close();
        }
        return $path;
    }

    public function isGenerated()
    {
        $path = public_path('files') . '/' . $this->design->getFolder();
        if (!file_exists($path)) {
            return null;
        }
        $dirs = File::directories($path);
        return count($dirs) > 0;
    }

    public function deleteCache()
    {
        $dir = public_path('files') . '/' . $this->design->folder . '/' . $this->design->id;
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
        $dir = public_path('files') . '/' . $this->design->folder . '/' . $this->design->id;
        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }
    }

    public function prepare()
    {
        $root = public_path('files') . '/' . $this->design->folder . '/' . $this->design->id . '/';
        $path = $root . 'origin.' . $this->design->ext;
        $img = Image::make($path);
        $width = $img->getWidth();
        $height = $img->getHeight();
        if ($width <= 1024 && $height <= 1024 && strtolower($this->design->ext) !== 'psd') {
            return;
        }
        $img->heighten(1024);
        if ($img->getWidth() > 1024) {
            $img->widen(1024);
        }

        if ($this->design->ext === 'psd') {
            $this->design->ext = 'png';
            $this->design->mime_type = 'image/png';
            $this->design->save();
            $path = $root . 'origin.' . $this->design->ext;
        }
        $img->save($path);
    }
}