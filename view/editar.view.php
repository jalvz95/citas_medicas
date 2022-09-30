<?php require 'header.php';
use Carbon\Carbon;
?>


<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Editar Cita</h4><hr>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-center">
                                <label for="">Datos del paciente</label>
                            </div>
                            <input type="hidden" name="idCita" value="<?php echo $cita->getId(); ?>">
                            <input type="hidden" name="idPaciente" value="<?php echo $cita->getPacientes()->getId(); ?>">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $cita->getPacientes()->getNombreP()?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $cita->getPacientes()->getApellidoP()?>">
                                </div>
                            </div>
                        </div>
                            <hr>
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-center">
                                <label for="">Datos de la cita</label>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nombre">Hora</label>
                                    <input type="time" name="hora" class="form-control" id="hora" placeholder="Hora" value="<?php $hora=new Carbon($cita->getHora()); echo $hora->format('H:i');?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nombre">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha" value="<?php $fecha=new Carbon($cita->getFecha()); echo  $fecha->format('Y-m-d');?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                <label for="nombre">Medicos Disponibles</label>
                                <select name="medico" class="form-select">
                                    <option selected disabled>Seleccione Un medico</option>
                                    <?php foreach(obtenerMedicos() as $medico): ?>
                                        <?php if ($medico->getId()== $cita->getMedicos()->getId()):?>
                                            <option value="<?php echo $medico->getId()?>"selected><?php echo $medico->getNombre()?></option>
                                        <?php else:?>
                                        <option value="<?php echo $medico->getId()?>"><?php echo $medico->getNombre()?></option>
                                        <?php endif?>
                                    <?php endforeach ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nombre">Estatus</label>
                                        <select class="form-select"  name="estatus"> 
                                            
                                            <?php if($cita->getEstatus()== 0):?>
                                                <option value="0" selected>Sin Atender</option>
                                                <option value="1">Atendido</option>
                                            <?php else:?>
                                                <option value="0">Sin Atender</option>
                                                <option value="1" selected>Atendido</option>
                                            <?php endif?>
                                        
                                        </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9 d-flex justify-content-center">
                                <?php if (!empty($errores)):?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Epa Panita!</strong> <?php echo $errores?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php endif ?>
                            </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-end">
                                    <input class="btn btn btn-primary" type="submit" name="submit" value="Editar Cita">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>



<?php require 'footer.php'?>