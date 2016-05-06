<?php

class ApiController extends Controller {

	public function viewNearestPOI() {
		$json = array();
		$json['json'] = MapModel::nearestPOI();
		$this->View->renderJSON($json);
	}

	public function addPoint() {
		$json = array();
		$json['json'] = MapModel::addPoint();
		$this->View->renderJSON($json);
	}

}