<?php

use DB\Medicos;

require '../paquetes.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre= strtoupper (limpiarDatos($_POST['nombre']));
    $especialidad= strtoupper( limpiarDatos($_POST['especialidad']));
    
    require 'validacionesMedicos.php';

    if($errores==''){
    $statement= new Medicos();
    $statement->setNombre($nombre);
    $statement->setEspecialidad($especialidad);
    $statement->setEstatus(1);
    $statement->save();
       
    header('location: listaMedicos.php');
    }    
}

require '../view/agregarMedico.view.php';
?>