<?php
namespace App\Http\Controllers;

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

    protected function json($success = true, $message = null, $data = null)
    {
        return Response::json(array(
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ));
    }

    protected function success($data = null, $message = null)
    {
        return $this->json(true, $message, $data);
    }

    protected function failed($message = null, $data = null)
    {
        return $this->json(false, $message, $data);
    }
}
