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
		<?php $this->render('templates/header', array('menu_selected' => 'forms')); ?>
		<div class="main">
			<div class="panel small">
				<div class="title">NUEVO FORUMULARIO</div>
				<form action="<?php echo Config::get('URL'); ?>form/saveNewForm" method="post">
					<?php $this->renderFeedbackMessages(); ?>
					<label>Tipo Formulario</label><br>
					<div class="radio-container">
						<input type="radio" name="form_type" value="1" checked> Solicitud<br>
						<input type="radio" name="form_type" value="2"> Prueba<br>
						<input type="radio" name="form_type" value="3"> Entrevista
					</div>
					<label>Carrera</label><br>
					<select name="career_id" style="margin-bottom: 20px;">
						<option value="" disabled selected>Seleccione una Carrera</option>
						<?php foreach ($this->career_list as $career) { ?>
						<option value="<?php echo $career->career_id; ?>"><?php echo $career->career_name; ?></option> 
						<?php } ?>
					</select><br>
					<?php foreach ($this->career_list as $career) { ?>
					<input type="hidden" value="<?php echo $career->career_name; ?>" name="<?php echo 'career_' . $career->career_id; ?>">
					<?php } ?>
					<input type="submit" class="btn1" name="submit_form_info" value="CREAR FORMULARIO">
					<a class="link1 last" href="<?php echo Config::get('URL'); ?>form">Regresar Formularios</a>
				</form>
			</div>
		</div>
	</body>
</html>	