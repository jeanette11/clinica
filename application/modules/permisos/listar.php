<?php 

// Obtiene la cadena csrf
$csrf = set_csrf();

// Obtiene los parametros
$id_area = (isset($_params[0])) ? $_params[0] : 0;

// Obtiene las areas
$areas = $db->query("SELECT * FROM ins_area WHERE estado = 'A'")->fetch();

// Obtiene de la bd el menu
$menus = $db->query("select * from sys_menus")->fetch();

// Obtiene los permisos
//$permisos = $db->query("select * from sys_permisos where area_id='1'")->fetch();
$permisos = $db->query("select * from sys_permisos where area_id='".$id_area."'")->fetch();

$menus= $db->query("SELECT * FROM sys_menus")->fetch();

//Definiendo variables de para los checkeds
$administracion = '';
				
$usuario_crear = '';
$usuario_eliminar = '';
$usuario_guardar = '';
$usuario_listar = '';
$usuario_modificar = '';
$usuario_ver = '';
$usuario_imprimir = '';
				
$areas_crear = '';
$areas_eliminar = '';
$areas_guardar = '';
$areas_listar = '';
$areas_modificar = '';
$areas_ver = '';
$areas_imprimir = '';
				
$perfiles_crear = '';
$perfiles_eliminar = '';
$perfiles_guardar = '';
$perfiles_listar = '';
$perfiles_modificar = '';
$perfiles_ver = '';
$perfiles_imprimir = '';
				
$roles_crear = '';
$roles_eliminar = '';
$roles_guardar = '';
$roles_listar = '';
$roles_modificar = '';
$roles_ver = '';
$roles_imprimir = '';
				
$horarios_crear = '';
$horarios_eliminar = '';
$horarios_guardar = '';
$horarios_listar = '';
$horarios_modificar = '';
$horarios_ver = '';
$horarios_imprimir = '';
				
$ins_crear = '';
$ins_eliminar = '';
$ins_guardar = '';
$ins_listar = '';
$ins_modificar = '';
$ins_ver = '';
$ins_imprimir = '';
					
$agendar = '';
				
$historiales_crear = '';
$historiales_eliminar = '';
$historiales_guardar = '';
$historiales_listar = '';
$historiales_modificar = '';
$historiales_ver = '';
$historiales_imprimir = '';
				
$atencion_crear = '';
$atencion_liminar = '';
$atencion_guardar = '';
$atencion_listar = '';
$atencion_modificar = '';
$atencion_ver = '';
$atencion_imprimir = '';
				
$licencias_crear = '';
$licencias_liminar = '';
$licencias_guardar = '';
$licencias_listar = '';
$licencias_modificar = '';
$licencias_ver = '';
$licencias_imprimir = '';
				
$pagos_crear = '';
$pagos_liminar = '';
$pagos_guardar = '';
$pagos_listar = '';
$pagos_modificar = '';
$pagos_ver = '';
$pagos_imprimir = '';
				
$reportes_crear = '';
$reportes_eliminar = '';
$reportes_guardar = '';
$reportes_listar = '';
$reportes_modificar = '';
$reportes_ver = '';
$reportes_imprimir = '';
				
$evaluacion_crear = '';
$evaluacion_eliminar = '';
$evaluacion_guardar = '';
$evaluacion_listar = '';
$evaluacion_modificar = '';
$evaluacion_ver = '';
$evaluacion_imprimir = '';
				
$revaluacion_crear = '';
$revaluacion_eliminar = '';
$revaluacion_guardar = '';
$revaluacion_listar = '';
$revaluacion_modificar = '';
$revaluacion_ver = '';
$revaluacion_imprimir = '';
				
$uta_crear = '';
$uta_eliminar = '';
$uta_guardar = '';
$uta_listar = '';
$uta_modificar = '';
$uta_ver = '';
$uta_imprimir = '';
				
$adulto_crear = '';
$adulto_eliminar = '';
$adulto_guardar = '';
$adulto_listar = '';
$adulto_modificar = '';
$adulto_ver = '';
$adulto_imprimir = '';
				
$trauma_crear = '';
$trauma_eliminar = '';
$trauma_guardar = '';
$trauma_listar = '';
$trauma_modificar = '';
$trauma_ver = '';
$trauma_imprimir = '';
				
$pediatrica_crear = '';
$pediatrica_eliminar = '';
$pediatrica_guardar = '';
$pediatrica_listar = '';
$pediatrica_modificar = '';
$pediatrica_ver = '';
$pediatrica_imprimir = '';
				
$enfermeria_crear = '';
$enfermeria_eliminar = '';
$enfermeria_guardar = '';
$enfermeria_listar = '';
$enfermeria_modificar = '';
$enfermeria_ver = '';
$enfermeria_imprimir = '';
				
