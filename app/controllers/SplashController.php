<?php

class SplashController extends BaseController {

	public function getIndex() {
		return Response::view('splash/home');
	}

	public function postUpload ()
	{
		$id = str_random(8);
		$files_folder = public_path('files');

		$splash = new Splash;
		$splash->id = $id;
		$splash->folder = date('Ym');

		$folder = $files_folder . '/' . $splash->folder . '/' . $id;
		if (!file_exists($folder)) {
			mkdir($folder, 0777, TRUE);
		}

		$splash->logo = $this->getInputFilePath($folder, 'logo');
		$splash->color = Input::get('color');
		$splash->bg = $this->getInputFilePath($folder, 'bg');
		$splash->platform = implode(',', Input::get('platform'));

		$orientation = 'portrait';
		if (Input::has('orientation')) {
			$orientation = Input::get('orientation');
		}
		$splash->orientation = $orientation;
		$splash->user_agent = Input::server('HTTP_USER_AGENT');
		$splash->ip = Input::getClientIp();

		$splash->save();
		$splash->generate();

		return Redirect::to('/splash/detail/' . $id);
	}

	public function getDetail ($id)
	{
	}

	public function getDownload ($id, $regenerate = FALSE)
	{
	}

}
