<?php

$id_especialidad = (isset($_params[0])) ? $_params[0] : 0;
// Verifica la cadena csrf
if (isset($id_especialidad)) {
	// Obtiene los parametros
	$id_especialidad = (isset($_params[0])) ? $_params[0] : 0;

// 	// Obtiene el rol
// 	$rol = $db->from('sys_roles')->where('id_rol', $id_rol)->fetch_first();

	// Verifica si existe el rol
	if ($id_especialidad) {
        
        $db->query("UPDATE ins_especialidades SET estado='I' WHERE id_especialidad=$id_especialidad")->execute();

		// Verifica la eliminacion
		if ($db->affected_rows) {
			// Guarda el proceso
			$db->insert('sys_procesos', array(
				'fecha_proceso' => date('Y-m-d'),
				'hora_proceso' => date('H:i:s'),
				'proceso' => 'd',
				'nivel' => 'h',
				'detalle' => 'Se eliminó (Desactivo) la especialidad con identificador número ' . $id_especialidad . '.',
				'direccion' => $_location,
				'usuario_id' => $_user['id_user']
			));
			echo "se elimino la especialidad ".$id_especialidad;
			// Crea la notificacion
			set_notification('success', 'Eliminación exitosa!', 'El registro se eliminó satisfactoriamente.');
		} else {
			// Crea la notificacion
			set_notification('danger', 'Eliminación fallida!', 'El registro no pudo ser eliminado.');
		}

		// Redirecciona la pagina
		redirect('?/especialidades/listar');
	} else {
		// Error 400
		require_once bad_request();
		exit;
	}
} else {
	// Redirecciona la pagina
	redirect('?/especialidades/listar');
}

?>