$seguta_crear = '';
$seguta_eliminar = '';
$seguta_guardar = '';
$seguta_listar = '';
$seguta_modificar = '';
$seguta_ver = '';
$seguta_imprimir = '';
				
$licmed_crear = '';
$licmed_eliminar = '';
$licmed_guardar = '';
$licmed_listar = '';
$licmed_modificar = '';
$licmed_ver = '';
$licmed_imprimir = '';
				
$licext_crear = '';
$licext_eliminar = '';
$licext_guardar = '';
$licext_listar = '';
$licext_modificar = '';
$licext_ver = '';
$licext_imprimir = '';
				
$pagos_crear = '';
$pagos_eliminar = '';
$pagos_guardar = '';
$pagos_listar = '';
$pagos_modificar = '';
$pagos_ver = '';
$pagos_imprimir = '';
				
$gastos_crear = '';
$gastos_eliminar = '';
$gastos_guardar = '';
$gastos_listar = '';
$gastos_modificar = '';
$gastos_ver = '';
$gastos_imprimir = '';
				
$tarifas_crear = '';
$tarifas_eliminar = '';
$tarifas_guardar = '';
$tarifas_listar = '';
$tarifas_modificar = '';
$tarifas_ver = '';
$tarifas_imprimir = '';
				
$caja_crear = '';
$caja_eliminar = '';
$caja_guardar = '';
$caja_listar = '';
$caja_modificar = '';
$caja_ver = '';
$caja_imprimir = '';
				
$seguri_crear = '';
$seguri_eliminar = '';
$seguri_guardar = '';
$seguri_listar = '';
$seguri_modificar = '';
$seguri_ver = '';
$seguri_imprimir = '';
				
$permisos_crear = '';
$permisos_eliminar = '';
$permisos_guardar = '';
$permisos_listar = '';
$permisos_modificar = '';
$permisos_ver = '';
$permisos_imprimir = '';
				
$uri_crear = '';
$uri_eliminar = '';
$uri_guardar = '';
$uri_listar = '';
$uri_modificar = '';
$uri_ver = '';
$uri_imprimir = '';
				
$espe_crear = '';
$espe_eliminar = '';
$espe_guardar = '';
$espe_listar = '';
$espe_modificar = '';
$espe_ver = '';
$espe_imprimir = '';
				
$cons_crear = '';
$cons_eliminar = '';
$cons_guardar = '';
$cons_listar = '';
$cons_modificar = '';
$cons_ver = '';
$cons_imprimir = '';
				
$pat_crear = '';
$pat_eliminar = '';
$pat_guardar = '';
$pat_listar = '';
$pat_modificar = '';
$pat_ver = '';
$pat_imprimir = '';

// Obtiene los permisos
$permiso_crear = in_array('crear', $_views);
$permiso_ver = in_array('ver', $_views);
$permiso_modificar = in_array('modificar', $_views);
$permiso_eliminar = in_array('eliminar', $_views);
$permiso_imprimir = in_array('imprimir', $_views);
//print_r($_views);

echo "recibe id_area: ".$id_area;
?>
<?php require_once show_template('header-design'); ?>
<!-- Select2 -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permisos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administración</a></li>
              <li class="breadcrumb-item active">Permisos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- ================================================================================== -->
