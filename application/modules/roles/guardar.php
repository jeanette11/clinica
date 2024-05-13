<?php

/**
 * Guardar roles
 */

// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['rol']) && isset($_POST['descripcion'])) {
			// Obtiene los datos
			$id_rol = (isset($_POST['id_rol'])) ? clear($_POST['id_rol']) : 0;
			$nom_rol = clear($_POST['rol']);
			$descripcion = clear($_POST['descripcion']);
			
			// Verifica si es creacion o modificacion
			if ($id_rol > 0) {	
				// Instancia el rol para modificar
				$rol = array(
					'rol' => $nom_rol,
					'descripcion' => $descripcion,
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
				);			
				// Modifica el rol
				$db->where('id_rol', $id_rol)->update('ins_roles', $rol);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó el rol con identificador número ' . $id_rol . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));
				
				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									   'mensaje'=>'se modificó los datos del rol'));

				// Redirecciona la pagina
				// redirect('?/roles/listar/' . $id_rol);
			} else {
				//Verifica que no exista el perfil para poder crear otro
				$verifica=$db->query("select * from ins_roles where rol='".$nom_rol."'")->fetch_first();
				if(isset($verifica)){
					//No se puede crear el perfil porque ya existe 
					echo json_encode(array('estado'=>'false',
										   'mensaje'=>'El rol ya existe'));
					exit;
				}else{
					// Instancia el rol para crear
					$rol = array(
						'rol' => $nom_rol,
						'descripcion' => $descripcion,
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
					);
					// Crea el rol
					$id_rol = $db->insert('ins_roles', $rol);

					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó el rol con identificador número ' . $id_rol . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));
					// Crea la notificacion
					set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

					echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo el rol'));

					// Redirecciona la pagina
					//redirect('?/roles/listar');
				}
				
			}
		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Debe ingresar todos los datos necesarios para el rol'));
			// Error 400
			//require_once bad_request();
			//exit;
		}
	} else {
		echo json_encode(array('estado'=>'false',
							   'mensaje'=>'No se puede crear el rol, vuelva a intentarlo'));
		// Redirecciona la pagina
		//redirect('?/roles/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato para el rol'));
	// Error 404
	//require_once not_found();
	//exit;
}

?>