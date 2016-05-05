<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get('URL'); ?>css/admin.css">
		<script src="<?php echo Config::get('URL'); ?>js/jquery.js"></script>
		<script src="<?php echo Config::get('URL'); ?>js/datatables.min.js"></script>
		<script src="<?php echo Config::get('URL'); ?>js/admin.js"></script>
	</head>
	<body>
		<?php $this->render('templates/header', array('menu_selected' => 'forms')); ?>
		<div class="main">
			<div class="panel full">
				<?php $this->renderFeedbackMessages(); ?>
				<div class="title">FORMULARIOS</div>
				<div class="table-container">
					<table id="data-table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Tipo Formulario</th>
								<th>Fecha Creación</th>
								<th>Fecha Modificación</th>
								<th>Versión</th>
								<th>Carrera</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->form_list as $form) { ?>
							<tr>
								<td><a><?php echo $form->form_name; ?></a></td>
								<td>
									<a>
										<?php 
											if ($form->form_type == 1) {
												echo "Solicitud";
											} elseif ($form->form_type == 2) {
												echo "Prueba";
											} else {
												echo "Entrevista";
											}
										?>
									</a>
								</td>
								<td><a><?php echo date('d/m/y', $form->form_creation_timestamp); ?></a></td>
								<td><a><?php echo date('d/m/y', $form->form_modification_timestamp); ?></a></td>
								<td><a><?php echo $form->form_version; ?></a></td>
								<td><a><?php echo $form->career_name; ?></a></td>
								<td>
									<?php if ($form->career_status == 1) { ?>
									<a class="act-btn" href="<?php echo Config::get('URL') . 'form/modifyform/' . $form->form_id; ?>"><i class="icon-edit"></i></a>
									<?php } else { ?>
									<a class="act-btn show-msg" href="#"><i class="icon-edit"></i></a>
									<?php } ?>	
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>	