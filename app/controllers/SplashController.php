<?php

class SplashController extends BaseController {

	public function getIndex() {
		return Response::view('splash/home');
	}
	public function postUpload ()
	{
		$id = str_random(8);
		$files_folder = public_path('files');

		$input = Input::all();
		$logo = 'img/ruihong.png';
		if (Input::hasFile('logo')) {
			$logo = Input::file('logo');
		}
		Input::file('logo');
		if (Input::hasFile('file')) {
			$file = Input::file('file');
			if ($file->isValid()) {
				$ext = $file->getClientOriginalExtension();

				$design = new Design;
				$design->id = $id;
				$design->folder = date('Ym');
				$design->ext = $ext;
				$design->original_name = $file->getClientOriginalName();
				$design->mime_type = $file->getMimeType();
				$design->platform = Input::get('platform') ? Input::get('platform') : 'ios_android';
				$design->user_agent = Input::server('HTTP_USER_AGENT');
				$design->ip = Input::getClientIp();

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
