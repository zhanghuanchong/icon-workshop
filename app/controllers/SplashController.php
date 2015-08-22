<?php

class SplashController extends BaseController {

	public function getIndex() {
		return Response::view('splash/home');
	}
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
				$design->platform = Input::get('platform') ? Input::get('platform') : 'ios_android';
				$design->user_agent = Input::server('HTTP_USER_AGENT');
				$design->ip = Input::getClientIp();

				$files_folder = public_path('files');
				$folder = $files_folder . '/' . $design->folder . '/' . $id;
				if (!file_exists($folder)) {
					mkdir($folder, 0777, TRUE);
				}

				$file->move($folder, 'origin.' . $ext);

				$design->save();

				$platforms = explode(',', $design->platform);
				$design->generateIcons($platforms);

				return $this->jsonResponse($id);
			}
		}
		return $this->jsonResponse('文件无效！', TRUE);
	}

	public function getDetail ($id)
	{
	}

	public function getDownload ($id, $regenerate = FALSE)
	{
	}

}
