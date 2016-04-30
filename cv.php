<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	include 'php/conexion.php';
	$usersCol=new MongoCollection($db,'users');
  $usuario=$usersCol->findOne(array('username'=>$_SESSION["username"]['username']),array('email','_id'));
	$email = $usuario['email'];
	$id = $usuario['_id'];
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
        Curriculum Vitae
        </h2>
        <p>
        Use el formulario siguiente para crear / editar su curriculum vitae.
        </p>
        <div id="container" class="container">
            <form class="form-horizontal" action="php/cvP.php" method="POST">
              <div class="panel panel-primary">
                <div class="panel-heading">Datos Personales</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nombres">Nombres:</label>
										<div class="col-sm-10">
                      <input type="text" class="form-control" name="nombres" placeholder="Nombres"
											value="<?php echo $nombres; ?>"/>
										</div>
                  </div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" name="apellidos" placeholder="Apellidos"
											value="<?php echo $apellidos; ?>"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="direccion">Direccion:</label>
										<div class="col-sm-10">
                    	<textarea rows="5" class="form-control" name="direccion"><?php echo $direccion; ?></textarea>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" name="email" placeholder="Email"
											value="<?php echo $email; ?>"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="telFijo">Telefono Fijo:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" name="telFijo" placeholder="Telefono Fijo"
											value="<?php echo $telFijo; ?>"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="movil">Telefono Movil:</label>
										<div class="col-sm-10">
                    	<input type="text" class="form-control" name="movil" placeholder="Telefono Movil"
											value="<?php echo $movil; ?>"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="fechaNac">Fecha de Nacimiento:</label>
										<div class="col-sm-10">
                    	<input type="date" class="form-control" name="fechaNac" placeholder="Fecha de Nacimiento"
											value="<?php echo $fechaNac; ?>"/>
										</div>
									</div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="estadoCivil">Estado Civil:</label>
										<div class="col-sm-10">
                    	<select name="estadoCivil" class="form-control" >
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
	                    	<input type="text" class="form-control" name="titulo" placeholder="Titulo"
												value="<?php echo $titulo; ?>"/>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="nivelEdu">Nivel Alcanzado:</label>
											<div class="col-sm-10">
	                    	<select name="nivelEdu" class="form-control" >
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
	                    	<input type="text" class="form-control" name="institucion" placeholder="Institucion"
												value="<?php echo $institucion; ?>"/>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="fechaInicio">Fecha Inicio:</label>
											<div class="col-sm-10">
	                    	<input type="date" class="form-control" name="fechaInicio" placeholder="Fecha Inicio"
												value="<?php echo $fechaInicio; ?>"/>
											</div>
										</div>
										<div class="form-group">
	                    <label class="control-label col-sm-2" for="fechaFin">Fecha Fin:</label>
											<div class="col-sm-10">
	                    	<input type="date" class="form-control" name="fechaFin" placeholder="Fecha Fin"
												value="<?php echo $fechaFin; ?>"/>
											</div>
										</div>
									</div>
								</div>
							<input type="submit" class="btn btn-primary" value="Guardar" />
            </form>
						<br/>
						<form class="form-horizontal" action="php/idiomasP.php" method="POST">
              <div class="panel panel-primary">
                <div class="panel-heading">Idiomas Conocidos</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="idioma">Idioma:</label>
										<div class="col-sm-10">
											<select class="form-control" name="idioma">
												<option value="chino">Chino Mandarin</option>
												<option value="espaniol">Español</option>
												<option value="ingles">Ingles</option>
												<option value="hindi">Hindi</option>
												<option value="portugues">Portugues</option>
												<option value="ruso">Ruso</option>
												<option value="japones">Japones</option>
												<option value="aleman">Aleman</option>
												<option value="frances">Frances</option>
												<option value="coreano">Coreano</option>
												<option value="italiano">Italiano</option>
											</select>
										</div>
                  </div>
									<div class="form-group">
                    <label class="control-label col-sm-2" for="nivelIdioma">Nivel:</label>
										<div class="col-sm-10">
                      <select class="form-control" name="nivelIdioma">
												<option value="1">Basico</option>
												<option value="2">Regular</option>
												<option value="3">Avanzado</option>
											</select>
										</div>
                  </div>
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
							<input type="submit" class="btn btn-primary" value="Agregar Idioma" />
						</form>
						<br/>
						<form class="form-horizontal" action="php/experienciaP.php" method="POST">
						<div class="panel panel-primary">
							<div class="panel-heading">Experiencia Laboral</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-2" for="cargo">Cargo:</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="cargo" placeholder="Cargo"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="funciones">Funciones Principales:</label>
										<div class="col-sm-10">
											<textarea name="funciones" rows="3" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="empleador">Empleador:</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="empleador" placeholder="Empleador"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="ubicacion">Ubicacion:</label>
										<div class="col-sm-10">
											<textarea name="ubicacion" rows="3" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="telContacto">Telefono Contacto:</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="telContacto" placeholder="Telefono Contacto"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="duracion">Duracion (años):</label>
										<div class="col-sm-10">
											<input type="number" class="form-control" name="duracion" placeholder="Duracion en años"/>
										</div>
									</div>
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
						<input type="submit" class="btn btn-primary" value="Agregar Experiencia Laboral" />
						</form>
						<br/>
						<form class="form-horizontal" action="php/habilidadesP.php" method="POST">
              <div class="panel panel-primary">
                <div class="panel-heading">Habilidades</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="habilidad">Habilidad:</label>
										<div class="col-sm-10">
											<select class="form-control" name="habilidad">
												<option value="Liderazgo">Liderazgo</option>
												<option value="Trabajo en equipo">Trabajo en equipo</option>
												<option value="Tolerancia a la frustracion">Tolerancia a la frustracion</option>
												<option value="Iniciativa">Iniciativa</option>
												<option value="Creatividad">Creatividad</option>
												<option value="Confianza en si mismo">Confianza en si mismo</option>
												<option value="Capacidad de comunicacion">Capacidad de comunicacion</option>
												<option value="Honestidad">Honestidad</option>
												<option value="Compromiso y dedicación">Compromiso y dedicación</option>
												<option value="Gusto por los desafíos ">Gusto por los desafíos</option>
											</select>
										</div>
                  </div>
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
							<input type="submit" class="btn btn-primary" value="Agregar Habilidad" />
						</form>
						<br/>
      </div>
    </body>
</html>
