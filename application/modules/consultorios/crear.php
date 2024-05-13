<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los permisos
$permiso_listar = in_array('listar', $_views);

// Obtiene las especialidades
$especialidades = $db->query("SELECT * FROM ins_especialidades WHERE estado = 'A'")->fetch();

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
            <h1>Consultorios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administración</a></li>
			  <li class="breadcrumb-item"><a href="#">Consultorios</a></li>
              <li class="breadcrumb-item active">Crear Consultorio</li>
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
                                <?php if ($permiso_listar) : ?> 
                                <a class="dropdown-item" href="?/consultorios/listar">Listar consultorios</a>
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
                        <form method="post" id="crearcons" action="?/consultorios/guardar" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="<?= $csrf; ?>">
                            <div class="form-group">
                                <label for="consultorio" class="control-label">Nombre consultorio:</label>
                                <input type="text" value="" name="consultorio" id="condultorio" class="form-control" autofocus="autofocus" data-validation="required letternumber length" data-validation-allowing="-# " data-validation-length="max100">
                            </div>
                            <!-- select especialidades-->
                            <div class="form-group">
                                <label>Especialidades</label>
                                <select id="especialidad" name="especialidad" class="form-control">
                                    <option value="0">-- Seleccionar --</option>
                                    <?php foreach ($especialidades as $nro => $especialidad) : ?>
                                        <option value="<?= $especialidad['id_especialidad']; ?>"><?= $especialidad['especialidad']; ?></option>
                                    <?php endforeach ?>
                                </select>
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
    </div>
</div>
                                   
   
</div>
<!-- /.content-wrapper -->
<?php require_once show_template('footer-basic'); ?>
<script>
$(function () {
  $.validator.setDefaults({
    
    submitHandler: function () {
      var datos = $("#crearcons").serialize();
      $.ajax({
        type: 'POST',
        url: "?/consultorios/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            bootbox.alert('Error : ' + resp.mensaje);
            location.href ='?/consultorios/listar';
        },
        error: function(error){
            bootbox.alert('Error : ' + error.mensaje);
            //location.href ='?/usuarios/listar';
        }

      })
    }
  });
  $('#crearcons').validate({
    rules: {
      consultorio: {
        required: true,
        minlength: 3,
        maxlength: 30
      },
      especialidad:{required: true },
    },
    messages: {
     consultorio: {
        required: "Por favor, introduzca el nombre del consultorio",
        minlength: "Por favor, introduce almenos 3 letras",
        maxlength: "Por favor, introduce un nombre más corto"
      },
      especialidad: "Por favor selecciona una especialidad",
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
