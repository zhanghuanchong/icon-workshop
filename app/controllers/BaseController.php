<?php

use Illuminate\Filesystem;

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

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function json($param, $error = FALSE)
    {
        return Response::json(array(
            'e' => $error,
            'd' => $param
        ));
    }

}
