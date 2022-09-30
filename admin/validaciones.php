<?php
use Carbon\Carbon;

$errores='';
$sabado='Saturday';
$domingo='Sunday';

if (empty($nombre) or empty($apellido) or empty($hora) or empty($fecha) or empty($medico)) {
    $errores .= '<li>Por favor rellena los datos correctamente</li>';
}

$fechaCarbon= new Carbon($fecha); 
$fechaC= $fechaCarbon->isoFormat('dddd');

if($fechaC== $sabado or $fechaC == $domingo){
    $errores.= '<li>No se puede agendar los fines de semana</li>';
}

$horaEntrada='07:00';
$horaSalida='17:00';
$hora= new Carbon($hora);
$horaC= $hora->format('H:i');

if($horaC < $horaEntrada or $horaC > $horaSalida ){
    $errores.='<li>Agenda en un horario comprendido entre 7am-5pm</li>';
}

?>