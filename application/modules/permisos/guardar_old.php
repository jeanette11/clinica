<?php
echo "ingresa a guardar permisos";
// Crea la notificacion
//set_notification('success', 'Eliminación exitosa!', 'El registro se eliminó satisfactoriamente.');
/*$usuarios = [];
if(!empty($_POST["usuario"])){
    $usuarios=implode(",",$_POST["usuario"]);
    
    set_notification('success', 'Eliminación exitosa!', 'El permiso se guardo satisfactoriamente.');
    echo json_encode(array('estado'=>'s',
										'mensaje'=>'Se guardo correctamente los permisos',
										'datos'=>$usuarios));
    printf($usuarios);

}else{
    echo "vacio";
}*/

// Verifica la peticion post
if (is_post()) {
    // Verifica la cadena csrf
    if (isset($_POST[get_csrf()])) {
        if(!empty($_POST["usuario"])){
            //obtenemos los permisos en un array
            $array_permisos=$_POST["usuario"];
            printf($array_permisos);

            set_notification('success', 'Eliminación exitosa!', 'El permiso se guardo satisfactoriamente.'.$array_permisos[0].'');
    echo json_encode(array('estado'=>'s',
										'mensaje'=>'Se guardo correctamente los permisos',
										'datos'=>$usuarios));


        }else {
		// Redirecciona la pagina porque no hay permisos modificados
        set_notification('success', 'Eliminación exitosa!', 'No se logro modificar permisos');
		redirect('?/permisos/listar');}

    }else {
		// Redirecciona la pagina
        set_notification('success', 'Eliminación exitosa22!', 'No se logro modificar permisos');
		redirect('?/permisos/listar');
	}

}
else {
	// Error 404
	require_once not_found();
	exit;
}

?>