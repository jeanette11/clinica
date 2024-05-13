<?php

/**
 * Guardar roles
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['perfil']) && isset($_POST['descripcion'])) {
			// Obtiene los datos
			$id_perfil = (isset($_POST['id_perfil'])) ? clear($_POST['id_perfil']) : 0;
			$nom_perfil = clear($_POST['perfil']);
			$descripcion = clear($_POST['descripcion']);
						
			// Verifica si es creacion o modificacion
			if ($id_perfil > 0) {	
				// Instancia el perfil para modificar
				$perfil = array(
					'perfil' => $nom_perfil,
					'descripcion' => $descripcion,
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
				);			
				// Modifica el perfil
				$db->where('id_perfil', $id_perfil)->update('ins_perfil', $perfil);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó el perfil con identificador número ' . $id_perfil . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									'mensaje'=>'se modificó los datos del perfil profesional'));

				// Redirecciona la pagina
				//redirect('?/perfiles/listar/' . $id_perfil);
			} else {
				//Verifica que no exista el perfil para poder crear otro
				$verifica=$db->query("select * from ins_perfil where perfil='".$nom_perfil."'")->fetch_first();
				if(isset($verifica)){
						//No se puede crear el perfil porque ya existe 
						echo json_encode(array('estado'=>'false',
												'mensaje'=>'El perfil ya existe'));
						exit;
				}else{
					// Instancia el perfil para crear
					$perfil = array(
						'perfil' => $nom_perfil,
						'descripcion' => $descripcion,
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
					);

					// Crea el perfil
					$id_perfil = $db->insert('ins_perfil', $perfil);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó el perfil con identificador número ' . $id_perfil . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));	
					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo el perfil'));

					// Redirecciona la pagina
					//redirect('?/perfiles/listar');
				}
							
			}
		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Debe ingresar todos los datos necesarios para el perfil'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	} else {
		echo json_encode(array('estado'=>'false',
							   'mensaje'=>'No se puede crear el perfil, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/perfiles/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para el perfil'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>