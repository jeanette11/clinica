<?php

// Verifica si la variable de sesion existe
if (isset($_SESSION[user])) {
	// Obtiene el id del usuario
	$id_usuario = $_SESSION[user]['id_user'];

	// Obtiene el estado
	$estado = $_SESSION[user]['visible'];

	// Instancia el usuario
	$usuario = array(
		'logout' => date('Y-m-d H:i:s')
	);

	// Actualiza la ultima salida del usuario
	$db->where('id_user', $id_usuario)->update('ins_usuarios', $usuario);

	// Verifica el estado
	if ($estado == 's') {
		// Guarda el proceso
		$db->insert('sys_procesos', array(
			'fecha_proceso' => date('Y-m-d'),
			'hora_proceso' => date('H:i:s'),
			'proceso' => 'r',
			'nivel' => 'm',
			'detalle' => 'Se finalizó la sesión del usuario con identificador número ' . $id_usuario . '.',
			'direccion' => $_location,
			'usuario_id' => $id_usuario,
		));
	    $db->insert('sys_users_historial', array(
			'user_id' => $id_usuario,
			'login_at_fecha' =>'0000-00-00',
			'login_at_hora' =>'00:00:00',
			'logout_at_fecha' => date('Y-m-d'),
			'logout_at_hora' =>  date('H:i:s'),
			'fecha_inicio' => '0000-00-00 00:00:00',
			'fecha_fin' => date('Y-m-d H:i:s'),
			'direccion' => $_location,
		));	
	}

	// Elimina las variables de sesion
	foreach ($_SESSION as $clave => $valor) {
		$proyecto = explode('-', $clave);
		$proyecto = end($proyecto);
		if ($proyecto == name_project) {
			unset($_SESSION[$clave]);
		}
	}

	// Elimina la variable recuerdame
	setcookie(remember, '', time());

	// Destruye la variable de sesion *****************
	session_destroy();
}

// Redirecciona a la pagina de inicio
redirect(index_public);

?>