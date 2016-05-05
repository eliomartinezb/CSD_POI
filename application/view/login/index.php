<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Config::get('URL'); ?>css/admin.css">
	<script src="<?php echo Config::get('URL'); ?>js/jquery.js"></script>
	<script src="<?php echo Config::get('URL'); ?>js/admin.js"></script>
</head>
<body>
	<div class="panel small">
		<form action="<?php echo Config::get('URL'); ?>login/login" method="post">
			<?php $this->renderFeedbackMessages(); ?>
			<div class="input-container">
				<span class="icon-mail"></span>
				<input class="has-icon" type="text" name="user_email" placeholder="Correo Electrónico">
			</div>
			<div class="input-container">
				<span class="icon-key"></span>
				<input class="has-icon" type="password" name="user_pwd" placeholder="Contraseña">
			</div>
			<label class="remember-me" for="set_remember_me_cookie">
				<input type="checkbox" name="set_remember_me_cookie"> Recuérdame
			</label>
			<?php if (!empty($this->redirect)) { ?>
			<input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>">
			<?php } ?>
			<input type="hidden" name="csrf_token" value="<?php echo Csrf::makeToken(); ?>">
			<input class ="btn1" type="submit" name="submit_login" value="LOGIN">
			<a class="btn2" href="<?php echo Config::get('URL'); ?>login/registerUser">REGÍSTRATE</a>
			<a class="link1 last" href="<?php echo Config::get('URL'); ?>login/recoverPassword">Recuperar Contraseña</a>
		</form>
	</div>
</body>
</html>