<?php

class MapModel {

	public static function addPoint(){
		$json = array();
		$lat = Request::post('lat');
		$long = Request::post('long');
		$name = Request::post('name');
		$desc = Request::post('desc');

		if (empty($lat)) {
			$json['result'] = '0';
			$json['message'] = 'La latitud se encuentra vacía.';
			return $json;
		}

		if (empty($long)) {
			$json['result'] = '0';
			$json['message'] = 'La longitud se encuentra vacía.';
			return $json;
		}

		if (empty($name)) {
			$json['result'] = '0';
			$json['message'] = 'El nombre se encuentra vacía.';
			return $json;
		}

		if (empty($desc)) {
			$json['result'] = '0';
			$json['message'] = 'La descripción se encuentra vacía.';
			return $json;
		}

		$data = array(
			'poi_lat' => $lat,
			'poi_long' => $long,
			'poi_name' => $name,
			'poi_desc' => $desc
		);

		Session::init();
		Session::set('poi_list', $data);

		$json['result'] = '1';
		$json['message'] = 'Se ha grabado el poi con éxito.';
		return $json;
	}

}