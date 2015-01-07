<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if ($file->isValid()) {
                var_dump($file->getRealPath());
                var_dump($file->getClientOriginalName());
                var_dump($file->getClientOriginalExtension());
                var_dump($file->getSize());
                var_dump($file->getMimeType());
                $file->move(storage_path('files'));

                echo GUID::generate();
            }
        }
	}

}
