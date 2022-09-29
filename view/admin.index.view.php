<?php require 'header.php'?>

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
            <table class="table table-dark table-hover border">
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
                    <tr>
                        <td scope=col>1</td>
                        <td>Jose</td>
                        <td>Alvarez</td>
                        <td>28/9/2022</td>
                        <td>16:00</td>
                        <td>Jose Alvarez</td>
                        <td>Otorrino</td>
                        <?php $status= 0; $estado_cita= $status == 1 ? 'Atendido' : 'Sin Atender' ?>
                        <td><?php echo $estado_cita?></td>
                        <td>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                            <?php $status= 0; $disable= $status == 1 ? 'disabled':'' ?>
                            <a href="#" class="btn btn-outline-success <?php echo $disable ?>">Atendido</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jose</td>
                        <td>Alvarez</td>
                        <td>28/9/2022</td>
                        <td>16:00</td>
                        <td>Jose Alvarez</td>
                        <td>Odontologia</td>
                        <td>Paciente atendido</td>
                        <td>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                            <a href="#" class="btn btn-outline-success">Atendido</a>
                        </td>
                    </tr>
                        
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php require 'footer.php'?>

