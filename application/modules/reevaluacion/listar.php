<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene las reservas para evaluaciones
$reservas = $db->query("SELECT * FROM sys_agenda_eva WHERE asunto = 'Evaluación2'")->fetch();

// Obtiene los roles
$pacientes = $db->query("SELECT * FROM ins_paciente WHERE estado = 'A'")->fetch();

//$especialistas = $db->select('u.id_user, p.nombres, p.primer_apellido, p.segundo_apellido')->from('sys_users u')->where('u.estado', "A")->where('u.area_id','6')->join('sys_persona p', 'u.id_user = p.id_persona', 'left')->fetch();
$especialistas = $db->select('id_user, nombres, primer_apellido, segundo_apellido')->from('ins_usuarios')->where('estado', "A")->where('area_id','6')->fetch();

//listado de consultorios
$consultorios = $db->select('id_consultorio, consultorio')->from('ins_consultorios')->where('estado', "A")->where('especialidad_id','1')->fetch();

// Obtiene los permisos
//print_f($_views);
$permiso_crear = in_array('crear', $_views);
$permiso_ver = in_array('ver', $_views);
$permiso_modificar = in_array('modificar', $_views);
$permiso_eliminar = in_array('eliminar', $_views);
$permiso_imprimir = in_array('imprimir', $_views);

?>
<?php require_once show_template('header-design'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reevaluaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Agendar</a></li>
              <li class="breadcrumb-item active">Reevaluación</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<!-- ============================================================== -->
            <div class="card">
                  <!--div class="card-header">
                      <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                          <div class="text-label hidden-xs">Seleccione:</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                          <div class="btn-group">
                              <div class="input-group">
                              <div class="input-group-append be-addon">
                                <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Acciones</button>
                                <div class="dropdown-menu">
                                  <?php if ($permiso_crear) : ?>
                                  <div class="dropdown-divider"></div>
                                  <a href="?/areas/crear" class="dropdown-item">Crear evaluación</a>
                                  <?php endif ?>  
                                  <?php if ($permiso_imprimir) : ?>
                                  <div class="dropdown-divider"></div>
                                  <a href="?/areas/imprimir" class="dropdown-item" target="_blank"><span class="glyphicon glyphicon-print"></span> Imprimir evaluaciones</a>
                                  <?php endif ?>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                  </div-->
                  <!-- /.card-header -->
              <div class="card-body">
                  <!-- ============================== fullCalendar 6 ================================== -->
                  <div class="container">
                        <div class="col-md-12"><div id="calendar"></div>
                  </div>
                    <!-- Modals -->
                      <!-- ============================================================== -->
                        <!-- Modal -->
                        <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos evaluación: </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form action="form_reservas" method="post">
                                  <input type="hidden" name="<?= $csrf; ?>">
                                  <input type="hidden" id="codigo">
                                    <!-- datos para la reserva de reevaluacion -->
                                    <div class="row">
                                      <div class="col-12 col-sm-12">
                                        <!-- ---------------------------------------------------- -->
                                        <?php if ($pacientes) : ?>
                                        <table id="tabpacientes" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                            <th>Paciente</th>
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>Diagnostico</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          <?php foreach ($pacientes as $nro => $paciente) : ?>
                                          <tr>
                                            <td class="text-nowrap"><?= escape($paciente['nombres']);?></td>
                                            <td class="text-nowrap"><?= escape($paciente['primer_apellido']);?></td>
                                            <td class="text-nowrap"><?= escape($paciente['segundo_apellido']);?></td>
                                            <td class="text-nowrap"><?= escape($paciente['diagnostico']);?></td>
                                            <td>
                                                <a href="?/reevaluacion/modificar/<?= $paciente['id_paciente']; ?>" data-toggle="tooltip" data-title="Eliminar area" data-eliminar="true" class="btn btn-danger btn-sm"><span class="icon-trash">Seleccionar</span></a>
                                                <!--button type="button" class="btn btn-danger btn-xs" href="?/areas/eliminar/<?= $area['id_area']; ?>" data-eliminar="true" >Eliminar</button-->                                      
                                            </td>
                                          </tr>
                                          <?php endforeach ?>
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Área</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                          </tr>
                                          </tfoot>
                                        </table>

                                        <?php else : ?>
                                        <div class="alert alert-info">
                                          <strong>Atención!</strong>
                                          <ul>
                                            <li>No existen pacientes registradas en la base de datos.</li>
                                          </ul>
                                        </div>
                                        <?php endif ?>
                                        <!-- ---------------------------------------------------- -->

                                      </div>
                                    </div>
                                    <!-- ./datos para la reserva de reevaluacion -->
                                  </form>
                              </div>
                              <div class="modal-footer">
                                <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button-->
                                <button type="button" id="BotonAgregar" class="btn btn-primary">Agregar</button>
                                <button type="button" id="BotonModificar" class="btn btn-warning">Modificar</button>
                                <button type="button" id="BotonBorrar" class="btn btn-danger">Borrar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                          <!-- /.modal -->
                      <!-- ============================================================== -->
                      <!-- /.Modals -->
                  </div>
                  <!-- ============================== fin fullCalendar  6 ============================== -->
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
		bootbox.confirm('Está seguro que desea eliminar el rol?', function (result) {
			if (result) {
				$.get(href, function(data,status){
				    location.href ='?/areas/listar';
				});
			}
		});
	});
	<?php endif ?>
