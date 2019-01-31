<?php

namespace App\Http\Controllers;

use App\Splash;
use Illuminate\Http\Request;
use View;

class SplashController extends BaseController
{
    public function index()
    {
        return View::make('splash');
    }

    public function generate(Request $request)
    {
        $splash = new Splash();
        $splash->folder = date('Ym');
        $splash->config = $request->get('scene');
        $splash->user_agent = $request->server('HTTP_USER_AGENT');
        $splash->ip = $request->getClientIp();
        $splash->save();

        $splash->getService()->generate();

        return $this->success($splash->id);
    }

    public function regenerate($uuid)
    {
        $splash = Splash::whereUuid($uuid)->firstOrFail();
        $splash->getService()->generate();

        return $this->success($splash->id);
    }
}
