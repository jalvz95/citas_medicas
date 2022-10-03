<?php require 'header.php';
use Carbon\Carbon;
?>


<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Nueva Cita</h4>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center">
                            <label for="">Datos del paciente</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php if(!empty($nombre)){echo $nombre;} ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input required type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?php if(!empty($apellido)){echo $apellido;} ?>">
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
                                <input required type="time" name="hora" class="form-control" id="hora" placeholder="hora" value="<?php if(!empty($hora)){$hora=new Carbon($hora); echo $hora->format('H:i');} ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Fecha</label>
                                <input required type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha" value="<?php if(!empty($fecha)){echo $fecha;} ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre">Medicos Disponibles</label>
                                <select name="medico" class="form-select">
                                    <option selected disabled>Selecciona un medico</option>
                                    <?php foreach(obtenerMedicos() as $medico): ?>
                                    <option value="<?php echo $medico->getId()?>"><?php echo $medico->getNombre()?></option>
                                    <?php endforeach ?>
                                    
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
                            <input class="btn btn btn-primary" type="submit" name="submit" value="Guardar Cita">
                        </div>
                        

                    </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>



<?php require 'footer.php'?>