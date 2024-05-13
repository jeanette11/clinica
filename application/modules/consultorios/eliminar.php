<?php

$id_consultorio = (isset($_params[0])) ? $_params[0] : 0;
// Verifica la cadena csrf
if (isset($id_consultorio)) {
	// Obtiene los parametros

	// Verifica si existe el consultorio
	if ($id_consultorio) {
        
        $db->query("UPDATE ins_consultorios SET estado='I' WHERE id_consultorio=$id_consultorio")->execute();

		// Verifica la eliminacion
		if ($db->affected_rows) {
			// Guarda el proceso
			$db->insert('sys_procesos', array(
				'fecha_proceso' => date('Y-m-d'),
				'hora_proceso' => date('H:i:s'),
				'proceso' => 'd',
				'nivel' => 'h',
				'detalle' => 'Se eliminó (Desactivo) el consultorio con identificador número ' . $id_consultorio . '.',
				'direccion' => $_location,
				'usuario_id' => $_user['id_user']
			));
			echo "se elimino el consultorio ".$id_consultorio;
			// Crea la notificacion
			set_notification('success', 'Eliminación exitosa!', 'El registro se eliminó satisfactoriamente.');
		} else {
			// Crea la notificacion
			set_notification('danger', 'Eliminación fallida!', 'El registro no pudo ser eliminado.');
		}

		// Redirecciona la pagina
		redirect('?/consultorios/listar');
	} else {
		// Error 400
		require_once bad_request();
		exit;
	}
} else {
	// Redirecciona la pagina
	redirect('?/consultorios/listar');
}

?>