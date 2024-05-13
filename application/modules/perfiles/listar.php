<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los roles
$perfiles = $db->query("SELECT * FROM ins_perfil WHERE estado = 'A'")->fetch();

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
            <h1>Perfiles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Adminisstración</a></li>
              <li class="breadcrumb-item active">Perfiles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<!-- ============================================================== -->
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
                                <a class="dropdown-item" href="?/perfiles/crear">Crear perfil</a>
                                <?php endif ?>  
                                <?php if ($permiso_imprimir) : ?> 
                                <a class="dropdown-item" href="?/perfiles/imprimir">Imprimir perfiles</a>
                                <?php endif ?>  
                              </div>
                            </div> 
                        </div>
                        <!-- /.Toggle Dropdown -->

                    </div>
                  </div>
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
                <?php if ($perfiles) : ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Perfiles</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($perfiles as $nro => $perfil) : ?>
                  <tr>
                    <td class="text-nowrap"><?= escape($perfil['perfil']);?></td>
                    <td class="text-nowrap"><?= escape($perfil['descripcion']);?></td>
                    <?php if ($permiso_modificar || $permiso_eliminar) : ?>
                    <td>
                      <?php if($permiso_eliminar): ?>
                        <a href="?/perfiles/eliminar/<?= $perfil['id_perfil']; ?>" data-toggle="tooltip" data-title="Eliminar perfil" data-eliminar="true" class="btn btn-danger btn-sm"><span class="icon-trash">Eliminar</span></a>
                        <!--button type="button" class="btn btn-danger btn-xs" href="?/roles/eliminar/<?= $rol['id_perfil']; ?>" data-eliminar="true" >Eliminar</button-->
                      <?php endif ?>
                      <?php if($permiso_modificar): ?>
                        <a href="?/perfiles/modificar/<?= $perfil['id_perfil']; ?>" data-toggle="tooltip" data-target="Modifica rol"  data-title="Modificar perfil" style="color:white" class="btn btn-warning btn-sm"><span class="icon-note">Modificar</span></a>
                        <!--button type="button" class="btn btn-warning btn-xs" href="?/roles/modificar/<?= $rol['id_perfil']; ?>"  >Modificar</button-->
                      <?php endif ?>
                      
                    </td>
                    <?php endif ?>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Perfil</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>

                <?php else : ?>
                <div class="alert alert-info">
                  <strong>Atención!</strong>
                  <ul>
                    <li>No existen perfiles registrados en la base de datos.</li>
                    <li>Para crear nuevos perfiles debe hacer clic en el botón <kbd>Nuevo</kbd>.</li>
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

  <!-- Modals -->
  <!-- ============================================================== -->
  <div class="modal fade" id="modal-crear">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="form_perfiles">
            <input type="hidden" name="<?= $csrf; ?>">
            <div class="modal-header">
              <h4 class="modal-title">Crear nuevo perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="row">
                  <div class="col-5">
                    <input type="text" id="perfil" name="perfil" class="form-control" placeholder="Rol">
                  </div>
                  <div class="col-7">
                    <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="guardar" name="guardar">Guardar</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  <!-- ============================================================== -->
  <!-- /.Modals -->
 
  

  <?php require_once show_template('footer-basic'); ?>


<script>
  <?php if ($permiso_eliminar) : ?>
	$('[data-eliminar]').on('click', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var csrf = '<?= $csrf; ?>';
		bootbox.confirm('Está seguro que desea eliminar el rol?', function (result) {
			if (result) {
				$.get(href, function(data,status){
				    location.href ='?/perfiles/listar';
				});
			}
		});
	});
	<?php endif ?>
</script>

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
$("#form_roles").submit(function(e){
    var datos = $("#form_perfiles").serialize();
        $.ajax({
            type: 'POST',
            url: "?/perfiles/guardar",
            data: datos,
            dataType: 'json',
            success: function (resp) {
              console.log(resp);
              if(resp['estado']== 's'){
                  $("#modal-crear").modal("hide");
                  //alert("se guardo: "+resp['datos']['rol']);
                  location.href ='?/perfiles/listar';
              }
            }
        });
  });
</script>

</body>
</html>
