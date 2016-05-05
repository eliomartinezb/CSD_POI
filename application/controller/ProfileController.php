<?php

class ProfileController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::checkAuthentication();
	}

	public function index() {
		$this->View->render('profile/index');
	}

	public function saveUserInfo() {

		$result = ProfileModel::saveUserData(Session::get('user_id'), Request::post('user_name'), Request::post('user_email'));
		Redirect::to('profile/index');
	}

	public function changePassword() {
		$this->View->render('profile/changePassword');
	}

	public function saveNewPassword() {

		$result = ProfileModel::saveNewPassword(Session::get('user_id'), Request::post('user_new_pwd'), Request::post('user_new_pwd_confirm'));

		if ($result) {
			Redirect::to('profile/index');
		} else {
			Redirect::to('profile/changePassword');
		}
	}
}