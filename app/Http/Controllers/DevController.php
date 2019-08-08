<?php

namespace App\Http\Controllers;

use App\Services\Security;
use Illuminate\Http\Request;

class DevController extends BaseController
{
    public function myIp(Request $request)
    {
        $ips = Security::getClientIps();
        return $this->success($ips);
    }
}
