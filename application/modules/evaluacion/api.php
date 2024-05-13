<?php 
header('Content-Type: application/json');
$reservas = array(); //creamos un array de eventos
$horas_dis = array();

/*$agendados = $db->query("SELECT * FROM sys_agenda_eva WHERE asunto = 'Evaluación'")->fetch();

foreach ($agendados as $agenda){
    $reservas[] = array('title'=> $agenda['asunto'], 
                        'start'=> $agenda['fecha_prog'], 
                        'end'=> $agenda['fecha_prog']);
    }*/

$agendados = $db->query("select age.id_reserva, age.consultorio_id, age.horario_id, tu.genero as generot, tu.id_tutor ,tu.nombres as nombret, tu.primer_apellido as paternot, tu.segundo_apellido as maternot, 
tu.numero_documento as nrodocumentot, tu.complemento as complementot, tu.tipo_documento as tipodoct, tu.celular as celulart, tp.parentesco, pa.id_paciente,
  pa.nombres as paciente, pa.primer_apellido as paternop, pa.segundo_apellido as maternop, pa.genero as generop, pa.fecha_nac, pa.numero_documento as nrodocumentop,
  pa.complemento as complementop, pa.tipo_documento as tipodocp, pa.celular as celularp,
  age.diagnostico, age.impedimento, age.observaciones, age.metodo_reserva, age.tarifa_id,
  age.doctor_id, age.fecha_prog, age.hora_inicio, age.hora_fin, age.dia, age.background, age.textcolor
from sys_agenda_eva age
left join ins_paciente pa ON age.paciente_id=pa.id_paciente
left join sys_tutor_paciente tp ON tp.paciente_id=age.paciente_id
left join ins_tutor tu ON tu.id_tutor=tp.tutor_id
where age.estado_reserva!='Cancelado' AND age.estado!='I' ")->fetch();

//$horarios = $db->query("")

foreach ($agendados as $agenda){
      $reservas[] = array('id_evaluacion'=> $agenda['id_reserva'], 
                          'tutor_id'=> $agenda['id_tutor'],
                          'paciente_id'=> $agenda['id_paciente'],
                          'nombret'=> $agenda['nombret'], 
                          'generot'=> $agenda['generot'], 
                          'paternot'=> $agenda['paternot'],
                          'maternot'=> $agenda['maternot'],
                          'nrodocumentot'=> $agenda['nrodocumentot'],
                          'complementot'=> $agenda['complementot'],
                          'tipodoct'=> $agenda['tipodoct'],
                          'celulart'=> $agenda['celulart'],
                          'parentesco'=> $agenda['parentesco'],
                          'nombrep'=> $agenda['paciente'],
                          'generop'=> $agenda['generop'],
                          'paternop'=> $agenda['paternop'],
                          'maternop'=> $agenda['maternop'],
                          'fecha_nac'=> $agenda['fecha_nac'],
                          'nrodocumentop'=> $agenda['nrodocumentop'],
                          'complementop'=> $agenda['complementop'],
                          'tipodocp'=> $agenda['tipodocp'],
                          'celularp'=> $agenda['celularp'],
                          'diagnostico'=> $agenda['diagnostico'],
                          'impedimento'=> $agenda['impedimento'],
                          'observacion'=> $agenda['observaciones'],
                          'tipores'=> $agenda['metodo_reserva'],
                          'tarifa'=> $agenda['tarifa_id'],
                          'especialista'=> $agenda['doctor_id'],
                          'consultorio' => $agenda['consultorio_id'],
                          'horario' => $agenda['horario_id'],
                          'fecha_prog'=> $agenda['fecha_prog'],
                          'hora_inicio'=> $agenda['hora_inicio'],
                          'hora_fin'=> $agenda['hora_fin'],
                          'dia' => $agenda['dia'],
                          'backgroundColor' => $agenda['background'],
                          'textColor' => $agenda['textcolor'],
                          'id'=> $agenda['id_reserva'], 
                          'title'=> $agenda['paciente'],
                          'start'=> $agenda['fecha_prog'].' '.$agenda['hora_inicio'],
                          'end'=> $agenda['fecha_prog'].' '.$agenda['hora_fin'],
                        );
      }

$datos = array(
    [
        'id'=> '1',
    'title'=>'Evento bd3',
    'start'=>'2023-04-14',
    'end'=>'2023-04-15'
    ],
    ['id'=> '2',
        'title' => 'Lorem Ipsum',
        'start' =>  '2023-04-17',
        'end' =>  '2023-04-18'
    ],
    ['id'=> '3',
        'title' => 'The Test',
        'start' =>  '2023-04-19',
        'end' =>  '2023-04-20'
    ],
    ['id'=> '4',
        'title' => 'The Test 2',
        'start' =>  '2023-04-19',
        'end' =>  '2023-04-20'
    ]
);


//echo json_encode($datos);
echo json_encode($reservas);


?>