<?php require 'header.php';
use Carbon\Carbon;
?>


<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Nuevo Medico</h4>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-center">
                            <label for="">Datos del Medico</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del Medico" value="<?php if(!empty($nombre)){echo $nombre;} ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="apellido">Especialidad</label>
                                <input required type="text" name="especialidad" class="form-control" id="apellido" placeholder="Especialidad" value="<?php if(!empty($especialidad)){echo $especialidad;} ?>">
                            </div>
                        </div>
                    </div>
                        <hr>

                    <div class="row">
                    <div class="col-md-9 d-flex justify-content-center">
                        <?php if (!empty($errores)):?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Porfavor Revisa bien los campos</strong> <?php echo $errores?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif ?>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <input class="btn btn btn-primary" type="submit" name="submit" value="Agregar Medico">
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>



<?php require 'footer.php'?>