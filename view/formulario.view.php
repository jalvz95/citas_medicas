<?php require 'header.php'?>


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
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
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
                                <input type="time" name="hora" class="form-control" id="hora" placeholder="hora">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Fecha</label>
                                <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nombre">Medicos Disponibles</label>
                                <select class="form-select">
                                    <option selected disabled>Selecciona un medico</option>
                                    <option value="1">Jose Alvarez</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <input class="btn btn btn-primary" type="button" name="submit" value="Guardar Cita">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>



<?php require 'footer.php'?>