</script>
  

<?php require_once show_template('footer-basic'); ?>


<script>
  /*$(function () {
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
  });*/

  $(function () {
    $("#tabpacientes2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

<script>
var modalEvento;
modalEvento = new bootstrap.Modal(document.getElementById('FormularioEventos'),{keyboard:false});

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    moment.locale('es');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      droppable: true,
      locale:"es",
      showNonCurrentDates: false,
      weekNumbers: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventSources: [
      {
        url: '?/evaluacion/api',
        method: 'POST',
        color: 'pink',    
        textColor: 'black',
      }
      ],
      hiddenDays:[4,0],
      events:[
        {
          daysOfWeek: ['4'],
          startTime: '08:00:00',
          endTime: '18:00:00',
          color: 'yellow',
        }
      ],
      /*failure: function(){
        alert('hubo un error al buscar eventos!');
      },*/
      /*initialDate: '2023-05-01',*/
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(informacion){
            //alert("Presionaste "+informacion.start);
            modalEvento.show();
            
            //modalEvento.show(); 
      },
      eventDidMount: function(info) {
    console.log(info.event.extendedProps);
    /*var tooltip = new Tooltip(info.el, {
      title: extendedProps["nombret"],
      placepent: 'top',
      trigger: 'hover',
      container: 'body'
    });*/
  },
  /*select: function(start, end){
    var check = moment(start).format('YYYY-MM-DD');
    var today = moment(new Date()).format('YYYY-MM-DD');
    if(check >= today){
      bootbox.alert('si se puede crear evaluacion' +check);
    }else{
      bootbox.alert('No se puede agendar en fecha pasada');
    }
  },*/
   dateClick: function(info){
          //Se puede crear evaluación
          limpiarFormulario();
          $('#BotonAgregar').show();
          $('#BotonModificar').hide();
          $('#BotonBorrar').hide();
          $('#dia').val(moment(info.dateStr.split("T")[0]).format('dddd'));
          /*var parentResource = calendar.getResourceById(moment(info.dateStr.split("T")[0]).format('dddd'));
          var children = parentResource.getChildren();
          var chilIds = children.map(function(child){
            return child.id
          });
          console.log(chilIds);*/
          if(info.allDay){
            $('#FechaInicio').val(info.dateStr);
            $('#FechaFin').val(info.dateStr);
          }else{
            let fechaHora = info.dateStr.split("T");
            $('#FechaInicio').val(fechaHora[0]);
            $('#FechaFin').val(fechaHora[0]);
            $('#HoraInicio').val(fechaHora[1].substring(0,5));
          }
          getHorarios3();    
    },
    eventClick: function(info) {
          //alert("ingresa a event click");
          $('#BotonModificar').show();
          $('#BotonBorrar').show();
          $('#BotonAgregar').hide();
          $('#codigo').val(info.event.id);
          $('#nombrep').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          //Datos extras
          $('#tutor_id').val(info.event.extendedProps["tutor_id"]);
          $('#paciente_id').val(info.event.extendedProps["paciente_id"]);
          $('#id_reserva').val(info.event.extendedProps["id_reserva"]);
          $('#nombret').val(info.event.extendedProps["nombret"]);
          $('input[name=generot]').attr('checked',false);
          $("input[name=generot]").val([info.event.extendedProps["generot"]]);
          $('#paternot').val(info.event.extendedProps["paternot"]);
          $('#maternot').val(info.event.extendedProps["maternot"]);
          $('#nrodocumentot').val(info.event.extendedProps["nrodocumentot"]);
          $('#complementot').val(info.event.extendedProps["complementot"]);
          $('#tipodoct').val(info.event.extendedProps["tipodoct"]);
          $('#celulart').val(info.event.extendedProps["celulart"]);
          $('#parentesco').val(info.event.extendedProps["parentesco"]);
          $('#nombrep').val(info.event.extendedProps["nombrep"]);
          $('input[name=generop]').attr('checked',false);
          $("input[name=generop]").val([info.event.extendedProps["generop"]]);
          $('#paternop').val(info.event.extendedProps["paternop"]);
          $('#maternop').val(info.event.extendedProps["maternop"]);
          $('#fecha_nac').val(info.event.extendedProps["fecha_nac"]);
          $('#nrodocumentop').val(info.event.extendedProps["nrodocumentop"]);
          $('#complementop').val(info.event.extendedProps["complementop"]);
          $('#tipodocp').val(info.event.extendedProps["tipodocp"]);
          $('#celularp').val(info.event.extendedProps["celularp"]);
          $('#diagnostico').val(info.event.extendedProps["diagnostico"]);
          $('#impedimento').val(info.event.extendedProps["impedimento"]);
          $('#observacion').val(info.event.extendedProps["observacion"]);
          $('#metodo_reserva').val(info.event.extendedProps["metodo_reserva"]);
          $('#tarifa_id').val(info.event.extendedProps["tarifa_id"]);
          $('#especialista').val(info.event.extendedProps["especialista"]);
          $('#consultorio').val(info.event.extendedProps["consultorio"]);
          $('#horas_disp').val(info.event.extendedProps["horario"]);
          $('#fecha_prog').val(info.event.extendedProps["fecha_prog"]);
          $('#hora_inicio').val(info.event.extendedProps["hora_inicio"]);
          $('#hora_fin').val(info.event.extendedProps["hora_fin"]); 
          $('#dia').val(moment(info.event.start).format('dddd'));
          getHorarios3();
          $("#FormularioEventos").modal();
      },
      eventResize: function(info) {
          //alert("ingresa a event eventResize");
          $('#codigo').val(info.event.id);
          $('#nombrep').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          //$('#Descripcion').val(info.event.extendedProps.descripcion);
          //Datos extras
          $('#tutor_id').val(info.event.extendedProps["tutor_id"]);
          $('#paciente_id').val(info.event.extendedProps["paciente_id"]);
          $('#id_reserva').val(info.event.extendedProps["id_reserva"]);
          $('#nombret').val(info.event.extendedProps["nombret"]);
          $('input[name=generot]').attr('checked',false);
          $("input[name=generot]").val([info.event.extendedProps["generot"]]);
          $('#paternot').val(info.event.extendedProps["paternot"]);
          $('#maternot').val(info.event.extendedProps["maternot"]);
          $('#nrodocumentot').val(info.event.extendedProps["nrodocumentot"]);
          $('#complementot').val(info.event.extendedProps["complementot"]);
          $('#tipodoct').val(info.event.extendedProps["tipodoct"]);
          $('#celulart').val(info.event.extendedProps["celulart"]);
          $('#parentesco').val(info.event.extendedProps["parentesco"]);
          $('#nombrep').val(info.event.extendedProps["nombrep"]);
          $('input[name=generop]').attr('checked',false);
          $("input[name=generop]").val([info.event.extendedProps["generop"]]);
          $('#paternop').val(info.event.extendedProps["paternop"]);
          $('#maternop').val(info.event.extendedProps["maternop"]);
          $('#fecha_nac').val(info.event.extendedProps["fecha_nac"]);
          $('#nrodocumentop').val(info.event.extendedProps["nrodocumentop"]);
          $('#complementop').val(info.event.extendedProps["complementop"]);
          $('#tipodocp').val(info.event.extendedProps["tipodocp"]);
          $('#celularp').val(info.event.extendedProps["celularp"]);
          $('#diagnostico').val(info.event.extendedProps["diagnostico"]);
          $('#impedimento').val(info.event.extendedProps["impedimento"]);
          $('#observacion').val(info.event.extendedProps["observacion"]);
          $('#metodo_reserva').val(info.event.extendedProps["metodo_reserva"]);
          $('#tarifa_id').val(info.event.extendedProps["tarifa_id"]);
          $('#especialista').val(info.event.extendedProps["especialista"]);
          $('#consultorio').val(info.event.extendedProps["consultorio"]);
          $('#horas_disp').val(info.event.extendedProps["horario"]);
          $('#fecha_prog').val(info.event.extendedProps["fecha_prog"]);
          $('#hora_inicio').val(info.event.extendedProps["hora_inicio"]);
          $('#hora_fin').val(info.event.extendedProps["hora_fin"]); 
          $('#dia').val(moment(info.event.start).format('dddd'));
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        eventDrop: function(info) {
          //alert("ingresa a event eventDrop");
          $('#codigo').val(info.event.id);
          $('#nombrep').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          //$('#Descripcion').val(info.event.extendedProps.descripcion);
          //Datos extras
          $('#tutor_id').val(info.event.extendedProps["tutor_id"]);
          $('#paciente_id').val(info.event.extendedProps["paciente_id"]);
          $('#id_reserva').val(info.event.extendedProps["id_reserva"]);
          $('#nombret').val(info.event.extendedProps["nombret"]);
          $('input[name=generot]').attr('checked',false);
          $("input[name=generot]").val([info.event.extendedProps["generot"]]);
          $('#paternot').val(info.event.extendedProps["paternot"]);
          $('#maternot').val(info.event.extendedProps["maternot"]);
          $('#nrodocumentot').val(info.event.extendedProps["nrodocumentot"]);
          $('#complementot').val(info.event.extendedProps["complementot"]);
          $('#tipodoct').val(info.event.extendedProps["tipodoct"]);
          $('#celulart').val(info.event.extendedProps["celulart"]);
          $('#parentesco').val(info.event.extendedProps["parentesco"]);
          $('#nombrep').val(info.event.extendedProps["nombrep"]);
          $('input[name=generop]').attr('checked',false);
          $("input[name=generop]").val([info.event.extendedProps["generop"]]);
          $('#paternop').val(info.event.extendedProps["paternop"]);
          $('#maternop').val(info.event.extendedProps["maternop"]);
          $('#fecha_nac').val(info.event.extendedProps["fecha_nac"]);
          $('#nrodocumentop').val(info.event.extendedProps["nrodocumentop"]);
          $('#complementop').val(info.event.extendedProps["complementop"]);
          $('#tipodocp').val(info.event.extendedProps["tipodocp"]);
          $('#celularp').val(info.event.extendedProps["celularp"]);
          $('#diagnostico').val(info.event.extendedProps["diagnostico"]);
          $('#impedimento').val(info.event.extendedProps["impedimento"]);
          $('#observacion').val(info.event.extendedProps["observacion"]);
          $('#metodo_reserva').val(info.event.extendedProps["metodo_reserva"]);
          $('#tarifa_id').val(info.event.extendedProps["tarifa_id"]);
          $('#especialista').val(info.event.extendedProps["especialista"]);
          $('#consultorio').val(info.event.extendedProps["consultorio"]);
          $('#horas_disp').val(info.event.extendedProps["horario"]);
          $('#fecha_prog').val(info.event.extendedProps["fecha_prog"]);
          $('#hora_inicio').val(info.event.extendedProps["hora_inicio"]);
          $('#hora_fin').val(info.event.extendedProps["hora_fin"]); 
          $('#dia').val(moment(info.event.start).format('dddd'));
          
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        drop: function(info) {
          limpiarFormulario();
          $('#ColorFondo').val(info.draggedEl.dataset.colorfondo);
          $('#ColorTexto').val(info.draggedEl.dataset.colortexto);
          $('#Titulo').val(info.draggedEl.dataset.titulo);
          let fechaHora = info.dateStr.split("T");
          $('#FechaInicio').val(fechaHora[0]);
          $('#FechaFin').val(fechaHora[0]);
          if (info.allDay) { //verdadero si el calendario esta en vista de mes
            $('#HoraInicio').val(info.draggedEl.dataset.horainicio);
            $('#HoraFin').val(info.draggedEl.dataset.horafin);
          } else {
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
            $('#HoraFin').val(moment(fechaHora[1].substring(0, 5)).add(1, 'hours'));
          }
          let registro = recuperarDatosFormulario();
          agregarEventoPredefinido(registro);
        },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
    });

    calendar.render();

    $('#BotonAgregar').click(function(){
        let registro = recuperarDatosFormulario();
          var promise = agregarRegistro(registro);   
          promise.done(function(data){
            calendar.refetchEvents();
            $("#FormularioEventos").modal('hide');
        });
    });
    $('#BotonModificar').click(function(){
      let registro = recuperarDatosFormulario();
      var promise = modificarRegistro(registro);
      promise.done(function(data){
        calendar.refetchEvents();
        $("#FormularioEventos").modal('hide');
      })
    });

    $('#BotonBorrar').click(function(){
      //alert("ingresa al boton borrar");
      let registro = recuperarDatosFormulario();
      var promise = borrarRegistro(registro);
      promise.done(function(data){
        calendar.refetchEvents();
        $("#FormularioEventos").modal('hide');
      })
    });

    //Evento para escoger horario disponible
    $(document).on('change','#horas_disp', function(){
      var hora = $('select[name="horas_disp"] option:selected').text();
      //alert("valor obtenido es: "+ hora);
      hora = hora.split("--");
      $("#HoraInicio").val(hora[0]);
      $("#HoraFin").val(hora[1])
    });

    /*("#consultorio").click(function(){
      alert("ingresa a este evento");
        let datos = {
          consultorio: $('#consultorio').val(),
          dia: $('#dia').val()
        };
          var promise = getHorarios3(datos);   
          promise.done(function(data){
            alert("ingresa hasta aquiii"+ data.status) ;
        })
    });*/

  });

  $(document).ready(function() {
    $("#form_reservas").validate({
          debug: true,
        rules: {
            nombrep:{required: true, minlength: 3},
            fecha_nac:{required: true}
          },
          messages:{
            nombrep: "Ingrese el nombre",
            fecha_nac: "ingrese fecha de nacimiento"
          }
      });

      $("select[name=consultorio]").on("change",function(){
        let datos = {
          consultorio: $('#consultorio').val(),
          dia: $('#dia').val(),
          fecha: $('#FechaFin').val()
        };  
        $.ajax({
          type: 'POST',
          url: '?/evaluacion/horarios',
          dataType: 'html',
          data: datos,
          success: function(res){
            //alert('correcto al cargar horarios al clickear en consultorio ');
            //$(document).trigger('change');
            $("#horarios").html(res);
          },
          error: function(error){
            alert("error al cargar horarios: " + res.error);
          }
        });
      });
});

  /*new FullCalendarInteraction.Draggable(document.getElementById('listaeventospredefinidos'), {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText.trim()
          }
        }
      });*/

  //Eventos de botones de la aplicación
      /*$('#BotonAgregar').click(function() {
        let registro = recuperarDatosFormulario();
        agregarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonModificar').click(function() {
        let registro = recuperarDatosFormulario();
        modificarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonBorrar').click(function() {
        let registro = recuperarDatosFormulario();
        borrarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonEventosPredefinidos').click(function() {
        window.location = "eventospredefinidos.html";
      });*/
    
      // funciones para comunicarse con el servidor via ajax
      function agregarRegistro(registro) {
        var promise = $.ajax({
          url: '?/evaluacion/guardar',
          type: 'POST',
          dataType: 'JSON',
          data: registro,
          beforeSend: function(){
            let dialog = bootbox.dialog({
                                message: '<p class="text-center mb-0"><i class="fas fa-spin fa-cog"></i> Por favor espera mientras...</p>',
                                closeButton: false
                                });
                                // do something in the background
                                dialog.modal('hide');
          },
          success: function(msg){
            var href = $(this).attr('href');
            bootbox.alert('<p class="text-warning"> ATENCIÓN </p> ' + msg.mensaje, function() {
                                location.href ='?/evaluacion/listar';
                                });
          },
          error: function(error){
            bootbox.alert('Error : ' + error.mensaje);
          }
        });
        $("#FormularioEventos").modal('hide');
        return promise;
      }

      function modificarRegistro(registro) {
        var promise = $.ajax({
          url: '?/evaluacion/guardar',
          type: 'POST',
          dataType: 'JSON',
          data: registro,
          /*beforeSend: function(){
            let dialog = bootbox.dialog({
                                message: '<p class="text-center mb-0"><i class="fas fa-spin fa-cog"></i> Por favor espera mientras...</p>',
                                closeButton: false
                                });
                                // do something in the background
                                dialog.modal('hide');
          },*/
          success: function(msg){
            bootbox.alert('OK : ' + msg.mensaje);
          },
          error: function(error){
            bootbox.alert('Error : ' + error.mensaje);
          }
        });
        $("#FormularioEventos").modal('hide');
        return promise;
      }

      function borrarRegistro(registro) {
        var promise = $.ajax({
          url: '?/evaluacion/eliminar',
          type: 'POST',
          dataType: 'JSON',
          data: registro,
          success: function(msg){
            //alert('Evento eliminado '+msg.estado);
            bootbox.alert('Se eliminó la evaluación');
          },
          error: function(error){
            //alert("Hay un poblema al borrar el evento: "+error.estado);
            bootbox.alert('Hay un poblema al borrar la evaluación');
          }
        });
        $("#FormularioEventos").modal('hide');
        return promise;
      }
      function mostrarOpcionSeleccionada() {
        var option = $("#horas_disp").find('option:selected');
        
        $('#HoraInicio').text($option.text() + ' (' + $option.val() + ')');
      }


      function agregarEventoPredefinido(registro) {
        $.ajax({
          type: 'POST',
          url: 'datoseventos.php?accion=agregar',
          data: registro,
          success: function(msg) {
            calendar.removeAllEvents();
            calendar.refetchEvents();
          },
          error: function(error) {
            alert("Hay un problema al agregar predefinido:" + error);
          }
        });
      }

      function getHorarios3(){
        let datos = {
          consultorio: $('#consultorio').val(),
          dia: $('#dia').val(),
          fecha: $('#FechaFin').val()
        };
        $.ajax({
          type: 'POST',
          url: '?/evaluacion/horarios',
          dataType: 'html',
          data: datos,
          success: function(res){
            //alert('correcto al cargar horarios 3 ');
            //$(document).trigger('change');
            $("#horarios").html(res);
          },
          error: function(error){
            alert("error al cargar horarios 3: " + error.error);
          }
        });
      }

      function getHorariosMod(){
        let datos = {
          codigo: $('#codigo').val()
        };
        $.ajax({
          type: 'POST',
          url: '?/evaluacion/horariosmod',
          dataType: 'html',
          data: datos,
          success: function(res){
            //alert('correcto al cargar horarios 3 ');
            //$(document).trigger('change');
            $("#horarios").html(res);
          },
          error: function(error){
            alert("error al cargar horarios 3: " + error.error);
          }
        });
      }

      // funciones que interactuan con el formulario de entrada de datos
      function limpiarFormulario() {
        $('#codigo').val('');
        $('#nombrep').val('');
        $('#FechaInicio').val('');
        $('#FechaFin').val('');
        $('#HoraInicio').val('');
        $('#HoraFin').val('');
        $('#ColorFondo').val('#3788D8');
        $('#ColorTexto').val('#ffffff');
        //Datos extras
        $('#id_reserva').val('');
        $('#tutor_id').val('');
        $('#paciente_id').val('');
        $('#nombret').val('');
        $('input:radio[name=generot]').attr('checked',false);
        $('#paternot').val('');
        $('#maternot').val('');
        $('#nrodocumentot').val('');
        $('#complementot').val('');
        $('#tipodoct').val('Carnet');
        $('#tipodoct').change();
        $('#celulart').val('');
        $('#parentesco').val('Padre');
        $('#nombrep').val('');
        $('input:radio[name=generop]').attr('checked',false);
        $('#paternop').val('');
        $('#maternop').val('');
        $('#fecha_nac').val('');
        $('#nrodocumentop').val('');
        $('#complementop').val('');
        $('#tipodocp').val('Carnet de identidad');
        $('#celularp').val('');
        $('#diagnostico').val('');
        $('#impedimento').val('');
        $('#observacion').val('');
        $('#metodo_reserva').val('Whatsapp');
        $('#tarifa_id').val('1');
        $('#especialista').val('0');
        $('#consultorio').val('0');
        $('#horas_disp').val('0');
        $('#fecha_prog').val('');
        $('#hora_inicio').val('');
        $('#hora_fin').val('');
        $("#FormularioEventos").modal();

      }

      function recuperarDatosFormulario_old() {
        let registro = {
          codigo: $('#Codigo').val(),
          titulo: $('#nombrep').val(),
          descripcion: $('#diagnostico').val(),
          inicio: $('#FechaInicio').val() + ' ' + $('#HoraInicio').val(),
          fin: $('#FechaFin').val() + ' ' + $('#HoraFin').val(),
          colorfondo: $('#ColorFondo').val(),
          colortexto: $('#ColorTexto').val()
        };
        return registro;
      }
      function recuperarDatosFormulario() {
        fecha_nacimiento=document.getElementById("fecha_nac").value;
       // let fechaformateada = moment(fecha_nac).format('DD/MM/YYYY');
        let registro = {
          codigo: $('#codigo').val(),
          tutor_id: $('#tutor_id').val(),
          paciente_id: $('#paciente_id').val(),
          nombret: $('#nombret').val(),
          generot: $('input:radio[name=generot]:checked').val(),
          paternot: $('#paternot').val(),
          maternot: $('#maternot').val(),
          nrodocumentot: $('#nrodocumentot').val(),
          complementot: $('#complementot').val(),
          tipodoct: $('#tipodocp').val(),
          celulart: $('#celulart').val(),
          parentesco: $('#parentesco').val(),
          nombrep: $('#nombrep').val(),
          generop: $('input:radio[name=generop]:checked').val(),
          paternop: $('#paternop').val(),
          maternop: $('#maternop').val(),
          fecha_nac: document.getElementById("fecha_nac").value,
          nrodocumentop: $('#nrodocumentop').val(),
          complementop: $('#complementop').val(),
          tipodocp: $('#tipodocp').val(),
          celularp: $('#celularp').val(),
          diagnostico: $('#diagnostico').val(),
          impedimento: $('#impedimento').val(),
          observacion: $('#observacion').val(),
          tipores: $('#tipores').val(),
          tarifa: $('#tarifa').val(),
          especialista: $('#especialista').val(),
          consultorio: $('#consultorio').val(),
          horas_disp: $('#horas_disp').val(),
          fecha_prog: $('#FechaInicio').val(),
          dia: $('#dia').val(),
          hora_inicio:$('#HoraInicio').val(),
          hora_fin: $('#HoraFin').val(),
          inicio: $('#FechaInicio').val() + ' ' + $('#HoraInicio').val(),
          fin: $('#FechaFin').val() + ' ' + $('#HoraFin').val(),
          colorfondo: $('#ColorFondo').val(),
          colortexto: $('#ColorTexto').val()
        };
        return registro;
      }

   

</script>


</body>
</html>
