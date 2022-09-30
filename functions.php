<?php

use DB\Base\CitasQuery;
use DB\Base\PacientesQuery;

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtenerCitas(){
     $inicio = (pagina_actual() > 1) ? pagina_actual() * 5 - 5 : 0;
    $citas= CitasQuery::create()
    ->orderByFecha('ASC')
    ->leftJoinWith('Citas.Pacientes')
    ->leftJoinWith('Citas.Medicos')
    ->limit(5)
    ->offset($inicio)
    ->find();
    return $citas;
}

function obternerPacientes(){
    $pacientes= PacientesQuery::create()->find();
    return $pacientes;
}

function cantidad_paginas(){
    $total_post = CitasQuery::create()->count();
    $numero_paginas = ceil($total_post / 5);
    return $numero_paginas;
}

function id_cita($id){
    $q=CitasQuery::create()->findOneById($id);
    return (int)limpiarDatos($q->getId());
}

?>