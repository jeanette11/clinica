<?php
//Verifica la peticion post
if(is_post()){
    //Verifica la existencia de datos recibidos
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['locale'])){
        //obtiene los datos
        $username = clear($_POST['username']);
        $password = $_POST['password'];
        $remember = clear(isset($_POST['remember'])) ? 1:0;
        $locale = clear($_POST['locale']);

        //Encripta la contraseña para compararla en la base de datos
		//$username = md5($username);
		$password = encrypt($password);
        $usuario = $db->select('id_user, rol_id, area_id, visible')->from('ins_usuarios')->open_where()->where('username',$username)->close_where()->where(array('password'=> $password,'active' => 's'))->fetch_first();

        if($usuario){
                // Obtiene el id del usuario
				$id_usuario = $usuario['id_user'];
				$id_rol = $usuario['rol_id'];
                $id_area = $usuario['area_id'];

				// Obtiene el estado
				$estado = $usuario['visible'];
			
				// Instancia la variable de sesion con los datos del usuario
				$_SESSION[user] = $usuario;

				// Instancia la variable de sesion con la ubicacion
				$_SESSION[locale] = $locale;

				// Instancia la variable de sesion con el tiempo de inicio de sesion
				$_SESSION[time] = time();

				// Instancia la variable de sesion con los datos de la gestion
				$_SESSION[gest] = $gestion;
				//var_dump($_SESSION[gest]);exit();

				// Verifica si fue marcado la casilla recuerdame
				if ($remember == 1) {
					setcookie(remember, $username . '|' . $password . '|' . $locale, time() + (60 * 60 * timecookie)); 
				} else {
					setcookie(remember, '', time());
				}

                // Instancia el usuario
				$usuario = array(
					'login' => date('Y-m-d H:i:s'),
					'logout' => '0000-00-00 00:00:00'
				);

				// Actualiza el ultimo ingreso del usuario
				$db->where('id_user', $id_usuario)->update('ins_usuarios', $usuario);

				// Verifica el estado
				if ($estado == 's') {
					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'r',
						'nivel' => 'h',
						'detalle' => 'Se autenticó los datos del usuario con identificador número ' . $id_usuario . '.',
						'direccion' => $_location,
						'usuario_id' => $id_usuario,
					));
					
					
					// Guarda historial de inicio de sesion
					$db->insert('sys_users_historial', array(
						'user_id' => $id_usuario,
						'login_at_fecha' => date('Y-m-d'),
						'login_at_hora' => date('H:i:s'),
						'logout_at_fecha' => '0000-00-00',
						'logout_at_hora' => '00:00:00',
						'fecha_inicio' => date('Y-m-d H:i:s'),
						'fecha_fin' => '0000-00-00 00:00:00',
						'direccion' => $_location,
					));
				}

                //ingresa a la pantalla principal
                redirect(index_admin);
        }else{
             // Crea la notificacion
             set_notification('warning', 'Atención!', 'La información enviada no coincide con los registros, asegurese de escribir correctamente sus datos.');

             // Redirecciona al modulo index con error
             redirect('?/sitio/ingresar');
        }

    }else{
         // Crea la notificacion
         set_notification('warning', 'Atención!', 'Ingrese los datos correctos.');

         // Redirecciona al modulo index con error
         redirect('?/sitio/ingresar');
    }
}else{
     // Crea la notificacion
     set_notification('warning', 'Atención!', 'No ingreso todos los datos.');

     // Redirecciona al modulo index con error
     redirect('?/sitio/ingresar');
}
?>