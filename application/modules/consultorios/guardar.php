<?php

/**
 * Guardar consultorios
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['consultorio']) && isset($_POST['especialidad'])) {
			// Obtiene los datos
			$id_consultorio = (isset($_POST['id_consultorio'])) ? clear($_POST['id_consultorio']) : 0;
			$nom_consultorio = clear($_POST['consultorio']);
			$especialidad = clear($_POST['especialidad']);
		
			// Verifica si es creacion o modificacion
			if ($id_consultorio > 0) {		
				// Instancia el consultorio
				$consultorio = array(
					'consultorio' => $nom_consultorio,
					'especialidad_id' => $especialidad,
					'fecha_mod' => date('Y-m-d H:i:s'),
					'user_mod' => $_user['id_user']
				);		
				// Modifica el consutorio
				$db->where('id_consultorio', $id_consultorio)->update('ins_consultorios', $consultorio);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó el consultorio con identificador número ' . $id_consultorio . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									   'mensaje'=>'se modificó los datos del consultorio'));

				// Redirecciona la pagina
				//redirect('?/consultorios/listar/' . $id_consultorio);
			} else {
				//Verifica que no exista la especialidad para poder crear otro
				$verifica=$db->query("select * from ins_consultorios where consultorio='".$nom_consultorio."'")->fetch_first();
				if(isset($verifica)){
					//No se puede crear el consultorio porque ya existe 
					echo json_encode(array('estado'=>'false',
					'mensaje'=>'El consultorio ya  existe'));
					exit;
				}else{
					// Instancia el consultorio
					$consultorio = array(
						'consultorio' => $nom_consultorio,
						'especialidad_id' => $especialidad,
						'fecha_reg' => date('Y-m-d H:i:s'),
						'user_reg' => $_user['id_user']
					);

					// Crea consultorio
					$id_consultorio = $db->insert('ins_consultorios', $consultorio);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó el consultorio con identificador número ' . $id_consultorio . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));
					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');
					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo el consultorio'));

					// Redirecciona la pagina
					//redirect('?/consultorios/listar');
				}
				
			}

		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Se debe ingresar todos los datos'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	} else {
		echo json_encode(array('estado'=>'false',
								'mensaje'=>'No se puede crear el consultorio, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/consultorios/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para el consultorio'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>