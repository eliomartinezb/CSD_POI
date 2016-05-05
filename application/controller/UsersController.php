<?php

class UsersController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::checkAuthentication();
	}

	public function index() {
		$this->View->render('users/index');
	}
	
	public function createNewUser() {
		$data = Session::get('data');
		if (empty($data)) {
			$data = array('user_name' => '', 'user_email' => '');
		}
		$this->View->render('users/createNewUser', $data);
	}
	
	public function saveNewUser() {
		$result = UserModel::saveNewUser(Request::post('user_name'), Request::post('user_email'));
		
		if ($result) {
			Redirect::to('users/index');
		} else {	
			Redirect::to('users/createnewuser');
		}
	}
}