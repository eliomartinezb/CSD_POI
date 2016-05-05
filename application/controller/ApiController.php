<?php

class ApiController extends Controller {

	public function viewSession() {
		$json = array();
		$json['test'] = $this;
		$this->View->renderJSON($json);
	}

	public function addPoint() {
		$json = array();
		$json['json'] = MapModel::addPoint();
		$this->View->renderJSON($json);
	}

}