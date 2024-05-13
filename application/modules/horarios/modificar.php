<?php

// Obtiene los parametros
$id_horario = (isset($_params[0])) ? $_params[0] : 0;

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene el horario
$horario = $db->from('ins_horarios')->where('id_horario', $id_horario)->fetch_first();

// Obtiene los consultorios
$consultorios = $db->query("SELECT * FROM ins_consultorios WHERE estado = 'A'")->fetch();

// Obtiene a los especialistas
//$especialistas = $db->select('p.id_persona, p.nombres, p.primer_apellido, p.segundo_apellido')->from('sys_users u')->where('u.estado', "A")->where('u.area_id','6')->join('sys_persona p', 'u.id_user = p.id_persona', 'left')->order_by('u.id_user', 'asc')->fetch();
$especialistas = $db->select('id_user, nombres, primer_apellido, segundo_apellido')->from('ins_usuarios')->where('estado', "A")->where('area_id','6')->fetch();

// Ejecuta un error 404 si no el horario
if (!$horario) { require_once not_found(); exit; }

$selec_esp='';
$selec_con='';
$selecd='';

// Obtiene los permisos
$permiso_listar = in_array('listar', $_views);
$permiso_crear = in_array('crear', $_views);
$permiso_ver = in_array('ver', $_views);
$permiso_eliminar = in_array('eliminar', $_views);
$permiso_imprimir = in_array('imprimir', $_views);

?>
<?php require_once show_template('header-design'); ?>
<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Horarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administración</a></li>
			  <li class="breadcrumb-item"><a href="#">Horarios</a></li>
              <li class="breadcrumb-item active">Modificar horario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<!-- ============================================================== --> 
<!-- end pageheader -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- row -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="text-label hidden-xs">Seleccione:</div> 
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                        <!-- Toggle Dropdown -->
                        <div class="margin">
                            <div class="btn-group">
                              <button type="button" class="btn btn-info btn-flat">Acciones</button>
                              <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <?php if ($permiso_crear) : ?> 
                                <a class="dropdown-item" href="?/horarios/crear">Crear horario</a>
                                <?php endif ?> 
								                <?php if ($permiso_listar) : ?> 
                                <a class="dropdown-item" href="?/horarios/listar">Listar horarios</a>
                                <?php endif ?>  
                              </div>
                            </div> 
                          </div>
                          <!-- /.Toggle Dropdown -->

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- datos --> 
            <!-- ============================================================== -->
            <div class="card-body">
	<div class="row">
	<div class="col-sm-2  col-md-2"></div>
		<div class="col-sm-8  col-md-8">
	<?php if ($permiso_listar || $permiso_crear || $permiso_ver || $permiso_eliminar || $permiso_imprimir) : ?>
