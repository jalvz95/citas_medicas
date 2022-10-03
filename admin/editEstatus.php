<?php

use DB\Base\CitasQuery;

require '../paquetes.php';

$id=limpiarDatos($_GET['id']);
$editar=CitasQuery::create()
  ->filterById($id)
  ->update(array('Estatus' => 1));

  header("location: admin.index.php?p=".$_GET['p']);
?>