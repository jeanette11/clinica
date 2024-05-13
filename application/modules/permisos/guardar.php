<?php
//$data = ($_POST['usuario']);
/*if(isset($_POST['usuario'])){
    echo "si recibe";
}else{
    echo "no recibe datos";
}*/
//echo json_encode($data);

 if (isset($_POST['id_area'])){
        $id_area=$_POST['id_area'];

        // ------------------- principal administracion -----------------------------
        if((isset($_POST['usuario']) && $_POST['usuario']!='') || (isset($_POST['area']) && $_POST['area']!='') || (isset($_POST['perfil']) && $_POST['perfil']!='') || (isset($_POST['rol']) && $_POST['rol']!='') || (isset($_POST['horario']) && $_POST['horario']!='' ) || 
            (isset($_POST['permiso']) && $_POST['permiso']!='') || (isset($_POST['especialidad']) && $_POST['especialidad']!='') || (isset($_POST['consultorio']) && $_POST['consultorio']!='') || (isset($_POST['patologia']) && $_POST['patologia']!='') ){
            //instancia principal para el modulo de administracion
            $permisos_administracion = array(
                'area_id' => $id_area,
                'menu_id' => '1',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso 
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='1'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_administracion);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso para el módulo de administración con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));

            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_administracion);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso para el módulo de administracion con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
        }
        // ------------------- ./principal administracion ---------------------------

        // Permisos para seccion de usuarios
        if(isset($_POST['usuario']) && $_POST['usuario']!='' ){          ;
            $usuario= $_POST['usuario'];
            //Instanciar permisos para usuario
            $permisos_usuario = array(
                'area_id' => $id_area,
                'menu_id' => '2',
                'archivos' => $usuario
            );
            //Verifica que no exista el area para poder crearla o modificar
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='2'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_usuario);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para usuarios con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_usuario);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para usuarios con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
       
        }
        // Permisos para areas
        if(isset($_POST['area']) && $_POST['area']!=''){
            $areas = $_POST['area'];
            //Instanciar permisos para area
            $permisos_area = array(
                'area_id' => $id_area,
                'menu_id' => '3',
                'archivos' => $areas
            );
            //Verifica que no exista el area para poder crearla o modificar
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='3'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_area);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para áreas con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_area);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para áreas con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permisos para perfiles
        if(isset($_POST['perfil']) && $_POST['perfil']!=''){
            $perfiles = $_POST['perfil'];
            //Instanciar permisos para perfiles
            $permisos_perfil = array(
                'area_id' => $id_area,
                'menu_id' => '4',
                'archivos' => $perfiles
            );
            //Verifica que no exista el area para poder crearla o modificar
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='4'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_perfil);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para perfiles con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso perfil
                $id_permiso = $db->insert('sys_permisos', $permisos_perfil);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para perfiles con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para roles
        if(isset($_POST['rol']) && $_POST['rol']!=''){
            $roles = $_POST['rol'];
            //Instanciar permisos para roles
            $permisos_roles = array(
                'area_id' => $id_area,
                'menu_id' => '5',
                'archivos' => $roles
            );
            //Verifica que no exista el area para poder crearla o modificar
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='5'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_roles);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para roles con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_roles);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para roles con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para horarios
        if(isset($_POST['horario']) && $_POST['horario']!=''){
            $horarios = $_POST['horario'];
            //Instanciar permisos para horarios
            $permisos_horarios = array(
                'area_id' => $id_area,
                'menu_id' => '6',
                'archivos' => $horarios
            );
            //Verifica que no exista el area para poder crearla o modificar
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='6'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos para horarios
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_horarios);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para horarios con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso para horarios
                $id_permiso = $db->insert('sys_permisos', $permisos_horarios);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para horarios con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para permisos
        if(isset($_POST['permiso']) && $_POST['permiso']!=''){
            $permisos = $_POST['permiso'];
            //Instanciar permisos para permisos
            $permisos_permisos = array(
                'area_id' => $id_area,
                'menu_id' => '29',
                'archivos' => $permisos
            );
            //Verifica que no exista ya el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='29'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_permisos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para permisos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_permisos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó los permisos para permiso con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para especialidad
        if(isset($_POST['especialidad']) && $_POST['especialidad']!=''){
            $especialidades = $_POST['especialidad'];
            //Instanciar permisos para especialidad
            $permisos_especialidad = array(
                'area_id' => $id_area,
                'menu_id' => '31',
                'archivos' => $especialidades
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='31'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_especialidad);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para especialidades con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_especialidad);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para especialidades con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para consultorios
        if(isset($_POST['consultorio']) && $_POST['consultorio']!=''){
            $consultorios = $_POST['consultorio'];
            //Instanciar permisos para consultorios
            $permisos_consultorios = array(
                'area_id' => $id_area,
                'menu_id' => '32',
                'archivos' => $consultorios
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='32'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_consultorios);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para consultorios con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_consultorios);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para consultorios con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para patologias
        if(isset($_POST['patologia']) && $_POST['patologia']!=''){
            $patologias = $_POST['patologia'];
            //Instanciar permisos para patologias
            $permisos_patologias = array(
                'area_id' => $id_area,
                'menu_id' => '33',
                'archivos' => $patologias
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='33'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_patologias);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para patologÍas con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_patologias);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para patologías con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para inscripciones
         if(isset($_POST['inscri']) && $_POST['inscri']!='' ){
            $inscripcion = $_POST['inscri'];
            //Instanciar permisos para inscripciones
            $permisos_inscripcion = array(
                'area_id' => $id_area,
                'menu_id' => '7',
                'archivos' => $inscripcion
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='7'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_inscripcion);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para inscripciones con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_inscripcion);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para inscripciones con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // ------------------- principal agendamiento -----------------------------
        if((isset($_POST['reeva']) && $_POST['reeva']!='' ) || (isset($_POST['eval']) && $_POST['eval']!='') || (isset($_POST['ut']) && $_POST['ut']!='') || (isset($_POST['ur']) && $_POST['ur']!='')){
            //instancia principal para el modulo de agendar
            $permisos_eval_prin = array(
                'area_id' => $id_area,
                'menu_id' => '8',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso agendar 
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='8'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_eval_prin);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso principal de agendamiento con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));
    
            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_eval_prin);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso principal de agendamiento con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
            }
            // ------------------- ./principal agendamiento ---------------------------

        // Permiso para evaluaciones
        if(isset($_POST['eval']) && $_POST['eval']!=''){
            $evaluacion = $_POST['eval'];
            //Instanciar permisos para evaluaciones
            $permisos_evaluaciones = array(
                'area_id' => $id_area,
                'menu_id' => '14',
                'archivos' => $areas
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='14'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_evaluaciones);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para evaluaciones con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_evaluaciones);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para evaluaciones con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
            
        }
        
        // Permiso para reevaluaciones
        if(isset($_POST['reeva']) && $_POST['reeva']!=''){
            $reevaluacion = $_POST['reeva'];
            //Instanciar permisos para reevaluacion
            $permisos_reeval = array(
                'area_id' => $id_area,
                'menu_id' => '15',
                'archivos' => $reevaluacion
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='15'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_reeval);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para reevaluaciones con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_reeval);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para reevaluaciones con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para uta
        if(isset($_POST['ut']) && $_POST['ut']!=''){
            $uta = $_POST['ut'];
            //Instanciar permisos para agendamiento UTA
            $permisos_uta = array(
                'area_id' => $id_area,
                'menu_id' => '16',
                'archivos' => $uta
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='16'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_uta);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permiso para agendamiento UTA con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_uta);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permiso para agendamiento UTA con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para uri
        if(isset($_POST['ur']) && $_POST['ur']!=''){
            $uri = $_POST['ur'];
            //Instanciar permisos para agendamiento URI
            $permisos_uri = array(
                'area_id' => $id_area,
                'menu_id' => '30',
                'archivos' => $uri
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='30'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_uri);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para agendamiento URI con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_uri);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos con agendamiento URI con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }

        // ------------------- principal historiales medicos -----------------------------
        if((isset($_POST['adul']) && $_POST['adul']!='') || (isset($_POST['trauma']) && $_POST['trauma']!='')|| (isset($_POST['pedia']) && $_POST['pedia']!='')){
            //instancia principal para el modulo de historiales medicos
            $permisos_historiales = array(
                'area_id' => $id_area,
                'menu_id' => '9',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso agendar 
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='9'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_historiales);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso historiales médicos con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));
    
            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_historiales);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso de historial médico con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
        }
        // ------------------- ./principal historiales medicos ---------------------------

        // Permiso para adulto
        if(isset($_POST['adul']) && $_POST['adul']!=''){
            $adulto = $_POST['adul'];
            //Instanciar permisos para historial médico adulto
            $permisos_adulto = array(
                'area_id' => $id_area,
                'menu_id' => '17',
                'archivos' => $adulto
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='17'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_adulto);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permiso para historiales adultos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_adulto);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para historiales adultos con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para traumatologico
        if(isset($_POST['trauma']) && $_POST['trauma']!=''){
            $traumatologico = $_POST['trauma'];
            //Instanciar permisos para historial médico traumatológico
            $permisos_trauma = array(
                'area_id' => $id_area,
                'menu_id' => '18',
                'archivos' => $traumatologico
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='18'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_trauma);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para historiales traumatológicos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_trauma);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permiso para historiales traumatológicos con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para pediatrica
        if(isset($_POST['pedia']) && $_POST['pedia']!=''){
            $pediatrica = $_POST['pedia'];
            //Instanciar permisos para historial médico pediátrico
            $permisos_pediatrico = array(
                'area_id' => $id_area,
                'menu_id' => '19',
                'archivos' => $pediatrica
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='19'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_pediatrico);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para historiales pediátricos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_pediatrico);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para historiales pediátricos con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }

        // ------------------- principal seguimiento médico -----------------------------
        if((isset($_POST['enfer']) && $_POST['enfer']!='') || (isset($_POST['segut']) && $_POST['segut']!='') || (isset($_POST['segur']) && $_POST['segur']!='') ){
            //instancia principal para el modulo de seguimiento médico
            $permisos_segmedicos = array(
                'area_id' => $id_area,
                'menu_id' => '10',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso agendar 
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='10'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_segmedicos);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso seguimiento médico con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));
    
            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_segmedicos);
    
                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso de seguimiento médico con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
        }
        // ------------------- ./principal seguimiento médico ---------------------------

        // Permiso para seguimiento enfermeria
        if(isset($_POST['enfer']) && $_POST['enfer']!=''){
            $enfermeria = $_POST['enfer'];
            //Instanciar permisos para seguimiento enfermeria
            $permisos_enfermeria = array(
                'area_id' => $id_area,
                'menu_id' => '20',
                'archivos' => $enfermeria
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='20'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_enfermeria);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para seguimiento enfermería con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_enfermeria);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para seguimiento enfermería con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para seguimiento uta
        if(isset($_POST['segut']) && $_POST['segut']!=''){
            $seguta = $_POST['segut'];
            //Instanciar permisos para seguimiento UTA
            $permisos_seguta = array(
                'area_id' => $id_area,
                'menu_id' => '21',
                'archivos' => $seguta
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='21'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_seguta);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para seguimiento UTA con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_seguta);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para seguimiento UTA con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para seguimiento ri
        if(isset($_POST['segur']) && $_POST['segur']!=''){
            $seguri = $_POST['segur'];
            //Instanciar permisos para seguimiento URI
            $permisos_seguri = array(
                'area_id' => $id_area,
                'menu_id' => '28',
                'archivos' => $seguri
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='28'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_seguri);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para seguimiento URI con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_seguri);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para seguimiento URI con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }

        // ------------------- principal licencias -----------------------------
        if((isset($_POST['lmed']) && $_POST['lmed']!='') || (isset($_POST['lext']) && $_POST['lext']!='') ){
            //instancia principal para el modulo de licencias
            $permisos_licencias = array(
                'area_id' => $id_area,
                'menu_id' => '11',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso licencias
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='11'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_licencias);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso de licencias con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));

            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_licencias);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso de licencias con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
        }
        // ------------------- ./principal licencias ---------------------------

        // Permiso para licencia medica
        if(isset($_POST['lmed']) && $_POST['lmed']!=''){
            $licmed = $_POST['lmed'];
            //Instanciar permisos para licencia médica
            $permisos_licmed = array(
                'area_id' => $id_area,
                'menu_id' => '22',
                'archivos' => $licmed
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='22'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_licmed);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para licencias médicas con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_licmed);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para licencias médicas con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para licencia medica externa
        if(isset($_POST['lext']) && $_POST['lext']!=''){
            $licext = $_POST['lext'];
            //Instanciar permisos para licencia externa
            $permisos_licext = array(
                'area_id' => $id_area,
                'menu_id' => '23',
                'archivos' => $licext
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='23'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_licext);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para licencias externas con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_licext);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para licencias externas con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }

        // ------------------- principal pagos-----------------------------
        if((isset($_POST['pago']) && $_POST['pago']!='') || (isset($_POST['gasto']) && $_POST['gasto']!='') || (isset($_POST['tarifa']) && $_POST['tarifa']!='') || (isset($_POST['caja'])&& $_POST['caja']!='') ){
            //instancia principal para el modulo de pagos
            $permisos_pagos = array(
                'area_id' => $id_area,
                'menu_id' => '12',
                'archivos' => 'principal'
            );
            //Verifica que no exista el permiso pagos
            $verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='12'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_pagos);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                    'fecha_proceso' => date('Y-m-d'),
                    'hora_proceso' => date('H:i:s'),
                    'proceso' => 'u',
                    'nivel' => 'h',
                    'detalle' => 'Se modificó el permiso de módulo pagos con id ' . $id_permiso . '.',
                    'direccion' => $_location,
                    'usuario_id' => $_user['id_user']
                ));

            }else{
                $id_permiso = $db->insert('sys_permisos', $permisos_pagos);

                // Guarda el proceso
                $db->insert('sys_procesos', array(
                        'fecha_proceso' => date('Y-m-d'),
                        'hora_proceso' => date('H:i:s'),
                        'proceso' => 'c',
                        'nivel' => 'h',
                        'detalle' => 'Se creó el permiso de módulo pagos con id ' . $id_permiso . '.',
                        'direccion' => $_location,
                        'usuario_id' => $_user['id_user']
                ));
            } 
        }
        // ------------------- ./principal pagos ---------------------------

        // Permiso para pagos
        if(isset($_POST['pago']) && $_POST['pago']!=''){
            $pagos = $_POST['pago'];
            //Instanciar permisos para pagos
            $permisos_pagos = array(
                'area_id' => $id_area,
                'menu_id' => '24',
                'archivos' => $pagos
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='24'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_pagos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos de pagos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_pagos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para pagos con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para gasto
        if(isset($_POST['gasto']) && $_POST['gasto']!=''){
            $gastos = $_POST['gasto'];
            //Instanciar permisos para gastos
            $permisos_gastos = array(
                'area_id' => $id_area,
                'menu_id' => '25',
                'archivos' => $gastos
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='25'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_gastos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para gastos con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_gastos);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para gastos con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para tarifas
        if(isset($_POST['tarifa']) && $_POST['tarifa']!=''){
            $tarifas = $_POST['tarifa'];
            //Instanciar permisos para tarifas
            $permisos_tarifas = array(
                'area_id' => $id_area,
                'menu_id' => '26',
                'archivos' => $tarifas
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='26'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_tarifas);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para tarifas con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_tarifas);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para tarifas con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para cajas
        if(isset($_POST['caja']) && $_POST['caja']!=''){
            $cajas = $_POST['caja'];
            //Instanciar permisos para cajas
            $permisos_cajas = array(
                'area_id' => $id_area,
                'menu_id' => '27',
                'archivos' => $cajas
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='27'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_cajas);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para caja con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_cajas);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para caja con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }
        // Permiso para reportes
        if(isset($_POST['reporte']) && $_POST['reporte']!=''){
            $reportes = $_POST['reporte'];
            //Instanciar permisos para reportes
            $permisos_reportes = array(
                'area_id' => $id_area,
                'menu_id' => '13',
                'archivos' => $licext
            );
            //Verifica que no exista el permiso
			$verifica=$db->query("select * from sys_permisos where area_id='".$id_area."' and menu_id='13'")->fetch_first();
            if(isset($verifica)){
                // Modificar permisos
                $id_permiso = $verifica['id_permiso'];
                $db->where('id_permiso', $id_permiso)->update('sys_permisos', $permisos_reportes);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
					'fecha_proceso' => date('Y-m-d'),
					'hora_proceso' => date('H:i:s'),
					'proceso' => 'u',
					'nivel' => 'h',
					'detalle' => 'Se modificó permisos para reportes con id ' . $id_permiso . '.',
					'direccion' => $_location,
					'usuario_id' => $_user['id_user']
				));

            }else{
                // Crear permiso
                $id_permiso = $db->insert('sys_permisos', $permisos_reportes);

                // Guarda el proceso
				$db->insert('sys_procesos', array(
						'fecha_proceso' => date('Y-m-d'),
						'hora_proceso' => date('H:i:s'),
						'proceso' => 'c',
						'nivel' => 'h',
						'detalle' => 'Se creó permisos para reportes con id ' . $id_permiso . '.',
						'direccion' => $_location,
						'usuario_id' => $_user['id_user']
				));
            } 
        }



 }else{
    echo "no recibe ningun dato";
 }
?>