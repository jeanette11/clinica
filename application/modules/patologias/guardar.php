<?php

/**
 * Guardar patologia
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['patologia']) && isset($_POST['descripcion'])) {
			// Obtiene los datos
			$id_patologia = (isset($_POST['id_patologia'])) ? clear($_POST['id_patologia']) : 0;
			$nom_patologia = clear($_POST['patologia']);
			$descripcion = clear($_POST['descripcion']);
					
			// Verifica si es creacion o modificacion
			if ($id_patologia > 0) {	
				// Instancia la patologia para modificar
				$patologia = array(
					'patologia' => $nom_patologia,
					'descripcion' => $descripcion,
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
				);		
				// Modifica el la patologia
				$db->where('id_patologia', $id_patologia)->update('ins_patologia', $patologia);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó la patología con identificador número ' . $id_patologia . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									'mensaje'=>'se modificó los datos de la patologia'));

				// Redirecciona la pagina
				//redirect('?/areas/listar/' . $id_area);
			} else {
				//Verifica que no exista la patologia para poder crearla
				$verifica=$db->query("select * from ins_patologia where patologia='".$nom_patologia."'")->fetch_first();
				if(isset($verifica)){
					//No se puede crear la patologia porque ya existe 
					echo json_encode(array('estado'=>'false',
											'mensaje'=>'La patología ya existe'));
					exit;
				}else{
					// Instancia la patologia para crear
					$patologia = array(
						'patologia' => $nom_patologia,
						'descripcion' => $descripcion,
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
					);
					// Crea la patologia
					$id_patologia = $db->insert('ins_patologia', $patologia);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó la patología con identificador número ' . $id_patologia . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));
					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo la patología'));

					// Redirecciona la pagina
					//redirect('?/patologias/listar');

				}
				
			}

		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Debe ingresar todos los datos necesarios para la patología'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	} else {
		echo json_encode(array('estado'=>'false',
							   'mensaje'=>'No se puede crear la patología, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/areas/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para la patología'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>