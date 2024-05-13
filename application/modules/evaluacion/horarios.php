<?php
header('Content-Type: application/json');
$datos = array();
$horas = array(); //creamos un array
if (is_post()) {
    //echo "ingresa a horarios2";
    if(isset($_POST['consultorio']) && isset($_POST['dia']) && isset($_POST['fecha'])){
        
        $horarios = $db->query("select con.consultorio, concat(us.nombres,' ',us.primer_apellido) as profesional, ho.dia, ho.hora_ini, ho.hora_fin, ho.id_horario, ho.consultorio_id, us.id_user
        from ins_horarios AS ho
        INNER JOIN ins_consultorios AS con ON con.especialidad_id='1' AND con.id_consultorio = ho.consultorio_id AND con.id_consultorio = '".$_POST['consultorio']."'
        INNER JOIN ins_usuarios AS us ON ho.user_id = us.id_user AND ho.dia = '".$_POST['dia']."' AND ho.id_horario NOT IN (SELECT horario_id from sys_agenda_eva where dia = '".$_POST['dia']."' and fecha_prog='".$_POST['fecha']."' and estado!='I')")->fetch();
        //echo "datos recibidos";
        $value ='';
        $especialista= '';
        if(count($horarios)>0){
            foreach ($horarios as $horario){
                $horas[] = array('consultorio'=> $horario['consultorio_id'], 
                          'profesional'=> $horario['profesional'],
                          'dia'=> $horario['dia'], 
                          'hora_ini'=> $horario['hora_ini'],
                          'hora_fin' => $horario['hora_fin'],
                          'id_horario' => $horario['id_horario'],
                           );
                           $value = $value.'<option value="'.$horario['id_horario'].'">'.$horario['hora_ini'].' -- '.$horario['hora_fin'].'</option>';
                           $especialista = '<option value="'.$horario['id_user'].'">'.$horario['profesional'].'</option>';
     
            }
            echo '<div class="col-6">
                    <div class="form-group">
                        <label>Especialista</label>                
                        <select id="especialista" name="especialista" class="form-control">'.$especialista.'</select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Horarios disponibles: </label>         
                        <select id="horas_disp" name="horas_disp" class="form-control">'.$value.'</select>
                    </div>
                </div>';
        }else{
            echo '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Ateción!</h5>
                        No hay horarios disponibles para este consultorio.
                  </div>';
        }
        
    }else{
        // Error 400
		echo "No recibe datos";
		require_once bad_request();
		exit;
    }
}else{
    // Error 404
	echo "No recibe ningun parametro";
	require_once not_found();
	exit;
}
?>