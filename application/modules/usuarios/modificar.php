<?php 
// Obtiene los parametros
$id_usuario = (isset($_params[0])) ? $_params[0] : 0;

// Obtiene la cadena csrf
$csrf = set_csrf();
// Obtiene datos del usuario
$users = $db->from('ins_usuarios')->where('id_user', $id_usuario)->fetch_first();

// Ejecuta un error 404 si no existe el usuario y la persona
if (!$users) { require_once not_found(); exit; }

// Obtiene los permisos
$permiso_listar = in_array('listar', $_views);
$permiso_crear = in_array('crear', $_views);
$permiso_ver = in_array('ver', $_views);
$permiso_eliminar = in_array('eliminar', $_views);
$permiso_imprimir = in_array('imprimir', $_views);

// Obtiene los perfiles
$perfiles = $db->query("SELECT * FROM ins_perfil WHERE estado = 'A'")->fetch();
// Obtiene los areas
$areas = $db->query("SELECT * FROM ins_area WHERE estado = 'A'")->fetch();
// Obtiene los roles
$roles = $db->query("SELECT * FROM ins_roles WHERE estado = 'A'")->fetch();

$cheked='';
$selec='';
$selecd='';
$selec_area='';
$selec_per='';
$selec_rol='';

?>
<?php require_once show_template('header-design'); ?>
<!-- daterange picker -->
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
            <h1>Modificar Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administración</a></li>
			  <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Modificar Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
<!-- ============================================================== --> 
<!-- end pageheader -->
<!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <div class="text-label hidden-xs">Seleccione:</div> 
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 text-right">
                          <!-- Toggle Dropdown -->
                          <div class="margin">
                            <div class="btn-group">
                              <button type="button" class="btn btn-info btn-flat">Acciones</button>
                              <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <?php if ($permiso_crear) : ?> 
                                <a class="dropdown-item" href="?/usuarios/crear">Crear usuarios</a>
                                <?php endif ?>  
                                <?php if ($permiso_listar) : ?> 
                                <a class="dropdown-item" href="?/usuarios/listar">Listar usuarios</a>
                                <?php endif ?>  
                              </div>
                            </div> 
                          </div>
                          <!-- /.Toggle Dropdown -->
                    </div>
                </div>
