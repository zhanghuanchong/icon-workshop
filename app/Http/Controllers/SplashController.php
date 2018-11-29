<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class SplashController extends BaseController
{
    public function index()
    {
        return View::make('splash');
    }
}