<!-- Main content -->
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <?php if ($message = get_notification()) : ?>
                <div class="alert alert-<?= $message['type']; ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?= $message['title']; ?></strong>
                  <p><?= $message['content']; ?></p>
                </div>
                <?php endif ?>
          </div>
        </div>
      <div class="container-fluid">
        <form method="post" id="form-permisos" action="" enctype="multipart/form-data">
        <input type="hidden" name="<?= $csrf; ?>">
        <div class="row">
          <div class="col-md-6">
                      <div class="form-group">
                        <label>Seleccione área</label>
                          <select id="id_area" name="id_area" class="form-control">
                                <option value="">-- Seleccionar área --</option>
                                <?php foreach ($areas as $nro => $area) : ?>
                                <?php if($id_area == $area['id_area']): ?>
                                <option value="<?= $area['id_area']; ?>" selected><?= $area['area']; ?></option>
                                <?php endif ?>
                                <?php if($id_area != $area['id_area']): ?>
                                <option value="<?= $area['id_area']; ?>"><?= $area['area']; ?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                          </select>
                        
                      </div>
          </div>

          <div class="col-md-6">
              <button type="submit" action="?/permisos/guardar" id="guardar_permiso"class="btn btn-primary" onclick="submitForm();">Guardar</button>
          </div>
        </div>
        <!-- INICIO FOREACH PERMISOS------------------------------------------------------------------------------------ -->
        <?php
        if(isset($id_area)){
       
         foreach ($permisos as $nro => $permiso){
          $plit = array();
          $principal = $crear = $eliminar = $guardar = $imprimir = $listar = $modificar = $ver = $imprimir = '';
          $split = explode(',',$permiso['archivos']);
          for($i = 0; $i < count($split); $i++){
            switch ($split[$i]) {
              case "principal":
                  $principal = 'checked';
                  break;
              case "crear":
                  $crear = 'checked';
                  break;
              case "eliminar":
                  $eliminar = 'checked';
                  break;
              case "guardar":
                  $guardar = 'checked';
                  break;
              case "imprimir":
                  $imprimir = 'checked';
                  break;
              case "listar":
                  $listar = 'checked';
                  break;
              case "modificar":
                  $modificar = 'checked';
                  break;
              case "ver":
                  $ver = 'checked';
                  break;
              case "imprimir":
                  $imprimir = 'checked';
                  break;
            }
          }
          switch ($permiso['menu_id']) {
            case 1:
                $administracion = $principal;
                break;
            case 2:
                //echo "Usuario";
                $menu_id='2';
                $usuario_crear = $crear;
                $usuario_eliminar = $eliminar;
                $usuario_guardar = $guardar;
                $usuario_listar = $listar;
                $usuario_modificar = $modificar;
                $usuario_ver = $ver;
                $usuario_imprimir = $imprimir;
                break;
            case 3:
                //echo "Areas";
                $areas_crear = $crear;
                $areas_eliminar = $eliminar;
                $areas_guardar = $guardar;
                $areas_listar = $listar;
                $areas_modificar = $modificar;
                $areas_ver = $ver;
                $areas_imprimir = $imprimir;
                break;
            case 4:
                //echo "Perfiles";
                $perfiles_crear = $crear;
                $perfiles_eliminar = $eliminar;
                $perfiles_guardar = $guardar;
                $perfiles_listar = $listar;
                $perfiles_modificar = $modificar;
                $perfiles_ver = $ver;
                $perfiles_imprimir = $imprimir;
                break;
            case 5:
                //echo "Roles";
                $roles_crear = $crear;
                $roles_eliminar = $eliminar;
                $roles_guardar = $guardar;
                $roles_listar = $listar;
                $roles_modificar = $modificar;
                $roles_ver = $ver;
                $roles_imprimir = $imprimir;
                break;
          case 6:
                //echo "Horarios";
                $horarios_crear = $crear;
                $horarios_eliminar = $eliminar;
                $horarios_guardar = $guardar;
                $horarios_listar = $listar;
                $horarios_modificar = $modificar;
                $horarios_ver = $ver;
                $horarios_imprimir = $imprimir;
                break;
          case 7:
                //echo "Incripciones";
                $ins_crear = $crear;
                $ins_eliminar = $eliminar;
                $ins_guardar = $guardar;
                $ins_listar = $listar;
                $ins_modificar = $modificar;
                $ins_ver = $ver;
                $ins_imprimir = $imprimir;
                break;
          case 8:
                //echo "Agendar";
                $agendar = $principal;
                break;
          case 9:
                //echo "Historiales";
                $historiales_crear = $crear;
                $historiales_eliminar = $eliminar;
                $historiales_guardar = $guardar;
                $historiales_listar = $listar;
                $historiales_modificar = $modificar;
                $historiales_ver = $ver;
                $historiales_imprimir = $imprimir;
                break;
          case 10:
                //echo "Atencion medica";
                $atencion_crear = $crear;
                $atencion_liminar = $eliminar;
                $atencion_guardar = $guardar;
                $atencion_listar = $listar;
                $atencion_modificar = $modificar;
                $atencion_ver = $ver;
                $atencion_imprimir = $imprimir;
                break;
          case 11:
                //echo "Licencias";
                $licencias_crear = $crear;
                $licencias_liminar = $eliminar;
                $licencias_guardar = $guardar;
                $licencias_listar = $listar;
                $licencias_modificar = $modificar;
                $licencias_ver = $ver;
                $licencias_imprimir = $imprimir;
                break;
          case 12:
                //echo "Pagos";
                $pagos_crear = $crear;
                $pagos_liminar = $eliminar;
                $pagos_guardar = $guardar;
                $pagos_listar = $listar;
                $pagos_modificar = $modificar;
                $pagos_ver = $ver;
                $pagos_imprimir = $imprimir;
                break;
          case 13:
                //echo "Reportes";
                $reportes_crear = $crear;
                $reportes_eliminar = $eliminar;
                $reportes_guardar = $guardar;
                $reportes_listar = $listar;
                $reportes_modificar = $modificar;
                $reportes_ver = $ver;
                $reportes_imprimir = $imprimir;
                break;
          case 14:
                //echo "Evaluacion";
                $evaluacion_crear = $crear;
                $evaluacion_eliminar = $eliminar;
                $evaluacion_guardar = $guardar;
                $evaluacion_listar = $listar;
                $evaluacion_modificar = $modificar;
                $evaluacion_ver = $ver;
                $evaluacion_imprimir = $imprimir;
                break;
          case 15:
                //echo "ReEvaluacion";
                $revaluacion_crear = $crear;
                $revaluacion_eliminar = $eliminar;
                $revaluacion_guardar = $guardar;
                $revaluacion_listar = $listar;
                $revaluacion_modificar = $modificar;
                $revaluacion_ver = $ver;
                $revaluacion_imprimir = $imprimir;
                break;
          case 16:
                //echo "Uta";
                $uta_crear = $crear;
                $uta_eliminar = $eliminar;
                $uta_guardar = $guardar;
                $uta_listar = $listar;
                $uta_modificar = $modificar;
                $uta_ver = $ver;
                $uta_imprimir = $imprimir;
                break;
          case 17:
                //echo "Kinesica adulto";
                $adulto_crear = $crear;
                $adulto_eliminar = $eliminar;
                $adulto_guardar = $guardar;
                $adulto_listar = $listar;
                $adulto_modificar = $modificar;
                $adulto_ver = $ver;
                $adulto_imprimir = $imprimir;
                break;
          case 18:
                //echo "Kinesica traumatologica";
                $trauma_crear = $crear;
                $trauma_eliminar = $eliminar;
                $trauma_guardar = $guardar;
                $trauma_listar = $listar;
                $trauma_modificar = $modificar;
                $trauma_ver = $ver;
                $trauma_imprimir = $imprimir;
                break;
          case 19:
                //echo "Kinesica pediatrica";
                $pediatrica_crear = $crear;
                $pediatrica_eliminar = $eliminar;
                $pediatrica_guardar = $guardar;
                $pediatrica_listar = $listar;
                $pediatrica_modificar = $modificar;
                $pediatrica_ver = $ver;
                $pediatrica_imprimir = $imprimir;
                break;
          case 20:
                //echo "Seguimiento enfermeria";
                $enfermeria_crear = $crear;
                $enfermeria_eliminar = $eliminar;
                $enfermeria_guardar = $guardar;
                $enfermeria_listar = $listar;
                $enfermeria_modificar = $modificar;
                $enfermeria_ver = $ver;
                $enfermeria_imprimir = $imprimir;
                break;
          case 21:
                //echo "Seguimiento UTA";
                $seguta_crear = $crear;
                $seguta_eliminar = $eliminar;
                $seguta_guardar = $guardar;
                $seguta_listar = $listar;
                $seguta_modificar = $modificar;
                $seguta_ver = $ver;
                $seguta_imprimir = $imprimir;
                break;
          case 22:
                //echo "Licencia medica";
                $licmed_crear = $crear;
                $licmed_eliminar = $eliminar;
                $licmed_guardar = $guardar;
                $licmed_listar = $listar;
                $licmed_modificar = $modificar;
                $licmed_ver = $ver;
                $licmed_imprimir = $imprimir;
                break;
          case 23:
                //echo "Licencia extraordinaria";
                $licext_crear = $crear;
                $licext_eliminar = $eliminar;
                $licext_guardar = $guardar;
                $licext_listar = $listar;
                $licext_modificar = $modificar;
                $licext_ver = $ver;
                $licext_imprimir = $imprimir;
                break;
          case 24:
                //echo "Pagos";
                $pagos_crear = $crear;
                $pagos_eliminar = $eliminar;
                $pagos_guardar = $guardar;
                $pagos_listar = $listar;
                $pagos_modificar = $modificar;
                $pagos_ver = $ver;
                $pagos_imprimir = $imprimir;
                break;
          case 25:
                //echo "Gastos";
                $gastos_crear = $crear;
                $gastos_eliminar = $eliminar;
                $gastos_guardar = $guardar;
                $gastos_listar = $listar;
                $gastos_modificar = $modificar;
                $gastos_ver = $ver;
                $gastos_imprimir = $imprimir;
                break;
          case 26:
                //echo "Tarifas";
                $tarifas_crear = $crear;
                $tarifas_eliminar = $eliminar;
                $tarifas_guardar = $guardar;
                $tarifas_listar = $listar;
                $tarifas_modificar = $modificar;
                $tarifas_ver = $ver;
                $tarifas_imprimir = $imprimir;
                break;
          case 27:
                //echo "Cajas";
                $caja_crear = $crear;
                $caja_eliminar = $eliminar;
                $caja_guardar = $guardar;
                $caja_listar = $listar;
                $caja_modificar = $modificar;
                $caja_ver = $ver;
                $caja_imprimir = $imprimir;
                break;
          case 28:
                //echo "Seguimiento URI";
                $seguri_crear = $crear;
                $seguri_eliminar = $eliminar;
                $seguri_guardar = $guardar;
                $seguri_listar = $listar;
                $seguri_modificar = $modificar;
                $seguri_ver = $ver;
                $seguri_imprimir = $imprimir;
                break;
          case 29:
                //echo "Permisos";
                $permisos_crear = $crear;
                $permisos_eliminar = $eliminar;
                $permisos_guardar = $guardar;
                $permisos_listar = $listar;
                $permisos_modificar = $modificar;
                $permisos_ver = $ver;
                $permisos_imprimir = $imprimir;
                break;
          case 30:
                //echo "Uri";
                $uri_crear = $crear;
                $uri_eliminar = $eliminar;
                $uri_guardar = $guardar;
                $uri_listar = $listar;
                $uri_modificar = $modificar;
                $uri_ver = $ver;
                $uri_imprimir = $imprimir;
                break;
          case 31:
                //echo "Especialidades";
                $espe_crear = $crear;
                $espe_eliminar = $eliminar;
                $espe_guardar = $guardar;
                $espe_listar = $listar;
                $espe_modificar = $modificar;
                $espe_ver = $ver;
                $espe_imprimir = $imprimir;
                break;
          case 32:
                //echo "Consultorio";
                $cons_crear = $crear;
                $cons_eliminar = $eliminar;
                $cons_guardar = $guardar;
                $cons_listar = $listar;
                $cons_modificar = $modificar;
                $cons_ver = $ver;
                $cons_imprimir = $imprimir;
                break;
          case 33:
                //echo "Patologias";
                $pat_crear = $crear;
                $pat_eliminar = $eliminar;
                $pat_guardar = $guardar;
                $pat_listar = $listar;
                $pat_modificar = $modificar;
                $pat_ver = $ver;
                $pat_imprimir = $imprimir;
                break;
        }
        } 
      } //end if 
        ?>
        <!-- /FIN FOREACH PERMISOS --------------------------------------------------------------------------- -->
        <?php if($id_area > 0): ?>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Administración</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Usuarios</td>
                      <td>
                           
                          <!-- checkbox usuarios -->
                          <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="crear" <?= $usuario_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="eliminar" <?= $usuario_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="guardar" <?= $usuario_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="imprimir" <?= $usuario_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="listar" <?= $usuario_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="modificar" <?= $usuario_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="usuarios[]" value="ver" <?= $usuario_ver; ?>> 
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="usuario"></span>
                            </div>
                          <!-- /.checkbox usuarios -->
                          
                          
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Áreas</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="crear" <?= $areas_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="eliminar" <?= $areas_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="guardar" <?= $areas_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="imprimir" <?= $areas_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="listar" <?= $areas_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="modificar" <?= $areas_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="areas[]" value="ver" <?= $areas_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="area"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Perfiles</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="crear" <?= $perfiles_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="eliminar" <?= $perfiles_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="guardar" <?= $perfiles_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="imprimir" <?= $perfiles_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="listar" <?= $perfiles_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="modificar" <?= $perfiles_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="perfiles[]" value="ver" <?= $perfiles_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="perfil"></span>
                          </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Roles</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="crear" <?= $roles_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="eliminar" <?= $roles_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="guardar" <?= $roles_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="imprimir" <?= $roles_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="listar" <?= $roles_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="modificar" <?= $roles_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="roles[]" value="ver" <?= $roles_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="rol"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Horarios</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="crear" <?= $horarios_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="eliminar" <?= $horarios_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="guardar" <?= $horarios_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="imprimir" <?= $horarios_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="listar" <?= $horarios_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="modificar" <?= $horarios_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="horarios[]" value="ver" <?= $horarios_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="horario"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>Permisos</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="crear" <?= $permisos_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="eliminar" <?= $permisos_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="guardar" <?= $permisos_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="imprimir" <?= $permisos_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="listar" <?= $permisos_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="modificar" <?= $permisos_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="permisos[]" value="ver" <?= $permisos_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="permiso"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>7.</td>
                      <td>Especialidades</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="crear" <?= $espe_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="eliminar" <?= $espe_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="guardar" <?= $espe_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="imprimir" <?= $espe_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="listar" <?= $espe_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="modificar" <?= $espe_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="especialidades[]" value="ver" <?= $espe_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="especialidad"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Consultorios</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="crear" <?= $cons_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="eliminar" <?= $cons_crear; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="guardar" <?= $cons_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="imprimir" <?= $cons_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="listar" <?= $cons_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="modificar" <?= $cons_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="consultorios[]" value="ver" <?= $cons_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="consultorio"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>Patologías</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="crear" <?= $pat_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="eliminar" <?= $pat_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="guardar" <?= $pat_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="imprimir" <?= $pat_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="listar" <?= $pat_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="modificar" <?= $pat_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="patologias[]" value="ver" <?= $pat_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="patologia"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inscripción</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Inscripciones</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="crear" <?= $ins_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="eliminar" <?= $ins_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="guardar" <?= $ins_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="imprimir" <?= $ins_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="listar" <?= $ins_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="modificar" <?= $ins_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="inscripcion[]" value="ver" <?= $ins_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="inscri"></span>
                          </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Agendar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Agendar evaluación</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="crear" <?= $evaluacion_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="eliminar" <?= $evaluacion_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="guardar" <?= $evaluacion_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="imprimir" <?= $evaluacion_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="listar" <?= $evaluacion_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]"value="modificar" <?= $evaluacion_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="evaluacion[]" value="ver" <?= $evaluacion_ver; ?>> 
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="eval"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Agendar reevaluación</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="crear" <?= $revaluacion_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="eliminar" <?= $revaluacion_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="guardar" <?= $revaluacion_crear; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="imprimir" <?= $revaluacion_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="listar" <?= $revaluacion_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="modificar" <?= $revaluacion_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reevaluacion[]" value="ver" <?= $revaluacion_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="reeva"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Agendar sesiones UTA</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="crear" <?= $uta_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="eliminar" <?= $uta_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="guardar" <?= $uta_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="imprimir" <?= $uta_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="listar" <?= $uta_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="modificar" <?= $uta_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uta[]" value="ver" <?= $uta_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="ut"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Agendar sesiones URI</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="crear" <?= $uri_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="eliminar" <?= $uri_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="guardar" <?= $uri_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="imprimir" <?= $uri_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="listar" <?= $uri_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="modificar" <?= $uri_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="uri[]" value="ver" <?= $uri_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="ur"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Historiales médicos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Kinésica adulto</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="crear" <?= $adulto_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="eliminar" <?= $adulto_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="guardar" <?= $adulto_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="imprimir" <?= $adulto_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="listar" <?= $adulto_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="modificar" <?= $adulto_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="adulto[]" value="ver" <?= $adulto_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="adul"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kinésica traumatológica</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="crear" <?= $trauma_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="eliminar" <?= $trauma_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar </label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="guardar" <?= $trauma_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="imprimir" <?= $trauma_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="listar" <?= $trauma_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="modificar" <?= $trauma_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="traumatologico[]" value="ver" <?= $trauma_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="trauma"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Kinésica pediátrica</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="crear" <?= $pediatrica_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="eliminar" <?= $pediatrica_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="guardar" <?= $pediatrica_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="imprimir" <?= $pediatrica_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="listar" <?= $pediatrica_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="modificar" <?= $pediatrica_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pediatrica[]" value="ver" <?= $pediatrica_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="pedia"></span>
                              </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Atención médica</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Seguimiento enfermería</td>
                      <td>
                          <!-- checkbox -->
                          <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="crear" <?= $enfermeria_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="eliminar" <?= $enfermeria_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="guardar" <?= $enfermeria_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="imprimir" <?= $enfermeria_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="listar" <?= $enfermeria_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="modificar" <?= $enfermeria_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="enfermeria[]" value="ver" <?= $enfermeria_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="enfer"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Sesiones UTA</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="crear" <?= $seguta_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="eliminar" <?= $seguta_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="guardar" <?= $seguta_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="imprimir" <?= $seguta_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="listar" <?= $seguta_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="modificar" <?= $seguta_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguta[]" value="ver" <?= $seguta_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="segut"></span>
                              </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Sesiones URI</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="crear" <?= $seguri_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="eliminar" <?= $seguri_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="guardar" <?= $seguri_guardar; ?> > 
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="imprimir" <?= $seguri_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="listar" <?= $seguri_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="modificar" <?= $seguri_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="seguri[]" value="ver" <?= $seguri_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="segur"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Licencias</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Licencia médica</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="crear" <?= $licmed_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="eliminar" <?= $licmed_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="guardar" <?= $licmed_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="imprimir" <?= $licmed_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="listar" <?= $licmed_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="modificar" <?= $licmed_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licmed[]" value="ver" <?= $licmed_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="lmed"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Licencia extraordinaria</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="crear" <?= $licext_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="eliminar" <?= $licext_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="guardar" <?= $licext_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="imprimir" <?= $licext_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="listar" <?= $licext_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="modificar" <?= $licext_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="licext[]" value="ver" <?= $licext_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="lext"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pagos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Registrar pago</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="crear" <?= $pagos_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="eliminar" <?= $pagos_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="guardar" <?= $pagos_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="imprimir" <?= $pagos_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="listar" <?= $pagos_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="modificar" <?= $pagos_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="pagos[]" value="ver" <?= $pagos_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="pago"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Registrar gasto</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="crear" <?= $gastos_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="eliminar" <?= $gastos_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="guardar" <?= $gastos_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox"name="gastos[]" value="imprimir" <?= $gastos_imprimir; ?> >
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="listar" <?= $gastos_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="modificar" <?= $gastos_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="gastos[]" value="ver" <?= $gastos_ver; ?> >
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="gasto"></span>
                          </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Tarifas</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="crear" <?= $tarifas_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="eliminar" <?= $tarifas_eliminar; ?>>
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="guardar" <?= $tarifas_guardar; ?>>
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="imprimir" <?= $tarifas_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="listar" <?= $tarifas_listar; ?>>
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="modificar" <?= $tarifas_modificar; ?>>
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="tarifas[]" value="ver" <?= $tarifas_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="tarifa"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Caja</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="crear" <?= $caja_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="eliminar" <?= $caja_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="guardar" <?= $caja_guardar; ?> >
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="imprimir" <?= $caja_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="listar" <?= $caja_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="modificar" <?= $caja_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="cajas[]" value="ver" <?= $caja_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="caja"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Reportes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Reportes</td>
                      <td>
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="crear" <?= $reportes_crear; ?> >
                                        <label for="checkboxPrimary1">Crear</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="eliminar" <?= $reportes_eliminar; ?> >
                                        <label for="checkboxPrimary2">Eliminar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="guardar" <?= $reportes_guardar; ?>> 
                                        <label for="checkboxPrimary3">Guardar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="imprimir" <?= $reportes_imprimir; ?>>
                                        <label for="checkboxPrimary3">Imprimir</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="listar" <?= $reportes_listar; ?> >
                                        <label for="checkboxPrimary3">Listar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="modificar" <?= $reportes_modificar; ?> >
                                        <label for="checkboxPrimary3">Modificar</label>
                                      </div>
                                      <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="reportes[]" value="ver" <?= $reportes_ver; ?>>
                                        <label for="checkboxPrimary3">Ver</label>
                                      </div>
                                      <span id="reporte"></span>
                            </div>
                          <!-- /.checkbox -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php endif ?>

      </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   <!-- ================================================================================== -->
 
  </div>
  <!-- /.content-wrapper -->

