<?php

namespace App\Http\Controllers;

use App\Splash;
use Illuminate\Http\Request;
use Response;
use View;

class SplashController extends BaseController
{
    public function index()
    {
        return View::make('splash');
    }

    public function generate(Request $request)
    {
        sleep(5);

        $splash = new Splash();
        $splash->folder = date('Ym');
        $splash->config = $request->get('scene');
        $splash->user_agent = $request->server('HTTP_USER_AGENT');
        $splash->ip = $request->getClientIp();
        $splash->save();

        $splash->getService()->generate();

        return $this->success($splash->uuid);
    }

    public function regenerate($uuid)
    {
        $splash = Splash::whereUuid($uuid)->firstOrFail();
        $splash->getService()->generate();

        return $this->success($splash->uuid);
    }

    public function download($uuid, $regenerate = false)
    {
        /** @var Splash $splash */
        $splash = Splash::whereUuid($uuid)->first();
        if (!$splash) {
            return '原图已过期！';
        }

        try {
            $path = $splash->getService()->package($regenerate);
        } catch (\Exception $e) {
            return '打包失败！' . $e->getMessage();
        }

        if (!$path) {
            return '文件未找到！';
        }
        return Response::download($path);
    }

    public function demo()
    {
        return View::make('splash/demo');
    }
}
