<?php

use DB\Base\CitasQuery;
use DB\Base\PacientesQuery;
use DB\Citas;
use DB\Pacientes;

require '../paquetes.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre= limpiarDatos($_POST['nombre']);
    $apellido= limpiarDatos($_POST['apellido']);
    $hora= limpiarDatos($_POST['hora']);
    $fecha= limpiarDatos($_POST['fecha']);
    $medico= limpiarDatos($_POST['medico']);
    $estatus= limpiarDatos($_POST['estatus']);
    $idCita= limpiarDatos($_POST['idCita']);
    $idPaciente= limpiarDatos($_POST['idPaciente']);

    require 'validaciones.php';
    if($errores==''){
        PacientesQuery::create()
        ->filterById($idPaciente)
        ->update(array('NombreP'=>$nombre,'ApellidoP'=>$apellido));

        CitasQuery::create()
        ->filterById($idCita)
            ->update(array('Hora'=>$hora,'Fecha'=>$fecha,'IdMedico'=>$medico,'Estatus'=>$estatus));
            
            header('location: admin.index.php');
    }
        $cita= id_cita($idCita);
}else{

    $cita= id_cita($_GET['id']);
    if(empty($cita->getId())){
        header('location: admin.index.php');
    }   
}


require '../view/editar.view.php';

?>