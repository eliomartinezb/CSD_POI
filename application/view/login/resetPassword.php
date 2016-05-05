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
		<form action="<?php echo Config::get('URL'); ?>login/saveNewPassword" method="post">
			<?php $this->renderFeedbackMessages(); ?>
			<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>">
			<input type="hidden" name="user_password_reset_hash" value="<?php echo $this->user_password_reset_hash; ?>">
			<label>Nueva Contraseña</label>
			<div class="input-container">
				<span class="icon-key"></span>
				<input class="has-icon" type="password" name="user_new_pwd" placeholder="Nueva Contraseña">
			</div>
			<label>Confirmar Nueva Contraseña</label>
			<div class="input-container">
				<span class="icon-key"></span>
				<input class="has-icon" type="password" name="user_new_pwd_confirm" placeholder="Confirmar Nueva Contraseña">
			</div>
			<input class ="btn1" type="submit" name="submit_new_pwd" value="GUARDAR">
			<a class="link1 last" href="<?php echo Config::get('URL'); ?>login/index">Ir a página principal</a>
		</form>
	</div>
</body>
</html>