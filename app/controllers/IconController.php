<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if ($file->isValid()) {
                $id = GUID::generate();
                $ext = $file->getClientOriginalExtension();

                $design = new Design;
                $design->id = $id;
                $design->folder = date('Ymd');
                $design->ext = $ext;
                $design->original_name = $file->getClientOriginalName();
                $design->mime_type = $file->getMimeType();
                $design->user_agent = Input::server('HTTP_USER_AGENT');
                $design->ip = Input::getClientIp();

                $files_folder = public_path('files');
                $folder = $files_folder . '/' . $design->folder . '/' . $id;
                if (!file_exists($folder)) {
                    mkdir($folder, 777, TRUE);
                }

                $file->move($folder, 'origin.' . $ext);

                $design->save();
                $design->generateIcons(array(
                    'ios', 'android',/*'windows_phone', 'webapp'*/
                ));

                return $this->jsonResponse($id);
            }
        }
        return $this->jsonResponse('文件无效！', TRUE);
	}

    public function getDetail ($id)
    {
        $design = Design::findOrFail($id);
        return Response::view('icon/detail', array(
            'design' => $design
        ));
    }

}
