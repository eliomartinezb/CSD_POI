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
	<?php $this->render('templates/header', array('menu_selected' => 'profile')); ?>
	<div class="main">
		<div class="panel small">
			<form action="<?php echo Config::get('URL'); ?>profile/savenewpassword" method="post">
				<?php $this->renderFeedbackMessages(); ?>
				<label>Nueva Contraseña</label>
				<div class="input-container">
					<input type="password" name="user_new_pwd" placeholder="Nueva Contraseña">
				</div>
				<label>Confirmar Nueva Contraseña</label>
				<div class="input-container">
					<input type="password" name="user_new_pwd_confirm" placeholder="Confirmar Nueva Contraseña">
				</div>
				<input type="submit" class="btn1" name="submit_user_info" value="GUARDAR CONTRASEÑA">
				<a class="link1 last" href="<?php echo Config::get('URL'); ?>profile/index">Regresar al perfil</a>
			</form>
		</div>
	</div>
</body>
</html>