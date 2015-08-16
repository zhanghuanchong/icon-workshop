<?php

class SplashController extends BaseController {

	public function getIndex() {
		return Response::view('splash/home');
	}

}
