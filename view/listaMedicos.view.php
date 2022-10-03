<?php require 'header.php'; 

$p_actual= pagina_actual();
?>

    <div class="container">
        <div class="row">
            <div class="col-9">
            <h1 class="text-center">Lista de Medicos</h1>
            </div>
            <div class="col-3 justify-content-end d-flex align-items-md-center">
            <a href="agregarMedico.php" class="btn btn-primary">Agregar Medico</a>
            </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-dark table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Medico</th>
                        <th>Especialidad</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    <?php  foreach($medicos as $medico): ?>
                        <tr>
                            <td><?php echo $medico->getId();?></td>
                            <td><?php echo $medico->getNombre();?></td>
                            <td><?php echo $medico->getEspecialidad();?></td>
                            <td><?php $status= $medico->getEstatus(); echo $status == 1 ? 'Disponible' : 'No Disponible' ?></td>
                            <td>Proximamente... <i class="fa-solid fa-person-digging"></i></td>
                        </tr>
                    <?php  endforeach?>
                        
                </tbody>
            </table>
        </div>
    </div>
                                   
    <?php require '../admin/paginacion_medicos.php'?>
</div>





<?php require 'footer.php'?>

