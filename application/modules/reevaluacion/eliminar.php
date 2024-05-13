<?php
header('Content-Type: application/json');
$id_reserva = (isset($_params[0])) ? $_params[0] : 0;

if(is_post()){
	if (isset($id_reserva)) {
		// Obtiene el parametro de id_reserva
		$id_reserva = (isset($_POST['codigo'])) ? $_POST['codigo'] : 0;
		
		// Verifica si existe id_reserva
		if ($id_reserva) {

			$db->query("UPDATE sys_agenda_eva SET estado='I' WHERE id_reserva=$id_reserva")->execute();
			//Verifica la eliminación
			if($db->affected_rows){
				//Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'd',
					'nivel' => 'h',
					'detalle' => 'Se eliminó (Desactivo) la reserva con identificador número ' . $id_reserva . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				// Crea la notificacion
				//set_notification('success', 'Eliminación exitosa!', 'El registro se eliminó satisfactoriamente.');
				echo json_encode(array('estado'=>'ok',
						'mensaje'=>'se eliminó la reserva'));

			}else{
				// Crea la notificacion
				//set_notification('danger', 'Eliminación fallida!', 'El registro no pudo ser eliminado.');
				echo json_encode(array('estado'=>'false',
									   'mensaje'=>'Eliminación fallida!'));
			}

			
		}else{
			echo json_encode(array('estado'=>'false',
						'mensaje'=>'NO existe id_reserva',
						'parametros' => $id_reserva));
		}
	}else{
		echo json_encode(array('estado'=>'false',
						'mensaje'=>'No recibe parametro id_reserva'));
	}

}else{
	echo json_encode(array('estado'=>'false',
						'mensaje'=>'no ingresa a is_post'));
}


?>