<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

ini_set('session.cookie_httponly', 1);

return array(
	'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])),

	'PATH_CONTROLLER' => realpath(dirname(__FILE__).'/../../') . '/application/controller/',
	'PATH_VIEW' => realpath(dirname(__FILE__).'/../../') . '/application/view/',

	'DEFAULT_CONTROLLER' => 'dashboard',
	'DEFAULT_ACTION' => 'index',

	'DB_TYPE' => 'mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_NAME' => 'POI',
	'DB_USER' => 'poi',
	'DB_PASS' => 'poi123456',
// 	'DB_PORT' => '3306',
	'DB_PORT' => '8889',
	'DB_CHARSET' => 'utf8',

	'COOKIE_RUNTIME' => 1209600,
	'COOKIE_PATH' => '/',
	'COOKIE_DOMAIN' => "",
	'COOKIE_SECURE' => false,
	'COOKIE_HTTP' => true,
	'SESSION_RUNTIME' => 604800,

	'ENCRYPTION_KEY' => '6#x0gÊìf^25cL1f$08&',
	'HMAC_SALT' => '8qk9c^4L6d#15tM8z7n0%',

	'EMAIL_USED_MAILER' => 'phpmailer',
	'EMAIL_USE_SMTP' => false,
	'EMAIL_SMTP_HOST' => 'e7.ehosts.com',
	'EMAIL_SMTP_AUTH' => true,
	'EMAIL_SMTP_USERNAME' => 'jestupinan@zeerbyte.com',
	'EMAIL_SMTP_PASSWORD' => 'Wgiaom1686',
	'EMAIL_SMTP_PORT' => 465,
	'EMAIL_SMTP_ENCRYPTION' => 'ssl',

	'EMAIL_PASSWORD_RESET_URL' => 'login/verifypasswordreset',
	'EMAIL_PASSWORD_RESET_FROM_EMAIL' => 'no-reply@uees.edu.ec',
	'EMAIL_PASSWORD_RESET_FROM_NAME' => 'Sistema Admisión Postgrado UEES',
	'EMAIL_PASSWORD_RESET_SUBJECT' => 'Reinicio contraseña',

	'EMAIL_PASSWORD_RESET_CONTENT' => 'Por favor haz click en el siguiente enlace para reiniciar la contraseña: ',
	'EMAIL_VERIFICATION_URL' => 'login/verifyaccount',
	'EMAIL_VERIFICATION_FROM_EMAIL' => 'no-reply@uees.edu.ec',
	'EMAIL_VERIFICATION_FROM_NAME' => 'Sistema Admisión Postgrado UEES',
	'EMAIL_VERIFICATION_SUBJECT' => 'Acrivación de Cuenta',
	'EMAIL_VERIFICATION_CONTENT' => 'Por favor haz click en el siguiente enlace para activar tu cuenta: ',

	'EMAIL_VERIFICATION2_URL' => 'login/verifyemail',
	'EMAIL_VERIFICATION2_FROM_EMAIL' => 'no-reply@uees.edu.ec',
	'EMAIL_VERIFICATION2_FROM_NAME' => 'Sistema Admisión Postgrado UEES',
	'EMAIL_VERIFICATION2_SUBJECT' => 'Verificacion de correo',
	'EMAIL_VERIFICATION2_CONTENT' => 'Por favor haz click en el siguiente enlace para verificar el mail: ',
);