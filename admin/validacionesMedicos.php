<?php

$errores='';

if (empty($nombre) or empty($especialidad)) {
    $errores .= '<li>Por favor rellena los datos correctamente</li>';
}

?>