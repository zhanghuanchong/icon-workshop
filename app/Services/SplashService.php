<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:07
 */

namespace App\Services;


use App\Platforms\BaseSplash;
use App\Splash;
use File;
use Image;
use Zipper;

class SplashService extends BaseService
{
    /** @var Splash $splash */
    public $splash;

    public function __construct(Splash $splash)
    {
        $this->splash = $splash;
        parent::__construct();
    }

    public function generate()
    {
        $config = $this->splash->config;
        $dir = public_path('files') . '/' . $this->splash->folder . '/' . $this->splash->uuid . '/';
        $BASE_SIZE = 375;
        foreach ($config['platforms'] as $platform) {
            $contents = [
                'images' => [],
                'info' => [
                    'version' => 1,
                    'author' => 'https://icon.wuruihong.com',
                ],
            ];
            $fileDir = $dir . $platform . '/';
            $splashConfig = BaseSplash::getInstance($platform);
            foreach ($splashConfig->getSizes() as $item) {
                $width = $item['width'];
                $height = $item['height'];
                $short = min($width, $height);
                $baseScale = $short / $BASE_SIZE;

                $rate = $width / $height;
                if ($rate >= 1) {
                    $baseScale *= 0.625;
                } else if ($rate >= 0.75) {
                    $baseScale *= 0.75;
                } else if ($rate >= 0.66) {
                    $baseScale *= 0.875;
                }

                $orientation = $width > $height ? 'landscape' : 'portrait';
                if (!in_array($orientation, $config['orientations'])) {
                    continue;
                }

                $fileDir = $dir . $platform . '/' . $item['folder'] . '/';
                static::ensureDir($fileDir);
                $filePath = $fileDir . $item['filename'];

                if (!file_exists($filePath)) {
                    $base = Image::canvas($width, $height, $config['backgroundColor']);
                    foreach ($config['objects'] as $object) {
                        if ($object['proto'] === 'Image') {
                            $img = Image::make(public_path() . $object['url']);
                            $scale = ($object['scale'] ?? 1) * $baseScale;

                            $w = $img->width() * $scale;
                            $h = $img->height() * $scale;
                            $img->resize($w, $h);

                            $base->insert(
                                $img,
                                'top-left',
                                (int)($width * $object['left'] / 100 - $w / 2),
                                (int)($height * $object['top'] / 100 - $h / 2)
                            );
                        }
                    }

                    $base->save($filePath);
                }

                unset($item['width'], $item['height'], $item['folder']);
                $contents['images'][] = $item;
            }

            if ($platform === 'ios') {
                file_put_contents($fileDir . 'Contents.json', json_encode($contents, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }
        }
    }

    /**
     * @param bool $regenerate
     *
     * @return string
     * @throws \Exception
     */
    public function package($regenerate = FALSE) {
        $folder = public_path('files') . '/' . $this->splash->folder . '/' . $this->splash->uuid . '/';
        $path = $folder . 'splashes.zip';
        if (!file_exists($path) || $regenerate) {
            /** @var \Chumper\Zipper\Zipper $zip */
            $zip = Zipper::make($path);
            foreach($this->splash->platform as $f) {
                $zip->folder($f)->add($folder . $f);
            }

            $zip->close();
        }
        return $path;
    }

    public function deleteCache()
    {
        $dir = public_path('files') . '/' . $this->splash->folder . '/' . $this->splash->id;
        if (!File::exists($dir)) {
            return;
        }
        $platforms = File::directories($dir);
        foreach($platforms as $platform) {
            File::deleteDirectory($platform);
        }
        $zip = $dir . '/splashes.zip';
        if (File::exists($zip)) {
            File::delete($zip);
        }
    }

    public function deleteFolder()
    {
        $dir = public_path('files') . '/' . $this->splash->folder . '/' . $this->splash->id;
        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }
    }
}