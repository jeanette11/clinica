<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los permisos
$permiso_listar = in_array('listar', $_views);
// Obtiene los perfiles
$perfiles = $db->query("SELECT * FROM ins_perfil WHERE estado = 'A'")->fetch();
// Obtiene los areas
$areas = $db->query("SELECT * FROM ins_area WHERE estado = 'A'")->fetch();
// Obtiene los roles
$roles = $db->query("SELECT * FROM ins_roles WHERE estado = 'A'")->fetch();

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
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administración</a></li>
			  <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Crear Usuario</li>
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
                <h3 class="card-title">Crear usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?/usuarios/guardar" id="crearuser" enctype="multipart/form-data">
              <input type="hidden" name="<?= $csrf; ?>">
                <div class="card-body">

                  <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
                        </div>
                    </div>
                    <div class="col-3">
                            <div class="form-group">
                                <label>Género</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="F">
                                <label class="form-check-label">Femenino</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="M">
                                <label class="form-check-label">Masculino</label>
                                </div>
                            </div>
                    </div>
                  </div>
                  
                  <div class="row">
                        <div class="col-6"><label>Ap. Paterno</label>
                            <input type="text" id="paterno" name="paterno" class="form-control" placeholder="Paterno">
                        </div>
                        <div class="col-6"><label>Ap. Materno</label>
                            <input type="text" id="materno" name="materno" class="form-control" placeholder="Materno">
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
                                    <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                </div>
                                <!-- /.input group -->
                                </div>
                        </div>
                        <div class="col-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Lugar de Nacimiento</label>
                                <select id="lugar_nac" name="lugar_nac" class="form-control">
                                <option value="">-- Seleccionar --</option>
                                <option value="Beni">Beni</option>
                                <option value="Chuquisaca">Chuquisaca</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Oruro">Oruro</option>
                                <option value="Pando">Pando</option>
                                <option value="Potosi">Potosi</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Tarija">Tarija</option>
                                <option value="Extranjero">Extranjero</option>
                                </select>
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label>Nro. Documento</label>
                                <input type="text" class="form-control" id="nrodocumento" name="nrodocumento" placeholder="Nro. de documento">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="col-4">
                                  <!-- select -->
                                  <div class="form-group">
                                      <label>Tipo de documento</label>
                                      <select id="tipodoc" name="tipodoc" class="form-control">
                                      <option value="">-- Seleccionar --</option>
                                      <option value="Carnet de identidad">Carnet de identidad</option>
                                      <option value="Licencia de conducir">Licencia de conducir</option>
                                      <option value="Pasaporte">Pasaporte</option>
                                      </select>
                                  </div>
                        </div>
                   </div>
                  <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección de domicilio">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Nro. celular">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cel. Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Nro. celular contacto">
                            </div>
                        </div>
                        <!--div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Fotografía</label>
                                <div class="custom-file">
                                  <input type="file" name="fotografia" id="fotografia_subir" class="custom-file-input">
                                  <label class="custom-file-label" for="customFile">Cargar foto</label>
                                </div>
                            </div>
                        </div-->
                  </div>
                  <div class="row">
                    <div class="col-4">
                        <!-- select area -->
                        <div class="form-group">
                              <label>Área</label>
                              <select id="area" name="area" class="form-control">
                              <option value="">-- Seleccionar --</option>
                              <?php foreach ($areas as $nro => $area) : ?>
                                <option value="<?= $area['id_area']; ?>"><?= $area['area']; ?></option>
                              <?php endforeach ?>
                              </select>
                          </div>
                    </div>
                    <div class="col-4">
                          <!-- select perfil -->
                          <div class="form-group">
                              <label>Perfil</label>
                              <select id="perfil" name="perfil" class="form-control">
                              <option value="">-- Seleccionar --</option>
                              <?php foreach ($perfiles as $nro => $perfil) : ?>
                                <option value="<?= $perfil['id_perfil']; ?>"><?= $perfil['perfil']; ?></option>
                              <?php endforeach ?>
                              </select>
                            </div>
                    </div>
                    <div class="col-4">
                          <!-- select rol -->
                          <div class="form-group">
                                  <label>Rol</label>
                                  <select id="rol" name="rol" class="form-control">
                                  <option value="">-- Seleccionar --</option>
                                  <?php foreach ($roles as $nro => $rol) : ?>
                                    <option value="<?= $rol['id_rol']; ?>"><?= $rol['rol']; ?></option>
                                  <?php endforeach ?>
                                  </select>
                            </div>

                    </div>
                  </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
      var datos = $("#crearuser").serialize();
      $.ajax({
        type: 'POST',
        url: "?/usuarios/guardar",
        dataType: 'JSON',
        data: datos,
        success: function(resp){
            bootbox.alert('Error : ' + resp.mensaje);
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
  $('#crearuser').validate({
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