<?php  
// Configuracion encabezados no-cache
header('Cache-Control: private, no-store, no-cache, must-revalidate, post-check = 0, pre-check = 0');
header('Expires: -1000');
header('Pragma: no-cache'); 

// Configuracion de la zona horaria
date_default_timezone_set('America/La_Paz');

// Ambiente de trabajo production/development
define('environment', 'development');

// Directorios principales
define('app', name_app);
define('project', '../' . name_project);

// Rutas globales
define('ip_server', 'http://localhost');
define('ip_local', ip_server . ':9000/');

// Directorios privados de la aplicacion
define('configuration', app . '/configuration'); 
define('core', app . '/core');
define('libraries', app . '/libraries');
define('modules', app . '/modules');
define('storages', app . '/storages');
define('templates', app . '/templates');
define('files', project . '/files');
define('assets', project . '/assets');
define('logos', files . '/logos');

// Directorios publicos de la aplicacion
define('css', assets . '/css'); 
define('js', assets . '/js');
define('imgs', assets . '/imgs'); 
define('fonts', assets . '/fonts');
define('media', assets . '/media');
define('themes', assets . '/themes');  

// Paginas principales
/*define('home', 'principal');
define('site', 'sitio');
define('folder_allow', 'principal,perfil,generador-modulos,generador-menus,asignador-permisos,administrador-procesos');
define('index_private_docente', '?/' . home . '/docente');
define('index_private', '?/' . home . '/escritorio'); 
define('index_public', '?/' . site . '/ingresar');*/


// Paginas principales
define('site', 'sitio');
define('home', 'administracion');
define('admin', 'inscripcion');
define('agen', 'agendar');
define('hist', 'historial');
define('aten', 'atencion');
define('lic', 'licencias');
define('pag', 'pagos');
define('repor', 'reportes');
define('folder_allow', 'principal,perfil,generador-modulos,generador-menus,asignador-permisos,administrador-procesos,usuarios');
define('index_public', '?/' . site . '/ingresar');
define('index_admin', '?/' . home . '/principal');


// Variables de sesiones
define('user', 'user-' . name_project); 
define('gest', 'gest-' . name_project);
define('locale', 'locale-' . name_project);  
define('time', 'time-' . name_project);
define('csrf', 'csrf-' . name_project);
define('temporary', 'temporary-' . name_project);

// Variables para cookies
define('remember', 'remember-' . name_project); 

// Variables de seguridad
define('secret', '1nV3Nt4r105');
define('timesession', 8);
define('timecookie', 8);

//Conectarnos a la base de datos del dominio que viene
$dominio = $_SERVER['SERVER_NAME'];
$nombre_dominio = explode('.', $dominio);

// Variables de dominio
define('dominio', $dominio); 
define('nombre_dominio_', $nombre_dominio[0]); 


define('host', 'localhost'); //
define('username', 'root');
define('password', '');
define('database', 'bd_citas');
define('port', '3306'); 


// Variables de servidores remotos
define('ip', 'torredeagua.com');
define('apache_server', 'https://' . ip);
define('nodejs_server', 'https://' . ip . ':3000');
define('locale_server', 'https://localhost:9000');
define('api_key_firebase', 'AAAAbtTeWDU:APA91bHhfoCQ9wIXEQqTw4W0FPqK556l_9fc73q1LWHzWUHtl8ZXPSwjfBErfe1b9mbwNmkR7wpHA8ORvepe31hUWu2pU6tn-e6y3IYDwHomwqxqfANXwPqnhzTyg990gSqt-p3uR3hb');
