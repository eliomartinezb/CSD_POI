<!DOCTYPE html>
<!-- <?php print_r($this) ?> -->
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
				<div class="title">MODIFICAR FORMULARIO</div>
				<form action="<?php echo Config::get('URL'); ?>form/updateForm" method="post">
					<?php $this->renderFeedbackMessages(); ?>
					<label>Tipo Formulario</label><br>
					<div class="radio-container">
						<input type="radio" name="form_type" value="1" <?php if ($this->form_info->form_type == 1) { echo 'checked'; } ?>> Solicitud<br>
						<input type="radio" name="form_type" value="2" <?php if ($this->form_info->form_type == 2) { echo 'checked'; } ?>> Prueba<br>
						<input type="radio" name="form_type" value="3" <?php if ($this->form_info->form_type == 3) { echo 'checked'; } ?>> Entrevista
					</div>
					<label>Carrera</label><br>
					<select name="career_id" style="margin-bottom: 20px;">
						<option value="" disabled>Seleccione una Carrera</option>
						<?php foreach ($this->career_list as $career) { ?>
						<option value="<?php echo $career->career_id; ?>" <?php if ($this->form_info->career_id == $career->career_id) { echo 'selected'; } ?>><?php echo $career->career_name; ?></option> 
						<?php } ?>
					</select><br>
					<input type="hidden" name="form_id" value="<?php echo $this->form_info->form_id; ?>">
					<input type="submit" class="btn1" name="submit_form_info" value="GUARDAR CAMBIOS">
<!--
					<?php if (!$this->career_info->user_deleted) { ?>
					<a class="btn2" href="<?php echo Config::get('URL') . 'career/deletecareer/' . $this->user_id; ?>">BORRAR FORMULARIO</a>
					<?php } ?>
-->
					<a class="link1 last" href="<?php echo Config::get('URL'); ?>form">Regresar Formularios</a>
				</form>
			</div>
		</div>
	</body>
</html>	