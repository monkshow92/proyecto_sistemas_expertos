<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	include 'php/conexion.php';
  $id = new MongoId($_GET['ref']);
	$usersCol=new MongoCollection($db,'users');
  $usuario=$usersCol->findOne(array('_id'=>$id),array('email'));
	$email = $usuario['email'];
	$cvCol = new MongoCollection($db,'cv');
	$cv = $cvCol->findOne(array('userId'=>$id));
	if($cv != null){
		$nombres = $cv['nombres'];
	  $apellidos = $cv['apellidos'];
	  $direccion  = $cv['direccion'];
	  $telFijo = $cv['telFijo'];
	  $movil = $cv['movil'];
	  $fechaNac = $cv['fechaNac'];
		$estadoCivil = $cv['estadoCivil'];

		$nivelEdu = $cv['nivelEdu'];
		$titulo = $cv['titulo'];
		$institucion = $cv['institucion'];
		$fechaInicio = $cv['fechaInicio'];
		$fechaFin = $cv['fechaFin'];
	}else{
		$fechaNac = getdate();
		$fechaInicio = getdate();
		$fechaFin = getdate();
	}
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
        Ver Curriculum Vitae
        </h2>
        <h3>
        Curriculum Vitae del Aspirante.
        </h3>
        <div id="container" class="container">

              <div class="panel panel-primary">
                <div class="panel-heading">Datos Personales</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="nombres">Nombres:</label>
										<div class="col-sm-9">
                      <p class="form-control-static"><?php echo $nombres; ?></p>
										</div>
                  </div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="apellidos">Apellidos:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $apellidos; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="direccion">Direccion:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $direccion; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $email; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="telFijo">Telefono Fijo:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $telFijo; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="movil">Telefono Movil:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $movil; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="fechaNac">Fecha de Nacimiento:</label>
										<div class="col-sm-9">
                    	<p class="form-control-static"><?php echo $fechaNac; ?></p>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-3" for="estadoCivil">Estado Civil:</label>
										<div class="col-sm-9">
                    	<select name="estadoCivil" class="form-control" disabled="disabled">
												<option value="soltero"
												<?php if($estadoCivil == 'soltero'){ echo ' selected="selected"'; } ?>
												>Soltero</option>
												<option value="casado"
												<?php if($estadoCivil == 'casado'){ echo ' selected="selected"'; } ?>
												>Casado</option>
												<option value="divorciado"
												<?php if($estadoCivil == 'divorciado'){ echo ' selected="selected"'; } ?>
												>Divorciado</option>
												<option value="viudo"
												<?php if($estadoCivil == 'viudo'){ echo ' selected="selected"'; } ?> >Viudo</option>
												<option value="unionlibre"
												<?php if($estadoCivil == 'unionlibre'){ echo ' selected="selected"'; } ?>
												>Union Libre</option>
											</select>
										</div>
									</div>
                </div>
              </div>
							<div class="panel panel-primary">
                <div class="panel-heading">Formacion Academica</div>
                	<div class="panel-body">
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="titulo">Titulo:</label>
											<div class="col-sm-10">
	                    	<p class="form-control-static"><?php echo $titulo; ?></p>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="nivelEdu">Nivel Alcanzado:</label>
											<div class="col-sm-10">
	                    	<select name="nivelEdu" class="form-control" disabled="disabled" >
													<option value="0"
													<?php if($nivelEdu == '0'){ echo ' selected="selected"'; } ?>
													>Ninguno</option>
													<option value="1"
													<?php if($nivelEdu == '1'){ echo ' selected="selected"'; } ?>
													>Primaria</option>
													<option value="2"
													<?php if($nivelEdu == '2'){ echo ' selected="selected"'; } ?>
													>Secundaria</option>
													<option value="3"
													<?php if($nivelEdu == '3'){ echo ' selected="selected"'; } ?>
													>Pregrado</option>
													<option value="4"
													<?php if($nivelEdu == '4'){ echo ' selected="selected"'; } ?>
													>Maestria</option>
													<option value="5"
													<?php if($nivelEdu == '5'){ echo ' selected="selected"'; } ?>
													>Doctorado</option>
													<option value="6"
													<?php if($nivelEdu == '6'){ echo ' selected="selected"'; } ?>
													>Post-Doctorado</option>
												</select>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="institucion">Institucion:</label>
											<div class="col-sm-10">
	                    	<p class="form-control-static"><?php echo $institucion; ?></p>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="fechaInicio">Fecha Inicio:</label>
											<div class="col-sm-10">
	                    	<p class="form-control-static"><?php echo $fechaInicio; ?></p>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="fechaFin">Fecha Fin:</label>
											<div class="col-sm-10">
	                    	<p class="form-control-static"><?php echo $fechaFin; ?></p>
											</div>
										</div>
									</div>
								</div>

						<br/>

              <div class="panel panel-primary">
                <div class="panel-heading">Idiomas Conocidos</div>
                <div class="panel-body">
									<table class="table table-condensed">
										<tr>
											<th>Idioma</th>
											<th>Nivel</th>
										</tr>

										<?php
										if($cv != null){
											$idiomas = $cv['idiomas'];
											foreach ($idiomas as $idioma) {
												echo "<tr>";
												echo "<td>" . $idioma['idioma'] . "</td>";
												switch ($idioma['nivelIdioma']) {
													case '1':
														$nivelIdioma = 'Basico';
														break;
													case '2':
														$nivelIdioma = 'Regular';
														break;
													case '3':
														$nivelIdioma = 'Avanzado';

													default:
														# code...
														break;
												}
												echo "<td>" . $nivelIdioma . "</td>";
												echo '</tr>';
											}
										}
										 ?>
									</table>
								</div>
							</div>

						<br/>

						<div class="panel panel-primary">
							<div class="panel-heading">Experiencia Laboral</div>
								<div class="panel-body">
									<table class="table table-condensed">
										<tr>
											<th>Cargo</th>
											<th>Funciones</th>
											<th>Empleador</th>
											<th>Ubicacion</th>
											<th>Contacto</th>
											<th>Duracion</th>
										</tr>

										<?php
										if($cv != null){
											$experiencias = $cv['experiencia'];
											foreach ($experiencias as $experiencia) {
												echo "<tr>";
												echo "<td>" . $experiencia['cargo'] . "</td>";
												echo "<td>" . $experiencia['funciones'] . "</td>";
												echo "<td>" . $experiencia['empleador'] . "</td>";
												echo "<td>" . $experiencia['ubicacion'] . "</td>";
												echo "<td>" . $experiencia['telContacto'] . "</td>";
												echo "<td>" . $experiencia['duracion'] . "</td>";
												echo '</tr>';
											}
										}
										 ?>
									</table>
								</div>
							</div>

						<br/>

              <div class="panel panel-primary">
                <div class="panel-heading">Habilidades</div>
                <div class="panel-body">
									<table class="table table-condensed">
										<tr>
											<th>Habilidad</th>
										</tr>
										<?php
										if($cv != null){
											$habilidades = $cv['habilidades'];
											foreach ($habilidades as $habilidad) {
												echo "<tr>";
												echo "<td>" . $habilidad . "</td>";
												echo '</tr>';
											}
										}
										 ?>
									</table>
								</div>
							</div>
						<br/>
      </div>
    </body>
</html>