<?php require_once show_template('footer-basic');?>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
    
</script>

<script>
$("#form-permisos_s").submit(function(e){
    var usuario = document.querySelectorAll("input[name='usuarios[]']:checked");
    var user=[];
    for(var i=0; i<usuario.length; i++){
      user[i]=usuario[i].value;
    }
        $.ajax({
            type: 'POST',
            url: "?/permisos/guardar",
            data: {'usuario':user,},
            dataType: 'json',
            success: function (resp) {
              alert("ingresa ajax");
              if(resp['estado']== 's'){
                  location.href ='?/permisos/guardar';
              }
              else{
                alert("no ingresa");
              }
            }
        });
  });

$(function () {
  $("#id_area").on('change', function() {
    var id_area =  $("#id_area option:selected").val();
    $.ajax({
      url: '?/permisos/listar',
      type: 'POST',
      data: {
        'id_user': id_area,
      },
      success: function(resp) {
          //alertify.success('Se hizo selected');
          alert("se hizo click en select -- " + id_area);
          location.href ='?/permisos/listar/'+id_area;
        
      }
    })
  })

});

$(document).ready(function(){

  $('[name="usuarios[]"]').click(function(){
    var arr_usuarios = $('[name="usuarios[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_usuarios = arr_usuarios.join(',');
    /*$('#usuario').text(JSON.stringify(arr_usuarios));*/
    $('#usuario').text(str_usuarios);
  });

  $('[name="areas[]"]').click(function(){
    var arr_areas = $('[name="areas[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_areas = arr_areas.join(',');
    $('#area').text(str_areas);
  });

  $('[name="perfiles[]"]').click(function(){
    var arr_perfiles = $('[name="perfiles[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_perfiles = arr_perfiles.join(',');
    $('#perfil').text(str_perfiles);
  });

  $('[name="roles[]"]').click(function(){
    var arr_roles = $('[name="roles[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_roles = arr_roles.join(',');
    $('#rol').text(str_roles);
  });

  $('[name="horarios[]"]').click(function(){
    var arr_horarios = $('[name="horarios[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_horarios = arr_horarios.join(',');
    $('#horario').text(str_horarios);
  });

  $('[name="permisos[]"]').click(function(){
    var arr_permisos = $('[name="permisos[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_permisos = arr_permisos.join(',');
    $('#permiso').text(str_permisos);
  });
  
  $('[name="especialidades[]"]').click(function(){
    var arr_especialidades = $('[name="especialidades[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_especialidades = arr_especialidades.join(',');
    $('#especialidad').text(str_especialidades);
  });

  $('[name="consultorios[]"]').click(function(){
    var arr_consultorios = $('[name="consultorios[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_consultorios = arr_consultorios.join(',');
    $('#consultorio').text(str_consultorios);
  });

  $('[name="patologias[]"]').click(function(){
    var arr_patologias = $('[name="patologias[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_patologias = arr_patologias.join(',');
    $('#patologia').text(str_patologias);
  });

  $('[name="inscripcion[]"]').click(function(){
    var arr_inscripcion = $('[name="inscripcion[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_inscripcion = arr_inscripcion.join(',');
    $('#inscri').text(str_inscripcion);
  });

  $('[name="evaluacion[]"]').click(function(){
    var arr_evaluacion = $('[name="evaluacion[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_evaluacion = arr_evaluacion.join(',');
    $('#eval').text(str_evaluacion);
  });

  $('[name="reevaluacion[]"]').click(function(){
    var arr_reevaluacion = $('[name="reevaluacion[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_reevaluacion = arr_reevaluacion.join(',');
    $('#reeva').text(str_reevaluacion);
  });

  $('[name="uta[]"]').click(function(){
    var arr_uta = $('[name="uta[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_uta = arr_uta.join(',');
    $('#ut').text(str_uta);
  });

  $('[name="uri[]"]').click(function(){
    var arr_uri = $('[name="uri[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_uri = arr_uri.join(',');
    $('#ur').text(str_uri);
  });

  $('[name="adulto[]"]').click(function(){
    var arr_adulto = $('[name="adulto[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_adulto = arr_adulto.join(',');
    $('#adul').text(str_adulto);
  });

  $('[name="traumatologico[]"]').click(function(){
    var arr_traumatologico = $('[name="traumatologico[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_traumatologico = arr_traumatologico.join(',');
    $('#trauma').text(str_traumatologico);
  });

  $('[name="pediatrica[]"]').click(function(){
    var arr_pediatrica = $('[name="pediatrica[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_pediatrica = arr_pediatrica.join(',');
    $('#pedia').text(str_pediatrica);
  });

  $('[name="enfermeria[]"]').click(function(){
    var arr_enfermeria = $('[name="enfermeria[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_enfermeria = arr_enfermeria.join(',');
    $('#enfer').text(str_enfermeria);
  });

  $('[name="seguta[]"]').click(function(){
    var arr_seguta = $('[name="seguta[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_seguta = arr_seguta.join(',');
    $('#segut').text(str_seguta);
  });

  $('[name="seguri[]"]').click(function(){
    var arr_seguri = $('[name="seguri[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_seguri = arr_seguri.join(',');
    $('#segur').text(str_seguri);
  });

  $('[name="licmed[]"]').click(function(){
    var arr_licmed = $('[name="licmed[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_licmed = arr_licmed.join(',');
    $('#lmed').text(str_licmed);
  });
  
  $('[name="licext[]"]').click(function(){
    var arr_licext = $('[name="licext[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_licext = arr_licext.join(',');
    $('#lext').text(str_licext);
  });

  $('[name="pagos[]"]').click(function(){
    var arr_pagos = $('[name="pagos[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_pagos = arr_pagos.join(',');
    $('#pago').text(str_pagos);
  });

  $('[name="gastos[]"]').click(function(){
    var arr_gastos = $('[name="gastos[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_gastos = arr_gastos.join(',');
    $('#gasto').text(str_gastos);
  });

  $('[name="tarifas[]"]').click(function(){
    var arr_tarifas = $('[name="tarifas[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_tarifas = arr_tarifas.join(',');
    $('#tarifa').text(str_tarifas);
  });

  $('[name="cajas[]"]').click(function(){
    var arr_cajas = $('[name="cajas[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_cajas = arr_cajas.join(',');
    $('#caja').text(str_cajas);
  });

  $('[name="reportes[]"]').click(function(){
    var arr_reportes = $('[name="reportes[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str_reportes = arr_reportes.join(',');
    $('#reporte').text(str_reportes);
  });


})

function submitForm(){
  alert("ingresa a submitForm");
    var params = {
        id_area: $("#id_area").val(),
        usuario: $("#usuario").text(),
        area: $("#area").text(),
        perfil: $("#perfil").text(),
        rol: $("#rol").text(),
        horario: $("#horario").text(),
        permiso: $("#permiso").text(),
        especialidad: $("#especialidad").text(),
        consultorio: $("#consultorio").text(),
        patologia: $("#patologia").text(),
        inscri: $("#inscri").text(),
        eval: $("#eval").text(),
        reeva: $("#reeva").text(),
        ut: $("#ut").text(),
        ur: $("#ur").text(),
        adul: $("#adul").text(),
        trauma: $("#trauma").text(),
        pedia: $("#pedia").text(),
        enfer: $("#enfer").text(),
        segut: $("#segut").text(),
        segur: $("#segur").text(),
        lmed: $("#lmed").text(),
        lext: $("#lext").text(),
        pago: $("#pago").text(),
        gasto: $("#gasto").text(),
        tarifa: $("#tarifa").text(),
        caja: $("#caja").text(),
        reporte: $("#reporte").text(),
    };
    //var myArray = [ 'hello', 'world' ];

    var paramJson = JSON.stringify(params);

    //var usuario = $("#str").val();
    $.ajax({
      type: "POST",
      url: "?/permisos/guardar",
      data: params,
      //contentType: "application/json; charset=utf-8",
      success: function(data){
        alert(data);
      },
      error: function(){
        alert("Error fatal");
      },
    }); 
  
}
</script>

</body>
</html>