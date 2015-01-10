<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if ($file->isValid()) {
                $id = GUID::generate();
                $ext = $file->getClientOriginalExtension();
                $filename = $id . '.' . $ext;

                $design = new Design;
                $design->id = $id;
                $design->file = $filename;
                $design->ext = $ext;
                $design->original_name = $file->getClientOriginalName();
                $design->mime_type = $file->getMimeType();
                $design->user_agent = Input::server('HTTP_USER_AGENT');
                $design->ip = Input::getClientIp();

                $file->move(storage_path('files'), $filename);

                $design->save();

                return $this->jsonResponse($id);
            }
        }
        return $this->jsonResponse('文件无效！', TRUE);
	}

    public function getDetail ($id)
    {
        return $id;
    }

}
