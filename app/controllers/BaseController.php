<?php

class BaseController extends Controller {

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

    protected function jsonResponse($param, $error = FALSE)
    {
        return Response::json(array(
            'e' => $error,
            'd' => $param
        ));
    }

	protected function getInputFilePath($folder, $key)
	{
		$logo = NULL;
		if (Input::hasFile($key)) {
			$logo = Input::file($key);
			if ($logo->isValid()) {
				$original_name = $logo->getClientOriginalName();
				$logo->move($folder, $original_name);
				$logo = $original_name;
			}
		}
		return $logo;
	}

}
