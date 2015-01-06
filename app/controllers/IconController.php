<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        $file = Input::file('file');
        if (!$file || !$file->isValid()) {
            return;
        }
        var_dump($file);
	}

}
