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
			<form action="<?php echo Config::get('URL'); ?>profile/saveUserInfo" method="post">
				<div class="title">PERFIL</div>
				<?php $this->renderFeedbackMessages(); ?>
				<label>Nombre</label>
				<div class="input-container">
					<input type="text" name="user_name" value="<?php echo Session::get('user_name'); ?>" placeholder="Nombre">
				</div>
				<label>Correo Electrónico</label>
				<div class="input-container">
					<input type="text" name="user_email" value="<?php echo Session::get('user_email'); ?>" placeholder="Correo Electrónico">
				</div>
				<input type="submit" class="btn1" name="submit_user_info" value="GUARDAR CAMBIOS">
				<a class="btn2 last" href="<?php echo Config::get('URL'); ?>profile/changePassword">CAMBIAR CONTRASEÑA</a>
			</form>
		</div>
	</div>
</body>
</html>