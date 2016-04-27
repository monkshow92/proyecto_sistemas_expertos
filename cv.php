<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Curriculum Vitae</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <h2>
        Curriculum Vitae
        </h2>
        <p>
        Use el formulario siguiente para crear / editar su curriculum vitae.
        </p>
        <div id="container" class="container embed-responsive embed-responsive-16by9">
            <form class="form-horizontal" action="php/cvP.php" method="post" role="form">
              <div class="panel panel-primary">
                <div class="panel-heading">Datos Personales</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nombres">Nombres:</label>
										<div class="col-sm-10">
                      <input type="text" class="form-control" id="nombres" placeholder="Nombres"/>
										</div>
                  </div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" id="apellidos" placeholder="Apellidos"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="direccion">Direccion:</label>
										<div class="col-sm-10">
                    	<textarea rows="5" class="form-control" id="direccion">
											</textarea>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" id="email" placeholder="Email"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="telFijo">Telefono Fijo:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" id="telFijo" placeholder="Apellidos"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="movil">Telefono Movil:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" id="movil" placeholder="Telefono Movil"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="fechaNac">Fecha de Nacimiento:</label>
										<div class="col-sm-10">
                    	<input type="date" class="form-control" id="fechaNac" placeholder="Fecha de Nacimiento"/>
										</div>
									</div>
                </div>
              </div>
							<input type="submit" class="btn btn-primary" value="Guardar" />
            </form>
      </div>
    </body>
</html>
