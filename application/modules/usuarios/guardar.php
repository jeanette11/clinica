<?php
/**
 * Guardar persona y usuario
 */
//var_dump($_POST);exit();
// Verifica la peticion post
if (is_post()) {
	// Verifica la cadena csrf
	if (isset($_POST[get_csrf()])) {
		// Verifica la existencia de datos
		if (isset($_POST['nombre']) && 
			isset($_POST['genero']) && 
			isset($_POST['paterno']) && 
			isset($_POST['materno']) && 
			isset($_POST['fecha_nac']) && 
			isset($_POST['lugar_nac']) && 
			isset($_POST['nrodocumento']) && 
			isset($_POST['tipodoc']) && 
			isset($_POST['email']) && 
			isset($_POST['celular']) && 
			isset($_POST['area']) && 
			isset($_POST['perfil']) && 
			isset($_POST['rol'])) {
		
			// Obtiene los datos
			$id_persona = (isset($_POST['id_persona'])) ? clear($_POST['id_persona']) : 0;
			$nombre = clear($_POST['nombre']);
			$genero = clear($_POST['genero']);
			$paterno = clear($_POST['paterno']);
			$materno = clear($_POST['materno']);
			$fecha_nac = clear($_POST['fecha_nac']);
			$lugar_nac = clear($_POST['lugar_nac']);
			$nrodocumento = clear($_POST['nrodocumento']);
			$complemento = clear($_POST['complemento']);
			$tipodoc = clear($_POST['tipodoc']);
			$direccion = clear($_POST['direccion']);
			$email = clear($_POST['email']);
			$celular = clear($_POST['celular']);
			$contacto = clear($_POST['contacto']);
			$area = clear($_POST['area']);
			$perfil = clear($_POST['perfil']);
			$rol = clear($_POST['rol']);

			$nfecha_nac= date("Y-m-d", strtotime($fecha_nac));
			$cod_persona = genera_codigo_persona($nombre,$paterno,$materno,$nfecha_nac);

			$userpass= explode("@",$email);

			$ruta="";
			$nombre_fichero="";
			
			// Verifica si es creacion o modificacion
			if ($id_persona > 0) {

				if(isset($_FILES['fotografia'])){
					// Pregunta si el archivo ya existe
					if (!file_exists($ruta."/".$cod_persona.".jpg")) {
							// Importa la libreria para subir el avatar
							require_once libraries . '/upload-class/class.upload.php';
							// Define la ruta 
							$ruta = files . '/uploads/users';
							//Obitene la fotografia
							$fotografia = $_FILES['fotografia'];
							$handle = new \Verot\Upload\Upload($_FILES['fotografia']);
							if($handle->uploaded){
								$nombre_fichero= $handle->file_new_name_body=$cod_persona;
								$handle->file_new_name_ext = 'jpg';
								$handle->image_resize = true;
								$handle->image_x = 200;
								$handle->image_ratio_y = true;
								$handle->process($ruta);
								if($handle->processed){
									echo "imagen redimensionada";
									$handle->clean();
								}else{
									echo 'error : '.$handle->error;
								}
							}
						}
	
				}	

				// Instancia usuario para modificar
				$usuario = array(
					'cod_user' => $cod_persona,
					'area_id' => $area,
					'rol_id' => $rol,
					'perfil_id' => $perfil,
					'nombres' => $nombre,
					'primer_apellido' => $paterno,
					'segundo_apellido' => $materno,
					'numero_documento' => $nrodocumento,
					'tipo_documento' => $tipodoc,
					'complemento' => $complemento,
					'lugar_nac' => $lugar_nac,
					'genero' => $genero,
					'fecha_nac' => $nfecha_nac,
					'direccion' => $direccion,
					'celular' => $celular,
					'contacto' => $contacto,
					'email' => $email,
					'foto' => $nombre_fichero,
					'username' => $userpass[0],
					'password' => encrypt($userpass[0]),
					'active' => 'n',
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
					'estado' => 'A',
				);

				// Modifica datos del usuario
				$db->where('id_user', $id_persona)->update('ins_usuarios', $usuario);

				// Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso'	=> date('Y-m-d'),
					'hora_proceso' 	=> date('H:i:s'),
					'proceso' 		=> 'u',
					'nivel' 		=> 'm',
					'detalle' 		=> 'Se modificó el usuario con identificador número ' . $id_persona . '.',
					'direccion' 	=> $_location,
					'usuario_id' 	=> $_user['id_user']
				));

				// Crea la notificacion
				set_notification('success', 'Modificación exitosa!', 'El registro se modificó satisfactoriamente.');

				echo json_encode(array('estado'=>'ok',
									'mensaje'=>'se modificó los datos del usuario'));

				
				// Redirecciona la pagina
				//redirect('?/usuarios/ver/' . $id_persona);
				//redirect('?/usuarios/listar/' . $id_persona);
			} else {

				if(isset($_FILES['fotografia'])){
					// Pregunta si el archivo ya existe
					if (!file_exists($ruta."/".$cod_persona.".jpg")) {

							// Importa la libreria para subir el avatar
							require_once libraries . '/upload-class/class.upload.php';
							// Define la ruta 
							$ruta = files . '/uploads/user';
							//Obitene la fotografia
							$fotografia = $_FILES['fotografia'];
							$handle = new \Verot\Upload\Upload($_FILES['fotografia']);
							if($handle->uploaded){
								$nombre_fichero = $handle->file_new_name_body=$cod_persona;
								$handle->file_new_name_ext = 'jpg';
								$handle->image_resize = true;
								$handle->image_x = 200;
								$handle->image_ratio_y = true;
								$handle->process($ruta);
								if($handle->processed){
									echo "imagen redimensionada";
									$handle->clean();
								}else{
									echo 'error : '.$handle->error;
								}
							}
						}		
	
				}
					// Instancia usuario para crear
					$usuario = array(
						'cod_user' => $cod_persona,
						'area_id' => $area,
						'rol_id' => $rol,
						'perfil_id' => $perfil,
						'nombres' => $nombre,
						'primer_apellido' => $paterno,
						'segundo_apellido' => $materno,
						'numero_documento' => $nrodocumento,
						'tipo_documento' => $tipodoc,
						'complemento' => $complemento,
						'lugar_nac' => $lugar_nac,
						'genero' => $genero,
						'fecha_nac' => $nfecha_nac,
						'direccion' => $direccion,
						'celular' => $celular,
						'contacto' => $contacto,
						'email' => $email,
						'foto' => $nombre_fichero,
						'username' => $userpass[0],
						'password' => encrypt($userpass[0]),
						'active' => 'n',
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
						'estado' => 'A',
					);
					// Verifica que no exista el usuario 
					$verifica=$db->query("select * from ins_usuarios where numero_documento=$nrodocumento")->fetch_first();
					if(isset($verifica)){
						//No se puede crear el usuario porque ya existe 
						echo json_encode(array('estado'=>'false',
									   		   'mensaje'=>'El usuario ya existe'));
						exit;
					}else{
						// Crea al usuario
						$id_persona = $db->insert('ins_usuarios', $usuario);	
						// Guarda el proceso
						$db->insert('sys_procesos', array(
							'fecha_proceso'	=> date('Y-m-d'),
							'hora_proceso' 	=> date('H:i:s'),
							'proceso' 		=> 'c',
							'nivel' 		=> 'm',
							'detalle' 		=> 'Se creó el usuario con identificador número ' . $id_persona . '.',
							'direccion' 	=> $_location,
							'usuario_id' 	=> $_user['id_user']
						));

						// Crea la notificacion
						set_notification('success', 'Creación exitosa!', 'El registro se creó satisfactoriamente.');

						echo json_encode(array('estado'=>'ok',
											'mensaje'=>'Se creo el usuario'));

						// Redirecciona la pagina
						//redirect('?/usuarios/listar');
					}
						
			}
		} else {
			echo json_encode(array('estado'=>'false',
								   'mensaje'=>'Debe ingresar todos los datos necesarios para el usuario'));
			// Error 400
			//echo "NO hay datos por post";
			/*require_once bad_request();
			exit;*/
		}
	} else {
		echo json_encode(array('estado'=>'false',
							   'mensaje'=>'No se puede crear el usuario, ingrese todos los datos'));
		// Redirecciona la pagina
		//echo "NO hay cadena csrf";
		//redirect('?/usuarios/listar');
	}
} else {
	echo json_encode(array('estado'=>'false',
						   'mensaje'=>'No ingreso ningun dato'));
	// Error 404
	//echo "No hay datos";
	/*require_once not_found();
	exit;*/
}

?>