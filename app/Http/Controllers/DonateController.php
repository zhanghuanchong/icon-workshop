<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends BaseController
{
    public function index()
    {
        return view('donate');
    }
}
