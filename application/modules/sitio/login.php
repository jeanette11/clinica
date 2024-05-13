<?php
header('Content-Type: application/json');
//Verifica la peticion post
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['id_user'])){
    //obtiene los datos
    $id_usuario= clear($_POST['id_user']);
    $username = clear($_POST['username']);
    $password = $_POST['password'];
    
    $password = encrypt($password);
     // Instancia el usuario
     $usuario = array(
        'username' => $username,
        'password' => $password
    );
    // Actualiza los datos de login del usuario
    $db->where('id_user', $id_usuario)->update('ins_usuarios', $usuario);
    //Verifica la modificación
    if($db->affected_rows){
        // Guarda el proceso
        $db->insert('sys_procesos', array(
            'fecha_proceso' => date('Y-m-d'),
            'hora_proceso' => date('H:i:s'),
            'proceso' => 'u',
            'nivel' => 'h',
            'detalle' => 'Se modificó los datos de inicio de sesion para usuario con identificador ' . $id_usuario. '.',
            'direccion' => $_location,
            'usuario_id' => $_user['id_user']
        ));
        // Crea la notificacion
        set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');
        /*echo json_encode(array('estado'=>'ok',
							 'mensaje'=>'Se modifico los datos para inicio de sesion'));*/

        // Redirecciona al modulo index con error
        redirect('?/sitio/salir');
    }else{
      // Crea la notificacion
      set_notification('warning', 'Atención!', 'No se pudo modificar los datos.');
      /*echo json_encode(array('estado'=>'false',
							'mensaje'=>'No se pudo modificar los datos.'));*/

      // Redirecciona a la pagina de inicio
      redirect(index_public);

    }

}else{
// Crea la notificacion
set_notification('warning', 'Atención!', 'No se pudo modificar los datos, intente nuevamente');
/*echo json_encode(array('estado'=>'false',
							'mensaje'=>'No se pudo modificar los datos, intente nuevamente'));*/


// Redirecciona a la pagina de inicio
redirect(index_public);
}
?>