<!-- ============================================================== -->
<!-- row -->
<!-- ============================================================== -->
<div class="row">
        <div class="col-md-3">
        </div>
        <!-- ============================================================== -->
        <div class="col-md-6">
            <!-- ======================================================= -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modificar datos usuario</h3>
              </div>
              <!-- /.card-header -->    
              <!-- form start -->
              <form method="post" action="?/usuarios/guardar" id="moduser" enctype="multipart/form-data">
              <input type="hidden" value="<?= $id_usuario; ?>" name="id_persona" id="id_persona" class="translate" tabindex="-1" data-validation="required number" data-validation-error-msg="El campo no es válido">
              <input type="hidden" name="<?= $csrf; ?>">
                <div class="card-body">

                  <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" value="<?= $users['nombres']; ?>" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
                        </div>
                    </div>
                    <div class="col-3">
                            <div class="form-group">
                                <label>Género</label>
                                <?php if ($users['genero']=='F') : $cheked="checked";?><?php endif ?>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="F" <?php echo $cheked; $cheked=''; ?>>
                                <label class="form-check-label">Femenino</label>
                                </div>
                                <?php if ($users['genero']=='M') : $cheked="checked";?><?php endif ?>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="M" <?php echo $cheked; ?>>
                                <label class="form-check-label">Masculino</label>
                                </div>
                            </div>
                    </div>
                  </div>
                  
                  <div class="row">
                        <div class="col-6"><label>Ap. Paterno</label>
                            <input type="text" value="<?= $users['primer_apellido']; ?>" id="paterno" name="paterno" class="form-control" placeholder="Paterno">
                        </div>
                        <div class="col-6"><label>Ap. Materno</label>
                            <input type="text" value="<?= $users['segundo_apellido']; ?>" id="materno" name="materno" class="form-control" placeholder="Materno">
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-6">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                <label>Fecha de nacimiento</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <!--input type="date" value="<?= date("d-m-Y", strtotime($users['fecha_nac'])); ?>" id="fecha_nac" name="fecha_nac" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask-->
                                    <input type="date" value="<?= $users['fecha_nac']; ?>" id="fecha_nac" name="fecha_nac" class="form-control" >
                                </div>
                                <!-- /.input group -->
                                </div>
                        </div>
                        <div class="col-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Lugar de Nacimiento</label>
                                <select id="lugar_nac" name="lugar_nac" class="form-control">
                                <?php if ($users['lugar_nac']=='Beni') : $selec="selected";?><?php endif ?>
                                <option value="Beni" <?php echo $selec; $selec='';?>>Beni</option>
                                <?php if ($users['lugar_nac']=='Chuquisaca') : $selec="selected";?><?php endif ?>
                                <option value="Chuquisaca" <?php echo $selec; $selec=''; ?>>Chuquisaca</option>
                                <?php if ($users['lugar_nac']=='Cochabamba') : $selec="selected";?><?php endif ?>
                                <option value="Cochabamba" <?php echo $selec; $selec=''; ?>>Cochabamba</option>
                                <?php if ($users['lugar_nac']=='La Paz') : $selec="selected";?><?php endif ?>
                                <option value="La Paz" <?php echo $selec; $selec=''; ?>>La Paz</option>
                                <?php if ($users['lugar_nac']=='Oruro') : $selec="selected";?><?php endif ?>
                                <option value="Oruro" <?php echo $selec; $selec='';?>>Oruro</option>
                                <?php if ($users['lugar_nac']=='Pando') : $selec="selected";?><?php endif ?>
                                <option value="Pando" <?php echo $selec; $selec=''; ?>>Pando</option>
                                <?php if ($users['lugar_nac']=='Potosi') : $selec="selected";?><?php endif ?>
                                <option value="Potosi" <?php echo $selec; $selec='';?>>Potosi</option>
                                <?php if ($users['lugar_nac']=='Santa Cruz') : $selec="selected";?><?php endif ?>
                                <option value="Santa Cruz" <?php echo $selec; $selec=''; ?>>Santa Cruz</option>
                                <?php if ($users['lugar_nac']=='Tarija') : $selec="selected";?><?php endif ?>
                                <option value="Tarija" <?php echo $selec; $selec='';?>>Tarija</option>
                                <?php if ($users['lugar_nac']=='Extranjero') : $selec="selected";?><?php endif ?>
                                <option value="Extranjero" <?php echo $selec; $selec='';?>>Extranjero</option>
                                </select>
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label>Nro. Documento</label>
                                <input type="text" value="<?= $users['numero_documento']; ?>" class="form-control" id="nrodocumento" name="nrodocumento" placeholder="Nro. de documento">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" value="<?= $users['complemento']; ?>" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="col-4">
                                  <!-- select -->
                                  <div class="form-group">
                                      <label>Tipo de documento</label>
                                      <select id="tipodoc" name="tipodoc" class="form-control">
                                      <?php if ($users['tipo_doc']=='Carnet de identidad') : $selecd="selected";?><?php endif ?>
                                      <option value="Carnet de identidad" <?php echo $selecd; $selecd='';?>>Carnet de identidad</option>
                                      <?php if ($users['tipo_doc']=='Licencia de conducir') : $selecd="selected";?><?php endif ?>
                                      <option value="Licencia de conducir" <?php echo $selecd; $selecd=''; ?>>Licencia de conducir</option>
                                      <?php if ($users['tipo_doc']=='Pasaporte') : $selecd="selected";?><?php endif ?>
                                      <option value="Pasaporte" <?php echo $selecd; $selecd=''; ?>>Pasaporte</option>
                                      </select>
                                  </div>
                        </div>
                   </div>
                  <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" value="<?= $users['direccion']; ?>" class="form-control" id="direccion" name="direccion" placeholder="Dirección de domicilio">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="<?= $users['email']; ?>" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" value="<?= $users['celular']; ?>" class="form-control" id="celular" name="celular" placeholder="Nro. celular">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cel. Contacto</label>
                                <input type="text" value="<?= $users['contacto']; ?>" class="form-control" id="contacto" name="contacto" placeholder="Nro. celular contacto">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Fotografía</label>
                                <label for="exampleInputFile">Fotografía</label>
                                <div class="custom-file">
                                  <input type="file" name="fotografia" id="fotografia_subir" class="custom-file-input">
                                  <label class="custom-file-label" for="customFile">Cargar foto</label>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                        <!-- select area -->
                        <div class="form-group">
                              <label>Área</label>
                              <select id="area" name="area" class="form-control">
                              <?php foreach ($areas as $nro => $area) : ?>
                                <?php if ($users['area_id']==$area['id_area']) : $selec_area="selected";?><?php endif ?>
                                <option value="<?= $area['id_area']; ?>" <?php echo $selec_area; $selec_area=''; ?>><?= $area['area']; ?></option>
                              <?php endforeach ?>
                              </select>
                          </div>
                    </div>
                    <div class="col-4">
                          <!-- select perfil -->
                          <div class="form-group">
                              <label>Perfil</label>
                              <select id="perfil" name="perfil" class="form-control">
                              <?php foreach ($perfiles as $nro => $perfil) : ?>
                                <?php if ($users['perfil_id']==$perfil['id_perfil']) : $selec_per="selected";?><?php endif ?>
                                <option value="<?= $perfil['id_perfil']; ?>" <?php echo $selec_per; $selec_per=''; ?>><?= $perfil['perfil']; ?></option>
                              <?php endforeach ?>
                              </select>
                            </div>
                    </div>
                    <div class="col-4">
                          <!-- select rol -->
                          <div class="form-group">
                                  <label>Rol</label>
                                  <select id="rol" name="rol" class="form-control">
                                  <?php foreach ($roles as $nro => $rol) : ?>
                                    <?php if ($users['rol_id']==$rol['id_rol']) : $selec_rol="selected";?><?php endif ?>
                                    <option value="<?= $rol['id_rol']; ?>" <?php echo $selec_rol; $selec_rol='';?>><?= $rol['rol']; ?></option>
                                  <?php endforeach ?>
                                  </select>
                            </div>

                    </div>
                  </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modificar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- ======================================================= -->
        </div>
        <!-- ============================================================== -->
        <div class="col-md-3">
        <div class="row">
          
        </div>
        </div>
