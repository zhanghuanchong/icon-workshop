<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:07
 */

namespace App\Services;


use App\Splash;

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
    {}
}