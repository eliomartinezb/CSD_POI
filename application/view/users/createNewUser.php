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
		<?php $this->render('templates/header', array('menu_selected' => 'users')); ?>
		<div class="main">
			<div class="panel small">
				<div class="title">NUEVO USUARIO</div>
				<form action="<?php echo Config::get('URL'); ?>users/saveNewUser" method="post">
					<?php $this->renderFeedbackMessages(); ?>
					<label>Nombre</label>
					<div class="input-container">
						<input type="text" name="user_name" value="<?php echo $this->user_name; ?>" placeholder="Nombre">
					</div>
					<label>Correo Electrónico</label>
					<div class="input-container">
						<input type="text" name="user_email" value="<?php echo $this->user_email; ?>" placeholder="Correo Electrónico">
					</div>
					<input type="submit" class="btn1" name="submit_user_info" value="CREAR USUARIO">
					<a class="link1 last" href="<?php echo Config::get('URL'); ?>users">Regresar Usuarios</a>
				</form>
			</div>
		</div>
	</body>
</html>	