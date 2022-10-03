<?php

use DB\Base\CitasQuery;
use DB\Base\MedicosQuery;
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
    ->orderByEstatus('ASC')
    ->orderByFecha('ASC')
    ->leftJoinWith('Citas.Pacientes')
    ->leftJoinWith('Citas.Medicos')
    ->limit(5)
    ->offset($inicio)
    ->find();
    return $citas;
}

function obtenerMedicos(){
    $medicos= MedicosQuery::create()
    ->find();
    return $medicos;
}

function obternerPacientes(){
    $pacientes= PacientesQuery::create()->find();
    return $pacientes;
}

function cantidad_paginas(){
    $total_citas = CitasQuery::create()->count();
    $numero_paginas = ceil($total_citas / 5);
    return $numero_paginas;
}

function id_cita($id){
    $id=(int)limpiarDatos($id);
    return CitasQuery::create()
    ->leftJoinWith('Citas.Pacientes')
    ->leftJoinWith('Citas.Medicos')
    ->findOneById($id);
    
}
 function cantidad_paginas_medicos(){
    $total_doctores= MedicosQuery::create()->count();
    $numero_paginas= ceil($total_doctores/5);
    return $numero_paginas;

 }

 function obtenerListaMedicos(){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * 5 - 5 : 0;
   $listaMedicos= MedicosQuery::create()
   ->orderByEstatus('ASC')
   ->orderByNombre('ASC')
   ->limit(5)
   ->offset($inicio)
   ->find();
   return $listaMedicos;
}
?>