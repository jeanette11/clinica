<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene a las personas
//$personas_user = $db->query("SELECT * FROM sys_persona WHERE estado = 'A'")->fetch();

// Obtiene los usuarios
$usuarios = $db->query("SELECT * FROM ins_usuarios WHERE estado = 'A'")->fetch();

// Obtiene los permisos
//print_f($_views);
$permiso_crear = in_array('crear', $_views);
$permiso_ver = in_array('ver', $_views);
$permiso_modificar = in_array('modificar', $_views);
$permiso_eliminar = in_array('eliminar', $_views);
$permiso_imprimir = in_array('imprimir', $_views);
//print_r($_views);
?>
<?php require_once show_template('header-design'); ?>


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
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<!-- ============================================================== -->
<div class="card">
              <div class="card-header">
                    <!-- ----------------------------------------- -->
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
                                <a class="dropdown-item" href="?/usuarios/crear">Crear usuarios</a>
                                <?php endif ?>  
                                <?php if ($permiso_imprimir) : ?> 
                                <a class="dropdown-item" href="?/usuarios/imprimir">Imprimir usuarios</a>
                                <?php endif ?>  
                              </div>
                            </div> 
                          </div>
                          <!-- /.Toggle Dropdown -->
                      </div>
                    </div>
                    <!-- ----------------------------------------- -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if ($message = get_notification()) : ?>
                <div class="alert alert-<?= $message['type']; ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?= $message['title']; ?></strong>
                  <p><?= $message['content']; ?></p>
                </div>
                <?php endif ?>
                <?php if ($usuarios) : ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Area</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php foreach ($usuarios as $nro => $usuario) : ?>
                    <?php 
                      //$persona = array();
                      //$persona = $db->select("nombres, primer_apellido")->from('sys_persona')->where(array('id_persona'=>$usuario['id_user']))->fetch_first();
                      $nom_area=$db->select("area")->from('ins_area')->where(array('id_area'=>$usuario['area_id']))->fetch_first();
                      $nom_rol=$db->select("rol")->from('ins_roles')->where(array('id_rol'=>$usuario['rol_id']))->fetch_first();
                      ?>
                  <tr>
                    <td class="text-nowrap"><?= escape($usuario['nombres']);?></td>
                    <td class="text-nowrap"><?= escape($usuario['primer_apellido']);?></td>
                    <td class="text-nowrap"><?= escape($nom_area['area']);?></td>
                    <td class="text-nowrap"><?= escape($nom_rol['rol']);?></td>
                    <?php if ($permiso_modificar || $permiso_eliminar) : ?>
                    <td>
                      <?php if($permiso_eliminar): ?>
                        <a href="?/usuarios/eliminar/<?= $usuario['id_user']; ?>" data-toggle="tooltip" data-title="Eliminar usuario" data-eliminar="true" class="btn btn-danger btn-sm"><span class="icon-trash">Eliminar</span></a>
                        <!--button type="button" class="btn btn-danger btn-xs" href="?/usuarios/eliminar/<?= $persona['id_user']; ?>" data-eliminar="true" >Eliminar</button-->
                      <?php endif ?>
                      <?php if($permiso_modificar): ?>
                        <a href="?/usuarios/modificar/<?= $usuario['id_user']; ?>" data-toggle="tooltip" data-target="Modifica usuario"  data-title="Modificar usuario" style="color:white" class="btn btn-warning btn-sm"><span class="icon-note">Modificar</span></a>
                        <!--button type="button" class="btn btn-warning btn-xs" href="?/usuarios/modificar/<?= $persona['id_user']; ?>"  >Modificar</button-->
                      <?php endif ?>
                      
                    </td>
                    <?php endif ?>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Area</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>

                <?php else : ?>
                <div class="alert alert-info">
                  <strong>Atención!</strong>
                  <ul>
                    <li>No existen usuarios registrados en la base de datos.</li>
                    <li>Para crear nuevos usuarios debe hacer clic en el botón <kbd>Nuevo</kbd>.</li>
                  </ul>
                </div>
                <?php endif ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<!-- ============================================================== -->
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  <?php if ($permiso_eliminar) : ?>
	$('[data-eliminar]').on('click', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var csrf = '<?= $csrf; ?>';
		bootbox.confirm('Está seguro que desea eliminar el usuario?', function (result) {
			if (result) {
				$.get(href, function(data,status){			    
				    location.href ='?/usuarios/listar';
				});
			}
		});
	});
	<?php endif ?>
</script>

<?php require_once show_template('footer-basic'); ?>
<!-- jquery-validation -->
<script src="<?= js; ?>/jquery.form-validator.min.js"></script>
<script src="<?= js; ?>/jquery.form-validator.es.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
/*$(document).ready(function(){
	$('#form_roles').submit(function(event){

		event.preventDefault();

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				//Cuando la interacción sea exitosa, se ejecutará esto.
        alertify.success('Se registro el rol correctamente');
			},
			error: function(data){
				//Cuando la interacción retorne un error, se ejecutará esto.
        alertify.success('no se pudo');
			}
		});
	})
});*/
</script>
<script>
/*(function () {

  $("#form_roles").validate({
    rules: {
        rol: {required: true},
        descripcion: {required: true}
    },
    errorClass: "help-inline",
    errorElement: "span",
    messages: {
        rol: "Debe escribir un rol.",
        descripcion: "Debe ingresar una descripcion de rol"
    },

   //una ves validado guardamos los datos en la DB
    submitHandler: function(form){

        //alert();
        var datos = $("#form_roles").serialize();
        $.ajax({
            type: 'POST',
            url: "?/roles/guardar",
            data: datos,
            success: function (resp) {
              console.log(resp);
              cont = 0;
              switch(resp){

                case '1': 
                          alertify.success('Se registro la gestión rol correctamente');
                          consol.log("se guardo");
                          break;
                case '2':
                          alertify.success('Se no se registro el rol');console.log("no se guardo"); break;
              }
              //pruebaa();
            }
            
        });
        
    }
  });
});*/
</script>

</body>
</html>