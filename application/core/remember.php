<?php
//session_destroy();
// Verifica si la variable de sesion existe
if (isset($_SESSION[user])){
	// Redirecciona al modulo index
	redirect(index_admin);
} else {
	// Verifica si la cookie ha caducado
	if (isset($_COOKIE[remember])) {
		// Obtiene los parametros
		$remember = explode('|', $_COOKIE[remember]);
		$username = $remember[0];
		$password = $remember[1];
		$locale = $remember[2];

		// Obtiene los datos del usuario
		$user = $db->select('id_user, area_id')->from('ins_usuarios')->open_where()->where('md5(username)', $username)->or_where('md5(email)', $username)->close_where()->where(array('password' => $password, 'active' => 's'))->fetch_first();
		// Verifica la existencia del usuario
		if ($user) {
			// Instancia la variable de sesion con los datos del usuario
			$_SESSION[user] = $user;

			// Instancia la variable de sesion con la ubicacion
			$_SESSION[locale] = $locale;

			// Instancia la variable de sesion con el tiempo de inicio de sesion
			$_SESSION[time] = time();

			// Redirecciona a la pagina principal
			redirect(index_admin);
		}
	}
}

?>