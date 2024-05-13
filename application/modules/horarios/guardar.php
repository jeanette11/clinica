<?php
/**
 * Guardar especialiades
 */
header('Content-Type: application/json');
// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	//if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['horario']) && isset($_POST['medico']) && isset($_POST['consultorio']) && isset($_POST['dia']) && isset($_POST['hra_ini']) && isset($_POST['hra_fin'])) {
			// Obtiene los datos
			$id_horario = (isset($_POST['id_horario'])) ? clear($_POST['id_horario']) : 0;

			$consultorio = clear($_POST['consultorio']);
			$medico = clear($_POST['medico']);
			$nom_horario = clear($_POST['horario']);
			$dia = clear($_POST['dia']);
			$hra_ini = clear($_POST['hra_ini']);
			$hra_fin = clear($_POST['hra_fin']);
		
			// Verifica si es creacion o modificacion
			if ($id_horario > 0) {		
				// Instancia el horario
				$horario = array(
					'consultorio_id' => $consultorio,
					'user_id' => $medico,
					'horario' => $nom_horario,
					'dia' => $dia,
					'hora_ini' => $hra_ini,
					'hora_fin' => $hra_fin,
					'fecha_mod' => date('Y-m-d H:i:s'),
					'user_mod' => $_user['id_user']
				);		
				// Modifica el horario
				$db->where('id_horario', $id_horario)->update('ins_horarios', $horario);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó el horario con identificador número ' . $id_horario. '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');
				echo json_encode(array('estado'=>'ok',
									   'mensaje'=>'se modificó los datos para el horario'));

				// Redirecciona la pagina
				//redirect('?/horarios/listar/' . $id_horario);
			} else {
				//Verifica que no exista el mismo horario en un consultorio
				//$verifica=$db->query("select * from ins_horarios where consultorio_id='".$consultorio."' and dia='".$dia."' and hora_ini='".$hra_ini."' and hora_fin='".$hra_fin."'")->fetch_first();
				$verifica=$db->query("select * from ins_horarios where consultorio_id='".$consultorio."' and dia='".$dia."' and  hora_ini between '".$hra_ini."' and '".$hra_fin."' and hora_fin between '".$hra_ini."' and '".$hra_fin."' and estado!='I'")->fetch_first();
				if(isset($verifica)){
						// Crea la notificacion
						set_notification('warning', 'Atención!', 'El consultorio ya está ocupado en ese horario, seleccione otro horario.');
						//No se puede crear el horario por que el consultorio no esta disponible en ese horario 
						echo json_encode(array('estado'=>'false',
											   'mensaje'=>'El consultorio ya esta ocupado en ese horario'));
						//exit;
						// Redirecciona la pagina
						//redirect('?/horarios/crear');
				}else{
						// Instancia el horario
						$horario = array(
							'consultorio_id' => $consultorio,
							'user_id' => $medico,
							'horario' => $nom_horario,
							'dia' => $dia,
							'hora_ini' => $hra_ini,
							'hora_fin' => $hra_fin,
							'fecha_reg' => date('Y-m-d H:i:s'),
							'user_reg' => $_user['id_user']
						);

						// Crea horario
						$id_horario = $db->insert('ins_horarios', $horario);

						// Guarda el proceso
						$db->insert('sys_procesos', array(
							'fecha_proceso' => date('Y-m-d'),
							'hora_proceso' => date('H:i:s'),
							'proceso' => 'c',
							'nivel' => 'h',
							'detalle' => 'Se creó el horario con identificador número ' . $id_horario . '.',
							'direccion' => $_location,
							'usuario_id' => $_user['id_user']
						));
										
						// Crea la notificacion
						set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');
						echo json_encode(array('estado'=>'ok',
											   'mensaje'=>'Se creo el horario'));

						// Redirecciona la pagina
						//redirect('?/horarios/listar');
				}
				
			}

		} else {
			set_notification('warning', 'Atención!', 'Ingrese todos los datos necesarios para crear el horario.');
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Se debe ingresar todos los datos'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	/*} else {
		set_notification('warning', 'Atención!', 'No se puede crear el horario vuelve a intentarlo.');
		echo json_encode(array('estado'=>'false',
								'mensaje'=>'No se puede crear el horario, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/horarios/listar');
	}*/
} else {
	set_notification('warning', 'Atención!', 'No ingreso ningun dato para crear el horario.');
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para crear al horario'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>