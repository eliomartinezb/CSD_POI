<?php

class Auth {

	public static function checkAuthentication() {

		if (!Session::userIsLoggedIn()) {
			Session::destroy();
			header('location: ' . Config::get('URL') . 'login?redirect=' . urlencode($_SERVER['REQUEST_URI']));
			exit();
		}
	}

	public static function checkSessionConcurrency() {
		if(Session::userIsLoggedIn()){
			if(Session::isConcurrentSessionExists()){
				LoginModel::logout();
				Redirect::home();
				exit();
			}
		}
	}
}