<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use File;
use Response;

class BaseController extends Controller {

	public function __construct()
	{
		$path = base_path() . '/.git/index';
		$version = time();
		if (File::exists($path)) {
			$version = File::lastModified($path);
		}
		$GLOBALS['_VER_'] = $version;
	}

    protected function json($param, $error = FALSE)
    {
        return Response::json(array(
            'e' => $error,
            'd' => $param
        ));
    }

}