</div>          
<!-- ============================================================== -->
<!-- end row -->
<!-- ============================================================== -->

</div>
<!-- /.content-wrapper -->

<?php require_once show_template('footer-basic'); ?>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })

  $(function () {
  bsCustomFileInput.init();
});
</script>

<script>
$(function () {
  $.validator.setDefaults({
    
    submitHandler: function () {
      var datos = $("#moduser").serialize();
      $.ajax({
        type: 'POST',
        url: "?/usuarios/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            bootbox.alert('OK : ' + resp.mensaje);
            location.href ='?/usuarios/listar';
        },
        error: function(error){
            alert("Error al crear usuario");
            bootbox.alert('Error : ' + error.mensaje);
            //location.href ='?/usuarios/listar';
        }

      })
    }
  });
  $('#moduser').validate({
    rules: {
      nombre: {required: true },
      genero:{required: true },
      paterno: {required: true},
      materno: {required: true},
      fecha_nac: {
        required: true,
        date: true,
      },
      lugar_nac: { required: true },
      nrodocumento: {
        required: true,
        number: true,
      },
      tipodoc: { required: true },
      email: {
        required: true,
        email: true,
      },
      celular: {
        required: true,
        number: true,
        minlength: 8,
        maxlength: 8
      },
      contacto: {
        number: true,
        minlength: 8,
        maxlength: 8
      },
      area: {required: true },
      perfil: {required: true},
      rol: {required: true},
    },
    messages: {
      nombre: {required: "Por favor, introduzca nombre" },
      genero: "Por favor selecciones un género",
      paterno: {required: "Por favor, introduzca apellido paterno"},
      materno: {required: "Por favor, introduzca apellido materno" },
      fecha_nac: {
        required: "Por favor, introduzca fecha de nacimiento",
        date: "Debe ingresar una fecha valida"
      },
      lugar_nac: {
        required: "Por favor, seleccione lugar de nacimiento"
      },
      nrodocumento: {
        required: "Por favor, introduzca número de documento",
        number: "Por favor, el número de documento deber ser de tipo númerico"
      },
      lugar_nac: {
        required: "Por favor, selecciones tipo de documento"
      },
      email: {
        required: "Por favor, introduzca una dirección de correo electrónico",
        email: "Por favor, introduce una dirección de correo electrónico válida"
      },
      celular: {
        required: "Por favor, introduzca número de celular",
        number: "Debe introducir solo números",
        minlength: "Por favor, introduce un número de celular válido",
        maxlength: "Por favor, introduce un número de celular válido"
      },
      contacto: {
        number: "Debe introducir solo números",
        minlength: "Por favor, introduce un número de celular válido",
        maxlength: "Por favor, introduce un número de celular válido"
      },
      area: {required: "Por favor, seleccione el área al que pertenece el usuario"},
      perfil: {required: "Por favor, seleccione el perfil profesional del usuario"},
      rol: {required: "Por favor, seleccione el rol que ocupa el usuario"},
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