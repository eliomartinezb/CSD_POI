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
	<?php $this->render('templates/header', array('menu_selected' => 'dashboard')); ?>
	<div class="main">
		<div class="panel full">
			<?php $this->renderFeedbackMessages(); ?>
		</div>
	</div>
</body>
</html>