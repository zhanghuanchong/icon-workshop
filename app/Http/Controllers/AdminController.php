<?php

namespace App\Http\Controllers;


use App\Http\Controllers\BaseController;
use GeetestLib;
use Illuminate\Http\Request;
use Redirect;

require_once __DIR__ . '/../../library/class.geetestlib.php';
require_once __DIR__ . '/../../../config/geetest.php';

class AdminController extends BaseController {

	const USER_ID = 'admin';

	public function getIndex()
	{
		return Redirect::to('/#/admin');
	}

	public function getVerifyCode()
	{
		$GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
		$status = $GtSdk->pre_process(static::USER_ID);
		Session::put('gtserver', $status);
		echo $GtSdk->get_response_str();
	}

	private function verifyCode(Request $request)
	{
		$GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
		$challenge = $request->get('geetest_challenge');
		$validate = $request->get('geetest_validate');
		$seccode = $request->get('geetest_seccode');

		if (Session::get('gtserver') == 1) {
			return $GtSdk->success_validate($challenge, $validate, $seccode, static::USER_ID);
		}
		return $GtSdk->fail_validate($challenge, $validate, $seccode);
	}

	public function postLogin(Request $request)
	{
		$pwd = $request->get('password');
		if ($pwd != '') {
            return $this->failed('密码错误!');
        }
        if (!$this->verifyCode()) {
			return $this->failed('验证失败!');
		}
		return $this->success();
	}

}
