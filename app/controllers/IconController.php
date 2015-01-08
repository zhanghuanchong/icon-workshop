<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if ($file->isValid()) {
                var_dump($file->getMimeType());

                $id = GUID::generate();
                $filename = $id . '.' . $file->getClientOriginalExtension();

                $file->move(storage_path('files'), $filename);
            }
        }
	}

}
