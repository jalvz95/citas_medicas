<?php

use DB\Citas;
use DB\Pacientes;

require '../index.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre= limpiarDatos($_POST['nombre']);
    $apellido= limpiarDatos($_POST['apellido']);
    $hora= limpiarDatos($_POST['hora']);
    $fecha= limpiarDatos($_POST['fecha']);

    if(!empty($_POST['medico'])) {
        $medico= limpiarDatos($_POST['medico']);
    }else{
        $medico= null;
    }

    require 'validaciones.php';

    if($errores==''){
    $statement= new Pacientes();
    $statement->setNombreP($nombre);
    $statement->setApellidoP($apellido);
    $statement->save();
   // $statement->getId();
    
    $cita= new Citas;
    $cita->setFecha($fecha);
    $cita->setHora($hora);
    $cita->setIdMedico($medico);
    $cita->setIdPaciente($statement->getId());
    $cita->setEstatus(0);
    $cita->save();

    header('location: admin.index.php');
    }    
}

require '../view/formulario.view.php';
?>