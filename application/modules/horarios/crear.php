<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los permisos
$permiso_listar = in_array('listar', $_views);

// Obtiene a los especialistas
//$especialistas = $db->select('u.id_user, p.nombres, p.primer_apellido, p.segundo_apellido')->from('sys_users u')->where('u.estado', "A")->where('u.area_id','6')->join('sys_persona p', 'u.id_user = p.id_persona', 'left')->fetch();
$especialistas = $db->select('id_user, nombres,primer_apellido, segundo_apellido')->from('ins_usuarios')->where('estado', "A")->where('area_id','6')->fetch();

// Obtiene las consultorios
$consultorios = $db->query("SELECT * FROM ins_consultorios WHERE estado = 'A'")->fetch();

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
              <li class="breadcrumb-item active">Crear Horarios</li>
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
                        <form method="post" id="crearhra" action="?/horarios/guardar" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="<?= $csrf; ?>">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="horario" class="control-label">Nombre de horario:</label>
                                        <input type="text" value="" name="horario" id="horario" class="form-control" autofocus="autofocus" data-validation="required letternumber length" data-validation-allowing="-# " data-validation-length="max100">
                                    </div>
                                </div> 
                                <div class="col-4">
                                    <!-- select especialidades-->
                                    <div class="form-group">
                                            <label>Especialista</label>
                                            <select id="medico" name="medico" class="form-control">
                                                <option value="">-- Seleccione --</option>
                                                <?php foreach ($especialistas as $nro => $especialista) : ?>
                                                <option value="<?= $especialista['id_user']; ?>"><?= $especialista['nombres'].' '.$especialista['primer_apellido']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                    </div>
                            
                                </div> 
                                <div class="col-4">
                                    <!-- select especialidades-->
                                    <div class="form-group">
                                            <label>Consultorio</label>
                                            <select id="consultorio" name="consultorio" class="form-control">
                                            <option value="">-- Seleccione --</option>
                                            <?php foreach ($consultorios as $nro => $consultorio) : ?>
                                            <option value="<?= $consultorio['id_consultorio']; ?>"><?= $consultorio['consultorio']; ?></option>
                                            <?php endforeach ?>
                                            </select>
                                    </div>
                            
                                </div> 
                            </div>
                            
                                
                            <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <!-- select dia de la semana-->
                                                <label>Día</label>
                                                <select id="dia" name="dia" class="form-control">
                                                <option value="">-- Seleccione --</option>
                                                <option value="Lunes">Lunes</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miércoles">Miércoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sábado">Sábado</option>
                                                <option value="Viernes">Domingo</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="hra_ini" class="control-label">Hora inicio:</label>
                                            <input type="time" value="" name="hra_ini" id="hra_ini" class="form-control" autofocus="autofocus" data-validation="required time">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="hra_fin" class="control-label">Hora fin:</label>
                                            <input type="time" value="" name="hra_fin" id="hra_fin" class="form-control" autofocus="autofocus" data-validation="required time">
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
      var datos = $("#crearhra").serialize();
      $.ajax({
        type: 'POST',
        url: "?/horarios/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            if(resp == 'ok'){
                bootbox.alert('OK : ' + resp.mensaje);
                location.href ='?/horarios/listar';
            }else{
                bootbox.alert('Error : ' + resp.mensaje);
                //location.href ='?/horarios/crear';
            }
            
        },
        error: function(error){
            bootbox.alert('Errorrrrrr : no se puede crear el horario ');
            //location.href ='?/usuarios/listar';
        }

      })
    }
  });
  $('#crearhra').validate({
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
