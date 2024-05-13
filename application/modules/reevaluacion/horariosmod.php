<?php
header('Content-Type: application/json');

if (is_post()) {
    //echo "ingresa a horarios2";
    if(isset($_POST['codigo']) ){
        
        $horario = $db->query("select ag.id_reserva, concat(us.nombres,' ',us.primer_apellido) as profesional, ag.doctor_id, ag.consultorio_id, ag.horario_id, ag.hora_inicio, ag.hora_fin from sys_agenda_eva ag, ins_usuarios us where us.id_user=ag.doctor_id and ag.id_reserva='".$_POST['codigo']."'")->fetch_first();
        //echo "datos recibidos";
        if($horario){
            echo '<div class="col-6">
                        <div class="form-group">
                            <label>Especialista</label>                
                            <select id="especialista" name="especialista" class="form-control"><option value="'.$horario['doctor_id'].'" selected>'.$horario['profesional'].'</option></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Horarios disponibles: </label>         
                            <select id="horas_disp" name="horas_disp" class="form-control"><option value="'.$horario['horario_id'].'" selected>'.$horario['hora_inicio'].' -- '.$horario['hora_fin'].'</option></select>
                        </div>
                    </div>';
        }else{
            echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Ateción!</h5>
                    hubó un error, consulte con el administrador
                  </div>';
        }
        echo "ingresa a horariosmod";
        
        
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