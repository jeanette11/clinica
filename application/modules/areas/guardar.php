<?php

/**
 * Guardar areas
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['area']) && isset($_POST['descripcion'])) {
			// Obtiene los datos
			$id_area = (isset($_POST['id_area'])) ? clear($_POST['id_area']) : 0;
			$nom_area = clear($_POST['area']);
			$descripcion = clear($_POST['descripcion']);
					
			// Verifica si es creacion o modificacion
			if ($id_area > 0) {	
				// Instancia el area para modificar
				$area = array(
					'area' => $nom_area,
					'descripcion' => $descripcion,
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
				);		
				// Modifica el rol
				$db->where('id_area', $id_area)->update('ins_area', $area);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó el área con identificador número ' . $id_area . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									'mensaje'=>'se modificó los datos del area'));

				// Redirecciona la pagina
				//redirect('?/areas/listar/' . $id_area);
			} else {
				//Verifica que no exista el area para poder crearla
				$verifica=$db->query("select * from ins_area where area='".$nom_area."'")->fetch_first();
				if(isset($verifica)){
					//No se puede crear el area porque ya existe 
					echo json_encode(array('estado'=>'false',
											'mensaje'=>'El área ya existe'));
					exit;
				}else{
					// Instancia el area para crear
					$area = array(
						'area' => $nom_area,
						'descripcion' => $descripcion,
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
					);
					// Crea el area
					$id_area = $db->insert('ins_area', $area);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó el rol con identificador número ' . $id_area . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));
					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo el área'));

					// Redirecciona la pagina
					redirect('?/areas/listar');

				}
				
			}

		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Debe ingresar todos los datos necesarios para el área'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	} else {
		echo json_encode(array('estado'=>'false',
							   'mensaje'=>'No se puede crear el área, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/areas/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para el área'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>