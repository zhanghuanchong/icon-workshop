<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('index');
	}

	public function changeLog()
	{
		return View::make('changelog');
	}

	public function about()
	{
		return View::make('about');
	}

	public function guide($platform)
	{
		$platforms = Config::get('constants.platforms');
		return View::make('guides/ios', [
			'platform' => $platforms[$platform]
		]);
	}

}
