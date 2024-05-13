<?php

/**
 * Guardar especialiades
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['especialidad']) && isset($_POST['descripcion'])) {
			// Obtiene los datos
			$id_especialidad = (isset($_POST['id_especialidad'])) ? clear($_POST['id_especialidad']) : 0;
			$nom_especialidad = clear($_POST['especialidad']);
			$descripcion = clear($_POST['descripcion']);
		
			echo "id_especialidad: ".$id_especialidad;
			// Verifica si es creacion o modificacion
			if ($id_especialidad > 0) {		
				// Instancia la especialidad
				$especialidad = array(
					'especialidad' => $nom_especialidad,
					'descripcion' => $descripcion,
					'fecha_mod' => date('Y-m-d H:i:s'),
					'user_mod' => $_user['id_user']
				);		
				// Modifica la especialidad
				$db->where('id_especialidad', $id_especialidad)->update('ins_especialidades', $especialidad);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó la especialidad con identificador número ' . $id_especialidad . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									   'mensaje'=>'se modificó los datos de la especialidad'));

				// Redirecciona la pagina
				//redirect('?/especialidades/listar/' . $id_especialidad);
			} else {
				//Verifica que no exista la especialidad para poder crear otro
				$verifica=$db->query("select * from ins_especialidades where especialidad='".$nom_especialidad."'")->fetch_first();
				if(isset($verifica)){
						//No se puede crear la especialidad porque ya existe 
						echo json_encode(array('estado'=>'false',
						'mensaje'=>'La especialidad ya  existe'));
						exit;
				}else{
					// Instancia la especialidad
					$especialidad = array(
						'especialidad' => $especialidad,
						'descripcion' => $descripcion,
						'fecha_reg' => date('Y-m-d H:i:s'),
						'user_reg' => $_user['id_user']
					);

					// Crea especialidad
					$id_especialidad = $db->insert('ins_especialidades', $especialidad);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó la especialidad con identificador número ' . $id_area . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));

					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo la especialidad'));

					// Redirecciona la pagina
					//redirect('?/especialidades/listar');
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
								'mensaje'=>'No se puede crear la especialidad, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/especialidades/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para la especialidad'));
	// Error 404
	//equire_once not_found();
	//exit;
}

?>