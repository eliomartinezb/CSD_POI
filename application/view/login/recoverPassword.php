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
		<form action="<?php echo Config::get('URL'); ?>login/passwordreset" method="post">
			<?php $this->renderFeedbackMessages(); ?>
			<div class="input-container">
				<span class="icon-mail"></span>
				<input class="has-icon" type="text" name="user_email" placeholder="Correo Electrónico">
			</div>
			<input class ="btn1" type="submit" name="submit_recover" value="ENVIAR CORREO">
			<a class="link1 last" href="<?php echo Config::get('URL'); ?>login/index">Regresar</a>
		</form>
	</div>
</body>
</html>