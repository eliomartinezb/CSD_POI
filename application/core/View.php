<?php

class View {

	public function render($filename, $data = null) {

		if ($data) {
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		require Config::get('PATH_VIEW') . $filename . '.php';
	}

	public function renderJSON($data) {
		header("Content-Type: application/json");
		echo json_encode($data);
	}

	public function renderFeedbackMessages() {

		ProfileModel::checkActivationHash(Session::get('user_id'));

		require Config::get('PATH_VIEW') . 'templates/feedback.php';

		Session::set('feedback_positive', null);
		Session::set('feedback_negative', null);
		Session::set('feedback_info', null);

	}

	public static function checkForActiveAction($filename, $navigation_action) {

		$split_filename = explode("/", $filename);
		$active_action = $split_filename[1];

		if ($active_action == $navigation_action) {
			return true;
		}

		return false;
	}

	public static function checkForActiveControllerAndAction($filename, $navigation_controller_and_action) {

		$split_filename = explode("/", $filename);
		$active_controller = $split_filename[0];
		$active_action = $split_filename[1];
		$split_filename = explode("/", $navigation_controller_and_action);
		$navigation_controller = $split_filename[0];
		$navigation_action = $split_filename[1];

		if ($active_controller == $navigation_controller AND $active_action == $navigation_action) {
			return true;
		}

		return false;
	}

	public function encodeHTML($str){
		return htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
}