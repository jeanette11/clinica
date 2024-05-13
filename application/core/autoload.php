<?php

// Configuracion reporte de errores
if (environment == 'production') { 
	error_reporting(0);
} else {
	error_reporting(E_ALL);
}

// Inicia el buffer
ob_start();

// Cambia max de input (cantidad de input registrado)
ini_set('max_input_vars', 100000);

// Obtiene la uri
$_url = $_SERVER['REQUEST_URI'];
//print_r($_url);

// Desglosa la url para calcular el nro de partes
$_url = explode('?', $_url);

// Verifica si la url tiene 2 partes
if (sizeof($_url) != 2) {
	// Si la url no tiene 2 partes, redirecciona al modulo index
    redirect(index_public);
} else {
    // Si la url tiene 2 partes, elimina la primera
	array_shift($_url);

	
	// Obtiene la nueva url
	$_url = $_url[0];

    // Verifica si la url cumple con el formato de la expresion regular
	if (preg_match('/^(\/[a-z0-9-]+){2,}$/', $_url)) {
        // Desglosa la url
        $_url = explode('/', $_url);
        // Elimina las partes vacias
		array_shift($_url);

		// Obtiene el modulo y el archivo
		$_module = array_shift($_url);
		$_file = array_shift($_url);

		// Almacena la direcion actual
		$_location = '?/' . $_module . '/' . $_file;

		// Almacena los parametros $_params = palabra reservada
		$_params = $_url;

		// Genera las direciones del modulo y el fichero
		$_url_module = modules . '/' . $_module;
		$_url_file = modules . '/' . $_module . '/' . $_file . '.php';
		
        // Verifica si existe el modulo y si existe el fichero
        if (file_exists($_url_module) && is_readable($_url_file)){
            // Inicia las sesiones
            session_start();
            // Carga la base de datos
			require_once configuration . '/database.php';
            // Genera la vista
			if ($_module != site){
				// Carga las configuraciones
				require_once core . '/session.php';
				require_once core . '/check.php';
			} else {
				if ($_file == 'ingresar') {
					// Importa el archivo de recuerdame
					require_once core . '/remember.php';
				}
			}
           	// Carga el fichero
			require_once $_url_file;
        }else{
            // Error 404
			//require_once not_found();
			echo "1 mostrar template Error 404";	
			exit;
        }
    }else{
        // Error 404
		echo "2 mostrar template Error 404";
		require_once not_found();
		exit;
    }
}

// Limpia el buffer imprimiendo la salida
ob_flush();

?>