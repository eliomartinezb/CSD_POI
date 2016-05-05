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
		<form action="<?php echo Config::get('URL'); ?>login/createUser" method="post">
			<?php $this->renderFeedbackMessages(); ?>
			<label>Nombre</label>
			<div class="input-container">
				<input type="text" name="user_name" placeholder="Nombres" value="<?php echo $this->user_name; ?>">
			</div>
			<label>Correo Electrónico</label>
			<div class="input-container">
				<input type="text" name="user_email" placeholder="Correo Electrónico" value="<?php echo $this->user_email; ?>">
			</div>
			<label>Contraseña</label>
			<div class="input-container">
				<input type="password" name="user_pwd" placeholder="Contraseña">
			</div>
			<label>Confirmar Contraseña</label>
			<div class="input-container">
				<input type="password" name="user_pwd_confirm" placeholder="Confirmar Contraseña">
			</div>
			<input class ="btn1" type="submit" name="submit_registration" value="CREAR CUENTA">
			<a class="link1 last" href="<?php echo Config::get('URL'); ?>login/index">Regresar</a>
		</form>
	</div>
</body>
</html>