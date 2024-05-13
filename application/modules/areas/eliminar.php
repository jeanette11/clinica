<?php

$id_area = (isset($_params[0])) ? $_params[0] : 0;
// Verifica la cadena csrf
if (isset($id_area)) {
	// Obtiene los parametros
	$id_area = (isset($_params[0])) ? $_params[0] : 0;

// 	// Obtiene el rol
// 	$rol = $db->from('sys_roles')->where('id_rol', $id_rol)->fetch_first();

	// Verifica si existe el area
	if ($id_area) {
        
        $db->query("UPDATE ins_area SET estado='I' WHERE id_area=$id_area")->execute();

		// Verifica la eliminacion
		if ($db->affected_rows) {
			// Guarda el proceso
			$db->insert('sys_procesos', array(
				'fecha_proceso' => date('Y-m-d'),
				'hora_proceso' => date('H:i:s'),
				'proceso' => 'd',
				'nivel' => 'h',
				'detalle' => 'Se eliminó (Desactivo) el área con identificador número ' . $id_area . '.',
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
		redirect('?/areas/listar');
	} else {
		// Error 400
		require_once bad_request();
		exit;
	}
} else {
	// Redirecciona la pagina
	redirect('?/areas/listar');
}

?>