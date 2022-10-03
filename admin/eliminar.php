<?php

require '../paquetes.php';
use DB\Base\CitasQuery;

$id=limpiarDatos($_GET['id']);
$borrar= CitasQuery::create()
->filterById($id)
->delete();


header("location: admin.index.php?p=".$_GET['p']);

?>