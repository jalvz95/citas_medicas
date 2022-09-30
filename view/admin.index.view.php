<?php require 'header.php'; 
use Carbon\Carbon;

?>

    <div class="container">
        <div class="row">
            <div class="col-10">
            <h1 class="text-center">Lista de citas Medicas</h1>
            </div>
            <div class="col-2 justify-content-end d-flex align-items-md-center">
            <a href="formulario.php" class="btn btn-primary">Nueva cita</a>
            </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-dark table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Medico Encargado</th>
                        <th>Especialidad</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    <?php  foreach($citas as $cita): ?>
                        <tr>
                            <td><?php echo $cita->getId()?></td>
                            <td><?php echo $cita->getPacientes()->getNombreP()?></td>
                            <td><?php echo $cita->getPacientes()->getApellidoP()?></td>
                            <td><?php $fecha=new Carbon($cita->getFecha()); echo  $fecha->format('d/m/Y')?></td>
                            <td><?php $hora=new Carbon($cita->getHora()); echo $hora->format('H:i');?></td>
                            <td><?php echo $cita->getMedicos()->getNombre()?></td>
                            <td><?php echo $cita->getMedicos()->getEspecialidad()?></td>
                            <td><?php $status= $cita->getEstatus(); echo $status == 1 ? 'Atendido' : 'Sin Atender' ?></td>
                            <td>
                                <a href="../admin/editar.php" class="btn btn-primary" title="Editar"><i class="fa-solid fa-file-pen"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <?php $status == 1 ? 'disabled':'' ;
                                if($status == 0):?>
                                <a href="#" class="btn btn-success"><i class="fa-solid fa-check-to-slot"></i></a>
                                <?php endif;?>
                            </td>

                        </tr>
                    <?php  endforeach?>
                        
                </tbody>
            </table>
        </div>
    </div>
                                   
    <?php require '../admin/paginacion.php'?>
</div>





<?php require 'footer.php'?>

