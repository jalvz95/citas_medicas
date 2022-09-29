<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\DB\\Map\\CitasTableMap',
    1 => '\\DB\\Map\\MedicosTableMap',
    2 => '\\DB\\Map\\PacientesTableMap',
  ),
));
