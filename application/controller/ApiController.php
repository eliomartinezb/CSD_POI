<?php

class ApiController extends Controller {

	public function viewNearestPOI($lat1, $lon1, $service) {
		$json = array();
		$json['json'] = MapModel::nearestPOI($lat1, $lon1, $service);
		$this->View->renderJSON($json);
	}

	public function addPoint() {
		$json = array();
		$json['json'] = MapModel::addPoint();
		$this->View->renderJSON($json);
	}

    public function viewmapPOI($mapa, $service) {
		$json = array();
		$json['json'] = MapModel::mapPOI($mapa, $service);
		$this->View->renderJSON($json);
	}

}