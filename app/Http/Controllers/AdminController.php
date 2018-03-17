<?php


use Illuminate\Support\Facades\Input;

require_once __DIR__ . '/../../library/class.geetestlib.php';
require_once __DIR__ . '/../../../config/geetest.php';

class AdminController extends \BaseController {

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

	private function verifyCode()
	{
		$GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
		$challenge = Input::get('geetest_challenge');
		$validate = Input::get('geetest_validate');
		$seccode = Input::get('geetest_seccode');

		if (Session::get('gtserver') == 1) {
			return $GtSdk->success_validate($challenge, $validate, $seccode, static::USER_ID);
		}
		return $GtSdk->fail_validate($challenge, $validate, $seccode);
	}

	public function postLogin()
	{
		$pwd = Input::get('password');
		if ($pwd != '880714') {
            return $this->json('密码错误!', TRUE);
        }
        if (!$this->verifyCode()) {
			return $this->json('验证失败!', TRUE);
		}
		return $this->json(TRUE);
	}

}
