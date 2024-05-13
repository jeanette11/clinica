<?php

$id_usuario = (isset($_params[0])) ? $_params[0] : 0;
// Verifica la cadena csrf
if (isset($id_usuario)) {
	// Obtiene los parametros
	$id_usuario = (isset($_params[0])) ? $_params[0] : 0;

// 	// Obtiene el rol
// 	$rol = $db->from('sys_roles')->where('id_rol', $id_rol)->fetch_first();

	// Verifica si existe el rol
	if ($id_usuario) {
        
        $db->query("UPDATE ins_usuarios SET estado='I' WHERE id_user=$id_usuario")->execute();

		// Verifica la eliminacion
		if ($db->affected_rows) {
			// Guarda el proceso
			$db->insert('sys_procesos', array(
				'fecha_proceso' => date('Y-m-d'),
				'hora_proceso' => date('H:i:s'),
				'proceso' => 'd',
				'nivel' => 'h',
				'detalle' => 'Se eliminó (Desactivo) el usuario con identificador número ' . $id_usuario . '.',
				'direccion' => $_location,
				'usuario_id' => $_user['id_user']
			));

			// Crea la notificacion
			set_notification('success', 'Eliminación exitosa!', 'El registro se eliminó satisfactoriamente.');
		} else {
			// Crea la notificacion
			set_notification('danger', 'Eliminación fallida!', 'El registro no pudo ser eliminado.');
		}

		// Redirecciona la pagina
		redirect('?/usuarios/listar');
	} else {
		// Error 400
		require_once bad_request();
		exit;
	}
} else {
	// Redirecciona la pagina
	redirect('?/usuarios/listar');
}

?>