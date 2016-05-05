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
			<div class="panel full">
				<div class="title">USUARIOS</div>
				<a class="btn1" href="<?php echo Config::get('URL'); ?>users/createnewuser">NUEVO USUARIO</a>
			</div>
		</div>
	</body>
</html>	