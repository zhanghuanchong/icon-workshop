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
use Image;

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
        foreach ($config['platforms'] as $platform) {
            $splashConfig = BaseSplash::getInstance($platform);
            foreach ($splashConfig->getSizes() as $item) {
                $width = $item['width'];
                $height = $item['height'];
                $orientation = $width > $height ? 'landscape' : 'portrait';
                if (!in_array($orientation, $config['orientations'])) {
                    continue;
                }

                $fileDir = $dir . $platform . '/' . $item['folder'] . '/';
                static::ensureDir($fileDir);
                $filePath = $fileDir . $item['filename'];

                if (!file_exists($filePath)) {
                    // TODO: 检测文件是否已经生成，如已生成，跳过，直接写配置文件
                    $base = Image::canvas($width, $height, $config['backgroundColor']);
                    // TODO: 根据缩放倍数缩放 $base
                    foreach ($config['objects'] as $object) {
                        if ($object['proto'] === 'Image') {
                            $img = Image::make(public_path() . $object['url']);
                            $scale = $object['scale'] ?? 1;
                            $img->resize($img->width() * $scale, $img->height() * $scale);

                            $base->insert($img, 'top-left',
                                (int)($width * $object['left'] / 100),
                                (int)($height * $object['top'] / 100));
                        }
                    }

                    $base->save($filePath);
                }

                // TODO: 修改配置文件
            }
        }
    }
}