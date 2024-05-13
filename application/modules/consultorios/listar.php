<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los consultorios
//$consultorios = $db->query("SELECT * FROM ins_consultorios WHERE estado = 'A'")->fetch();

$consultorios = $db->select('c.*, e.especialidad as especialidad')->from('ins_consultorios c')->where('c.estado', "A")->join('ins_especialidades e', 'c.especialidad_id = e.id_especialidad', 'left')->order_by('c.id_consultorio', 'asc')->fetch();

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
            <h1>Consultorios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Adminisstración</a></li>
              <li class="breadcrumb-item active">Consultorios</li>
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
                                <a class="dropdown-item" href="?/consultorios/crear">Crear consultorio</a>
                                <?php endif ?>  
                                <?php if ($permiso_imprimir) : ?> 
                                <a class="dropdown-item" href="?/consultorios/imprimir">Imprimir consultorios</a>
                                <?php endif ?>  
                              </div>
                            </div> 
                        </div>
                        <!-- /.Toggle Dropdown -->

                    </div>
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
                <?php if ($consultorios) : ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Consultorio</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($consultorios as $nro => $consultorio) : ?>
                  <tr>
                    <td class="text-nowrap"><?= escape($consultorio['consultorio']);?></td>
                    <td class="text-nowrap"><?= escape($consultorio['especialidad']);?></td>
                    <?php if ($permiso_modificar || $permiso_eliminar) : ?>
                    <td>
                      <?php if($permiso_eliminar): ?>
                        <a href="?/consultorios/eliminar/<?= $consultorio['id_consultorio']; ?>" data-toggle="tooltip" data-title="Eliminar consultorio" data-eliminar="true" class="btn btn-danger btn-sm"><span class="icon-trash">Eliminar</span></a>
                        <!--button type="button" class="btn btn-danger btn-xs" href="?/consultorios/eliminar/<?= $consultorioss['id_especialidad']; ?>" data-eliminar="true" >Eliminar</button-->
                      <?php endif ?>
                      <?php if($permiso_modificar): ?>
                        <a href="?/consultorios/modificar/<?= $consultorio['id_consultorio']; ?>" data-toggle="tooltip" data-target="Modifica consultorio"  data-title="Modificar consultorios" style="color:white" class="btn btn-warning btn-sm"><span class="icon-note">Modificar</span></a>
                        <!--button type="button" class="btn btn-warning btn-xs" href="?/consultorios/modificar/<?= $especialidad['id_especialidad']; ?>"  >Modificar</button-->
                      <?php endif ?>
                      
                    </td>
                    <?php endif ?>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Consultorio</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>

                <?php else : ?>
                <div class="alert alert-info">
                  <strong>Atención!</strong>
                  <ul>
                    <li>No existen consultorios registradas en la base de datos.</li>
                    <li>Para crear nuevos consultorios debe hacer clic en el botón <kbd>Nuevo</kbd>.</li>
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
            <form id="form_area">
            <input type="hidden" name="<?= $csrf; ?>">
            <div class="modal-header">
              <h4 class="modal-title">Crear nuevo consultorio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="row">
                  <div class="col-5">
                    <input type="text" id="area" name="area" class="form-control" placeholder="Área">
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

  <script>
  <?php if ($permiso_eliminar) : ?>
	$('[data-eliminar]').on('click', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var csrf = '<?= $csrf; ?>';
		bootbox.confirm('Está seguro que desea eliminar el consultorio?', function (result) {
			if (result) {
				$.get(href, function(data,status){
				    location.href ='?/consultorios/listar';
				});
			}
		});
	});
	<?php endif ?>
</script>
  

<?php require_once show_template('footer-basic'); ?>


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
    var datos = $("#form_area").serialize();
        $.ajax({
            type: 'POST',
            url: "?/consultorios/guardar",
            data: datos,
            dataType: 'json',
            success: function (resp) {
              console.log(resp);
              if(resp['estado']== 's'){
                  $("#modal-crear").modal("hide");
                  //alert("se guardo: "+resp['datos']['rol']);
                  location.href ='?/consultorios/listar';
              }
            }
        });
  });
</script>

</body>
</html>
