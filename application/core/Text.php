<?php

class Text {

	public static $texts;

	public static function get($key, $data = null) {

		if(!$key) {
			return null;
		}

		if ($data) {
			foreach ($data as $key => $value) {
				${$key} = $value;
			}
		}

		if (!self::$texts) {
			$json = file_get_contents('../application/config/texts.json');
			self::$texts = json_decode($json, true);
		}

		$keys_arr = explode('/', $key);
		$text_arr = self::$texts;

		foreach ($keys_arr as $key) {
			if (array_key_exists($key, $text_arr)) {
				$text_arr = $text_arr[$key];
			} else {
				return null;
			}
		}

		return $text_arr;
	}
}