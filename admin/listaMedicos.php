<?php

require '../paquetes.php';

$medicos=obtenerListaMedicos();
// d($medicos);
require '../view/listaMedicos.view.php';

?>