<!-- 	<div class="row">
		<div class="col-xs-6">
			<div class="text-label hidden-xs">Seleccionar acción:</div>
			<div class="text-label visible-xs-block">Acciones:</div>
		</div>
		<div class="col-xs-6 text-right">
			<div class="btn-group">
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-menu-hamburger"></span>
					<span class="hidden-xs">Acciones</span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right">
					<li class="dropdown-header visible-xs-block">Seleccionar acción</li>
					<?php if ($permiso_listar) : ?>
					<li><a href="?/horarios/listar"><span class="glyphicon glyphicon-list-alt"></span> Listar roles</a></li>
					<?php endif ?>
					<?php if ($permiso_crear) : ?>
					<li><a href="?/horarios/crear"><span class="glyphicon glyphicon-plus"></span> Crear rol</a></li>
					<?php endif ?>
					<?php if ($permiso_ver) : ?>
					<li><a href="?/horarios/ver/<?= $id_especialidad; ?>"><span class="glyphicon glyphicon-search"></span> Ver rol</a></li>
					<?php endif ?>
					<?php if ($permiso_eliminar) : ?>
					<li><a href="?/horarios/eliminar/<?= $id_especialidad; ?>" data-eliminar="true"><span class="glyphicon glyphicon-trash"></span> Eliminar rol</a></li>
					<?php endif ?>
					<?php if ($permiso_imprimir) : ?>
					<li><a href="?/horarios/imprimir/<?= $id_especialidad; ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Imprimir rol</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
	<hr> -->
	<?php endif ?>

			<form method="post" id="modhra" action="?/horarios/guardar" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="<?= $csrf; ?>">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="horario" class="control-label">Nombre del horario:</label>
							<input type="text" value="<?= $horario['horario']; ?>" name="horario" id="horario" class="form-control" autofocus="autofocus" data-validation="required letternumber length" data-validation-allowing="-# " data-validation-length="max100">
							<input type="hidden" value="<?= $id_horario; ?>" name="id_horario" id="id_horario" class="translate" tabindex="-1" data-validation="required number" data-validation-error-msg="El campo no es válido">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Especialista</label>
							<select id="medico" name="medico" class="form-control">
							<?php foreach ($especialistas as $nro => $especialista) : ?>
								<?php if ($horario['user_id']==$especialista['id_user']) : $selec_esp="selected";?><?php endif ?>
									<option value="<?= $especialista['id_user']; ?>" <?php echo $selec_esp; $selec_esp=''; ?>><?= $especialista['nombres'].' '.$especialista['primer_apellido'].' '.$especialista['segundo_apellido']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Consultorios</label>
							<select id="consultorio" name="consultorio" class="form-control">
							<?php foreach ($consultorios as $nro => $consultorio) : ?>
								<?php if ($horario['consultorio_id']==$consultorio['id_consultorio']) : $selec_con="selected";?><?php endif ?>
									<option value="<?= $consultorio['id_consultorio']; ?>" <?php echo $selec_con; $selec_con=''; ?>><?= $consultorio['consultorio']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
                    <div class="col-4">
                        <div class="form-group">
							<!-- select dis de la semana -->
							<div class="form-group">
                                <label>Día</label>
                                <select id="dia" name="dia" class="form-control">
                                	<?php if ($horario['dia']=='Lunes') : $selecd="selected";?><?php endif ?>
                                    <option value="Lunes" <?php echo $selecd; $selecd='';?>>Lunes</option>
                                    <?php if ($horario['dia']=='Martes') : $selecd="selected";?><?php endif ?>
                                    <option value="Martes" <?php echo $selecd; $selecd=''; ?>>Martes</option>
                                    <?php if ($horario['dia']=='Miércoles') : $selecd="selected";?><?php endif ?>
                                    <option value="Miércoles" <?php echo $selecd; $selecd=''; ?>>Miércoles</option>
									<?php if ($horario['dia']=='Jueves') : $selecd="selected";?><?php endif ?>
                                    <option value="Jueves" <?php echo $selecd; $selecd=''; ?>>Jueves</option>
									<?php if ($horario['dia']=='Viernes') : $selecd="selected";?><?php endif ?>
                                    <option value="Viernes" <?php echo $selecd; $selecd=''; ?>>Viernes</option>
									<?php if ($horario['dia']=='Sábado') : $selecd="selected";?><?php endif ?>
                                    <option value="Sábado" <?php echo $selecd; $selecd=''; ?>>Sábado</option>
									<?php if ($horario['dia']=='Domingo') : $selecd="selected";?><?php endif ?>
                                    <option value="Domingo" <?php echo $selecd; $selecd=''; ?>>Domingo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="hra_ini" class="control-label">Hora inicio:</label>
                            <input type="time" value="<?= $horario['hora_ini']; ?>" name="hra_ini" id="hra_ini" class="form-control" autofocus="autofocus" data-validation="required time">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="hra_fin" class="control-label">Hora fin:</label>
                            <input type="time" value="<?= $horario['hora_fin']; ?>" name="hra_fin" id="hra_fin" class="form-control" autofocus="autofocus" data-validation="required time">
                        </div>
                    </div>
                </div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-disk"></span>
						<span>Guardar</span>
					</button>
					<button type="reset" class="btn btn-default">
						<span class="glyphicon glyphicon-refresh"></span>
						<span>Restablecer</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


</div>
<!-- /.content-wrapper -->
<?php require_once show_template('footer-basic'); ?>
<script>
	$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
$(function () {
  $.validator.setDefaults({
    
    submitHandler: function () {
      var datos = $("#modhra").serialize();
      $.ajax({
        type: 'POST',
        url: "?/horarios/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            bootbox.alert('OK : ' + resp.mensaje);
            location.href ='?/horarios/listar';
        },
        error: function(error){
            bootbox.alert('Error : ' + error.mensaje);
            //location.href ='?/usuarios/listar';
        }

      })
    }
  });
  $('#modhra').validate({
    rules: {
      horario: {
        required: true,
        minlength: 3,
        maxlength: 20
      },
      medico:{required: true },
      consultorio:{required: true },
      dia:{required: true },
      hra_ini:{
        required: true,
        time: true 
        },
      hra_fin:{
        required: true,
        time: true
        },
    },
    messages: {
     horario: {
        required: "Por favor, introduzca el nombre del horario",
        minlength: "Por favor, introduce almenos 3 letras",
        maxlength: "Por favor, introduce un nombre más corto"
      },
      medico: "Por favor introduce una breve descripción de la especialidad",
      consultorio: "Por favor introduce una breve descripción de la especialidad",
      dia: "Por favor introduce una breve descripción de la especialidad",
      hra_ini: {
        required: "Por favor, introduzca la hora de inicio",
        time: "Por favor, introduce dato de tipo númerico"
      },
      hra_fin: {
        required: "Por favor, introduzca la hora de finalización",
        time: "Por favor, introduce dato de tipo númerico"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</body>
</html>