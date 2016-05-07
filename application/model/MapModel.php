<?php

class MapModel {

	public static function nearestPOI($lat1, $lon1, $service) {
		$poi_id = '';
		$distance = 0;

		$database = DatabaseFactory::getFactory()->getConnection();
		$sql = "SELECT poi_id, poi_lat, poi_long FROM TB_POI";
		$query = $database->prepare($sql);
		$query->execute(array(
			':service' => $service
		));

		$pois = $query->fetchAll();

		foreach ($pois as $poi) {
			$lat2 = $poi->poi_lat;
			$lon2 = $poi->poi_long;

			$theta = $lon1 - $lon2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;

			if (empty($poi_id)) {
				$poi_id = $poi->poi_id;
				$distance = $miles;
			} elseif ($distance > $miles) {
				$poi_id = $poi->poi_id;
				$distance = $miles;
			}
		}

		$database = DatabaseFactory::getFactory()->getConnection();
		$sql = "SELECT poi_id, poi_name, poi_lat, poi_long, poi_desc, poi_cat FROM TB_POI WHERE poi_id = :id LIMIT 1";
		$query = $database->prepare($sql);
		$query->execute(array(':id' => $poi_id));

		return $query->fetchAll();
	}

	public static function mapPOI($mapa,$servicio) {

		$database = DatabaseFactory::getFactory()->getConnection();
		$sql = "SELECT p.POI_NAME, p.POI_DESC,p.POI_LAT,p.POI_LONG, p.POI_SERVICIO, m.MAPA_NAME FROM TB_POI p, TB_MAPA m, TB_POI_MAPA pm WHERE pm.POI_ID = p.POI_ID and pm.MAPA_ID = m.MAPA_ID and m.MAPA_ID = :mapa and p.POI_SERVICIO = :servicio";
		$query = $database->prepare($sql);
		$query->execute(array(
			':mapa' => $mapa,
			':servicio' => $servicio,
		));

		return $query->fetchAll();

	}


	public static function addPoint(){
		$json = array();
		$lat = Request::post('lat');
		$long = Request::post('long');
		$name = Request::post('name');
		$desc = Request::post('desc');
		$cat = Request::post('cat');
		$it = Request::post('it');

		if (empty($lat)) {
			$json['result'] = '0';
			$json['message'] = 'La latitud se encuentra vacía.';
			return $json;
		} elseif(!is_numeric($lat)) {
			$json['result'] = '0';
			$json['message'] = 'La latitud debe ser numérica.';
			return $json;
		}

		if (empty($long)) {
			$json['result'] = '0';
			$json['message'] = 'La longitud se encuentra vacía.';
			return $json;
		} elseif(!is_numeric($long)) {
			$json['result'] = '0';
			$json['message'] = 'La longitud debe ser numérica.';
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

		if (empty($cat)) {
			$json['result'] = '0';
			$json['message'] = 'La categoría se encuentra vacía.';
			return $json;
		}

		if (empty($it)) {
			$json['result'] = '0';
			$json['message'] = 'El itinerario se encuentra vacía.';
			return $json;
		}

		$database = DatabaseFactory::getFactory()->getConnection();
		$sql = "INSERT INTO TB_POI (poi_name, poi_cat, poi_it, poi_desc, poi_lat, poi_long) VALUES (:name, :cat, :it, :desc, :lat, :long)";
		$query = $database->prepare($sql);
		$query->execute(array(
			':name' => $name,
			':cat' => $cat,
			':it' => $it,
			':desc' => $desc,
			':lat' => $lat,
			':long' => $long
		));

		$json['result'] = '1';
		$json['message'] = 'Se ha grabado el poi con éxito.';
		return $json;
	}

}