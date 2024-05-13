<?php

// Obtiene los parametros
$id_patologia = (isset($_params[0])) ? $_params[0] : 0;

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene el rol
$patologia = $db->from('ins_patologia')->where('id_patologia', $id_patologia)->fetch_first();

// Ejecuta un error 404 si no existe la patologia
if (!$patologia) { require_once not_found(); exit; }

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
            <h1>Patologías</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administración</a></li>
			  <li class="breadcrumb-item"><a href="#">Patologías</a></li>
              <li class="breadcrumb-item active">Modificar patología</li>
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
                                <a class="dropdown-item" href="?/patologias/crear">Crear patologías</a>
                                <?php endif ?> 
								                <?php if ($permiso_listar) : ?> 
                                <a class="dropdown-item" href="?/patologias/listar">Listar patologías</a>
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
					<li><a href="?/roles/listar"><span class="glyphicon glyphicon-list-alt"></span> Listar roles</a></li>
					<?php endif ?>
					<?php if ($permiso_crear) : ?>
					<li><a href="?/roles/crear"><span class="glyphicon glyphicon-plus"></span> Crear rol</a></li>
					<?php endif ?>
					<?php if ($permiso_ver) : ?>
					<li><a href="?/roles/ver/<?= $id_patologia; ?>"><span class="glyphicon glyphicon-search"></span> Ver rol</a></li>
					<?php endif ?>
					<?php if ($permiso_eliminar) : ?>
					<li><a href="?/roles/eliminar/<?= $id_patologia; ?>" data-eliminar="true"><span class="glyphicon glyphicon-trash"></span> Eliminar rol</a></li>
					<?php endif ?>
					<?php if ($permiso_imprimir) : ?>
					<li><a href="?/roles/imprimir/<?= $id_patologia; ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Imprimir rol</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
	<hr> -->
	<?php endif ?>

			<form method="post" action="?/patologias/guardar" id="modpat" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="<?= $csrf; ?>">
				<div class="form-group">
					<label for="rol" class="control-label">Patologías:</label>
					<input type="text" value="<?= $patologia['patologia']; ?>" name="patologia" id="patologia" class="form-control" autofocus="autofocus" data-validation="required letternumber length" data-validation-allowing="-# " data-validation-length="max100">
					<input type="hidden" value="<?= $id_patologia; ?>" name="id_patologia" id="id_patologia" class="translate" tabindex="-1" data-validation="required number" data-validation-error-msg="El campo no es válido">
				</div>
				<div class="form-group">
					<label for="descripcion" class="control-label">Descripción:</label>
					<textarea name="descripcion" id="descripcion" class="form-control" data-validation="letternumber" data-validation-allowing="-.,:;()\n " data-validation-optional="true"><?= escape($patologia['descripcion']); ?></textarea>
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
      var datos = $("#modpat").serialize();
      $.ajax({
        type: 'POST',
        url: "?/patologias/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            bootbox.alert('OK : ' + resp.mensaje);
            location.href ='?/patologias/listar';
        },
        error: function(error){
            bootbox.alert('Error : ' + error.mensaje);
            //location.href ='?/usuarios/listar';
        }

      })
    }
  });
  $('#modpat').validate({
    rules: {
      patologia: {
        required: true,
        minlength: 3,
        maxlength: 25
      },
      descripcion:{required: true },
    },
    messages: {
     patologia: {
        required: "Por favor, introduzca el nombre de la patología",
        minlength: "Por favor, introduce almenos 3 letras",
        maxlength: "Por favor, introduce un nombre más corto"
      },
      descripcion: "Por favor, introduce una breve descripción",
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