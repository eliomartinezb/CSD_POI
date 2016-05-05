<?php

class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		if (LoginModel::isUserLoggedIn()) {
			Redirect::to('dashboard/index');
		} else {
			$data = array('redirect' => Request::get('redirect') ? Request::get('redirect') : NULL);
			$this->View->render('login/index', $data);
		}
	}

	public function login() {

		if (!Csrf::isTokenValid()) {
			LoginModel::logout();
			Redirect::to('login/index');
			exit();
		}

		$login_successful = LoginModel::login(
			Request::post('user_email'), Request::post('user_pwd'), Request::post('set_remember_me_cookie')
			);

		if ($login_successful) {
			if (Request::post('redirect')) {
				Redirect::to(ltrim(urldecode(Request::post('redirect')), '/'));
			} else {
				Redirect::to('dashboard/index');
			}
		} else {
			Redirect::to('login/index');
		}
	}

	public function logout() {
		LoginModel::logout();
		Redirect::to('login/index');
		exit();
	}

	public function registerUser() {
		if (LoginModel::isUserLoggedIn()) {
			Redirect::to('dashboard/index');
		} else {
			$data = Session::get('data');
			if (empty($data)) {
				$data = array('user_name' => '', 'user_email' => '');
			}
			$this->View->render('login/registerUser', $data);
		}
	}

	public function createUser() {
		
		$result = RegistrationModel::createUser();

		if ($result) {
			Redirect::to('login/index');
		} else {
			Redirect::to('login/registerUser');
		}
	}

	public function recoverPassword() {
		if (LoginModel::isUserLoggedIn()) {
			Redirect::to('dashboard/index');
		} else {
			$this->View->render('login/recoverPassword');
		}
	}
	
	public function verifyAccount($user_id = NULL, $activation_code = NULL) {

		if (!empty($user_id) AND !empty($activation_code)) {
			RegistrationModel::verifyNewUser($user_id, $activation_code);
		} else {
			Session::add('feedback_negative', Text::get('notification/error/account-activation-error'));
		}
		
		Redirect::to('login/index');
	}
	
	public function passwordReset() {
		
		$result = PasswordResetModel::requestReset(Request::post('user_email'));

		if ($result) {
			Redirect::to('login/index');
		} else {
			Redirect::to('login/recoverPassword');
		}
	}

	public function verifyPasswordReset($user_id = NULL, $verification_code = NULL) {

		$result = PasswordResetModel::verifyPasswordReset($user_id, $verification_code);

		if ($result) {
			$this->View->render('login/resetPassword', array(
				'user_id' => $user_id,
				'user_password_reset_hash' => $verification_code
			));
		} else {
			Redirect::to('login/index');
		}
	}

	public function saveNewPassword() {

		$result = PasswordResetModel::saveNewPassword(Request::post('user_id'), Request::post('user_password_reset_hash'), Request::post('user_new_pwd'), Request::post('user_new_pwd_confirm'));

		if ($result) {
			Redirect::to('login/index');
		} else {
			Redirect::to('login/verifyPasswordReset/' . Request::post('user_id') . '/' . Request::post('user_password_reset_hash'));
		}
	}

	public function verifyEmail($user_id, $verification_code) {
		ProfileModel::verifyEmail($user_id, $verification_code);
		Redirect::to('login/index');
	}
}