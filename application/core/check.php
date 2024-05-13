<?php

// Obtiene los permisos
$_menus = $db->select('m.modulo, group_concat(p.archivos) as archivos')
->from('sys_permisos p')
->join('sys_menus m', 'p.menu_id = m.id_menu')
->where(array('p.area_id' => $_SESSION[user]['area_id'], 'm.id_menu != ' => 0,  'p.archivos != ' => ''))
->group_by('m.modulo')->fetch();

// Define el estado de autorizacion de un modulo
$_is_module = false;

// Define el grupo de archivos de un modulo
$_views = '';

// Recorre y verifica si tiene acceso al modulo 
foreach ($_menus as $_menu) {
	if ($_menu['modulo'] == $_module) {
		$_is_module = true;
		$_views = $_menu['archivos'];
		break;
	}
}

// Desglosa las carpetas accesibles sin permisos  
$_folder_allow = explode(',', folder_allow);
//print_r($_module);
// Verifica si tiene acceso al modulo
if (!$_is_module && !in_array($_module, $_folder_allow)) {
	// Error 401
	require_once bad_request();
	exit;
} else {
	// Obtiene las vistas
	$_views = explode(',', $_views);

	// Verifica si tiene acceso a la vista
	if (!in_array($_file, $_views) && !in_array($_module, $_folder_allow)) {
		// Error 401
		
		require_once bad_request();
		exit;
	}
}

// Recupera la variable
$_modules = modules;

//echo "-module ".$_modules;


// Obtiene los  datos del usuario $_user = palabra reservada
$_user = $db->select('u.*, r.*')->from('ins_usuarios u')->join('ins_area r', 'u.area_id = r.id_area', 'left')->where('u.id_user', $_SESSION[user]['id_user'])->fetch_first();
//$_user = $db->select('u.*, r.*, p.*')->from('sys_users u')->join('ins_area r', 'u.area_id = r.id_area', 'left')->join('sys_persona p', 'u.id_user = p.id_persona', 'left')->where('u.id_user', $_SESSION[user]['id_user'])->fetch_first();

?>