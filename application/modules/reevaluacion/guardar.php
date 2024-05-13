<?php
/**
 * Guardar evaluación
 */
$sw=0;
$especialista='1';
$horario_id='1';

// Verifica la peticion post
if (is_post()) {
		// Verifica la existencia de datos
	if (isset($_POST['nombrep']) && 
		isset($_POST['generop']) && 
		isset($_POST['paternop']) &&  
		isset($_POST['fecha_nac']) &&   
		isset($_POST['diagnostico']) && 
		isset($_POST['tipores']) && 
		isset($_POST['tarifa']) && 
		isset($_POST['fecha_prog']) && 
		isset($_POST['hora_inicio']) && 
		isset($_POST['hora_fin']) && 
		isset($_POST['inicio']) && 
		isset($_POST['fin']) && 
		isset($_POST['consultorio']) ){

		// Verifica si el horario esta disponible en la fecha ingresada
		/*$horadisp = $db->query("SELECT * from sys_agenda_eva where fecha_prog='".$_POST['fecha_prog']."' and consultorio_id='".$_POST['consultorio']."' and horario_id = '".$_POST['horas_disp']."'")->fetch();
		if($horadisp){
			echo json_encode(array('estado'=>'ok',
									'mensaje'=>'si se puede agendar en ese horario, esta disponible'));
		}else{
			echo json_encode(array('estado'=>'false',
									'mensaje'=>'No se puede agendar en ese horario'));
		}*/

		// Código evaluacion
		$id_evaluacion = (isset($_POST['codigo'])) ? clear($_POST['codigo']) : 0;

		// Código paciente
		$id_paciente = (isset($_POST['paciente_id'])) ? clear($_POST['paciente_id']) : 0;

			//Verifica si se ingreso tutor
			if (isset($_POST['nombret']) && 
				isset($_POST['generot']) && 
				isset($_POST['paternot']) && 
				isset($_POST['celulart'])  && 
				isset($_POST['parentesco'])  ){
				// Código tutor
				$id_tutor = (isset($_POST['tutor_id'])) ? clear($_POST['tutor_id']) : 0;

				//datos tutor si se mando datos
				$tutor = clear($_POST['nombret']);
				$generot = clear($_POST['generot']);
				$pat_tutor = clear($_POST['paternot']);
				$mat_tutor = clear($_POST['maternot']);
				$ci_tutor = clear($_POST['nrodocumentot']);
				$com_tutor = clear($_POST['complementot']);
				$tipodoct = clear($_POST['tipodoct']);
				$celulart = clear($_POST['celulart']);
				$parentesco = clear($_POST['parentesco']);
				$sw=1;
			}

			//datos paciente
			$paciente = clear($_POST['nombrep']);
			$genero = clear($_POST['generop']);
			$paterno = clear($_POST['paternop']);
			$materno = clear($_POST['maternop']);
			$fecha_nac = clear($_POST['fecha_nac']);
			$ci_paciente = clear($_POST['nrodocumentop']);
			$com_paciente = clear($_POST['complementop']);
			$tipodoc = (isset($_POST['tipodocp'])) ? clear($_POST['tipodocp']) : "";
			$celular = clear($_POST['celularp']);
			//datos evaluacion
			$diagnostico = clear($_POST['diagnostico']);
			$impedimento = clear($_POST['impedimento']);
			$observacion = clear($_POST['observacion']);
			$tipores = clear($_POST['tipores']);
			$tarifa = clear($_POST['tarifa']);
			$dia = clear($_POST['dia']);
			$fechainicio = clear($_POST['fecha_prog']);
			$horainicio = clear($_POST['hora_inicio']);
			$horafin = clear($_POST['hora_fin']);
			$consultorio_id = clear($_POST['consultorio']);
			/*$especialista = clear($_POST['especialista']);
			$horario_id = clear($_POST['horas_disp']);*/
			$background = clear($_POST['colorfondo']);
			$textcolor = clear($_POST['colortexto']);

			// Verifica si es creacion o modificacion
			if ($id_evaluacion > 0){
				//Instancia al paciente
				$paciente = array(
					'nombres' => $paciente,
					'primer_apellido' => $paterno,
					'segundo_apellido' => $materno,
					'numero_documento' => $ci_paciente,
					'tipo_documento' => $tipodoc,
					'complemento' => $com_paciente,
					'genero' => $genero,
					'fecha_nac' => $fecha_nac,
					'celular' => $celular,
					'fecha_mod' => date("Y-m-d H:i:s"),
					'user_mod' => $_user['id_user'],
					'estado' => 'A',
				);	
				// Modifica paciente
				$db->where('id_paciente', $id_paciente)->update('ins_paciente', $paciente);	

				if($sw==1){
					//Instancia el tutor para modificar
					$tutor = array(
						'nombres' => $tutor,
						'primer_apellido' => $pat_tutor,
						'segundo_apellido' => $mat_tutor,
						'numero_documento' => $ci_tutor,
						'complemento' => $com_tutor,
						'tipo_documento' => $tipodoct,
						'genero' => $generot,
						'celular' => $celulart,
						'fecha_mod' => date("Y-m-d H:i:s"),
						'user_mod' => $_user['id_user'],
						'estado' => 'A',
					);
					// Modifica tutor
					$db->where('id_tutor', $id_tutor)->update('ins_tutor', $tutor);
	
					//Instancia la relacion tutor - paciente
					$tutor_paciente = array(
						'tutor_id' => $id_tutor,
						'paciente_id' => $id_paciente,
						'parentesco' => $parentesco,
						'estado' => 'A',
					);
					// Modifica relacion tutor_paciente
					//$db->update('sys_tutor_paciente', $tutor_paciente);
				}
				// Instancia evaluacion a modificar
				$evaluacion = array(
					'paciente_id' => $id_paciente,
					'doctor_id' => $especialista,
					'horario_id' => $horario_id,
					'consultorio_id' => $consultorio_id,
					'tarifa_id' => $tarifa,
					'asunto' => 'Evaluación',
					'diagnostico' => $diagnostico,
					'fecha_prog' => $fechainicio,
					'hora_inicio' => $horainicio,
					'hora_fin' => $horafin,
					'estado_reserva' => 'No atendido',
					'metodo_reserva'=>$tipores,
					'fecha_mod' => date('Y-m-d H:i:s'),
					'user_mod' => $_user['id_user'],
					'observaciones'=>$observacion,
					'impedimento' => $impedimento,
					'dia' => $dia,
					'background' => $background,
					'textColor' => $textcolor,
				);
				// Modifica evaluación
				$db->where('id_reserva', $id_evaluacion)->update('sys_agenda_eva', $evaluacion);

				//Verifica la modificación
				if($db->affected_rows){
					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'u',
						'nivel' => 'h',
						'detalle' => 'Se modificó el registro de evaluación con identificador número ' . $id_evaluacion. '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));

					echo json_encode(array('estado'=>'ok',
									'mensaje'=>'se modificó la reserva para evaluación'));
				}else{
					echo json_encode(array('estado'=>'false',
									'mensaje'=>'No se pudo modificar la reserva para evaluación'));
				}

			}else{
				//Instancia al paciente para crear
				$paciente = array(
					'nombres' => $paciente,
					'primer_apellido' => $paterno,
					'segundo_apellido' => $materno,
					'numero_documento' => $ci_paciente,
					'tipo_documento' => $tipodoc,
					'complemento' => $com_paciente,
					'genero' => $genero,
					'fecha_nac' => $fecha_nac,
					'celular' => $celular,
					'fecha_reg' => date("Y-m-d H:i:s"),
					'user_reg' => $_user['id_user'],
					'estado' => 'A',
				);	
				// Crea paciente
				$id_paciente = $db->insert('ins_paciente', $paciente);

				if($sw==1){
					//Instancia el tutor para crear
					$tutor = array(
						'nombres' => $tutor,
						'primer_apellido' => $pat_tutor,
						'segundo_apellido' => $mat_tutor,
						'numero_documento' => $ci_tutor,
						'complemento' => $com_tutor,
						'tipo_documento' => $tipodoct,
						'genero' => $generot,
						'celular' => $celulart,
						'fecha_reg' => date("Y-m-d H:i:s"),
						'user_reg' => $_user['id_user'],
						'estado' => 'A',
					);
					// Crea tutor
					$id_tutor = $db->insert('ins_tutor', $tutor);	
	
					//Instancia la relacion tutor - paciente
					$tutor_paciente = array(
						'tutor_id' => $id_tutor,
						'paciente_id' => $id_paciente,
						'parentesco' => $parentesco,
						'estado' => 'A',
					);
					//crea relacion tutor - paciente
					$db->insert('sys_tutor_paciente', $tutor_paciente);
				}
				// Instancia la evaluacion para crear
				$evaluacion = array(
					'paciente_id' => $id_paciente,
					'doctor_id' => $especialista,
					'horario_id' => $horario_id,
					'consultorio_id' => $consultorio_id,
					'tarifa_id' => $tarifa,
					'asunto' => 'Evaluación',
					'diagnostico' => $diagnostico,
					'fecha_prog' => $fechainicio,
					'hora_inicio' => $horainicio,
					'hora_fin' => $horafin,
					'estado_reserva' => 'No atendido',
					'metodo_reserva'=>$tipores,
					'fecha_reg' => date('Y-m-d H:i:s'),
					'user_reg' => $_user['id_user'],
					'observaciones'=>$observacion,
					'impedimento' => $impedimento,
					'dia' => $dia,
					'background' => $background,
					'textColor' => $textcolor,
				);
				
				// Crea evaluacion
				$id_evaluacion = $db->insert('sys_agenda_eva', $evaluacion);
				if($db->affected_rows){
					// Guarda el proceso
					$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó la reserva para la evaluación con identificador número ' . $id_evaluacion . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
					));
					echo json_encode(array('estado'=>'ok',
								   		   'mensaje'=>'se creo la reserva para la evluación'));

				}else{
					echo json_encode(array('estado'=>'false',
											'mensaje'=>'Hubo un error a crear la evaluación'));

				}

			}

		
		}else{
			//Muestra mensaje cuando no se ingresaron todos los datos necesarios
			echo json_encode(array('estado'=>'false',
						   'mensaje'=>'Hubó un error, ingrese todos los datos necesarios.'));
		}
		
	// Redirecciona la pagina
	//redirect('?/evaluacion/listar');
} else {
	echo json_encode(array('estado'=>'false',
						'mensaje'=>'Hubó un error, comuniquese con el administrador..'));
	// Error 404
	/*echo "No recibe ningun parametro";
	require_once not_found();
	exit;*/
}

?>