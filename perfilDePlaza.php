<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
  if(isset($_GET['ref'])){
	$idPerfil = $_GET['ref'];
	if($idPerfil != ""){
		include 'php/conexion.php';
		$ppCol = new MongoCollection($db,'pp');
		$pp = $ppCol->findOne(array('_id'=>new MongoId($idPerfil)));
		if($pp != null){
			$puesto = $pp['puesto'];
			$categoria = $pp['categoria'];
			$nivelEdu = $pp['nivelEdu'];
			$edad = $pp['edad'];
		}else{
      $puesto = "";
      $categoria  = "";
      $nivelEdu  = "";
      $edad  = "";
    }
	}
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
        <title>Perfil de Plaza</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div id="container" class="container">
        <h2>
        Perfil de Plaza
        </h2>
        <p>
        Use el formulario siguiente para crear / editar el perfil de plaza.
        </p>
            <form class="form-horizontal" action="php/perfilplazaP.php" method="POST">
              <div class="panel panel-primary">
                <div class="panel-heading">Datos del Perfil</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="puesto">Puesto:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="puesto" placeholder="Puesto"
                      value="<?php if(isset($puesto)){echo $puesto;} ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="categoria">Categoria:</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="categoria">
                        <option value="Banca y Finanzas"
                        <?php if(isset($categoria)){if($categoria == 'Banca y Finanzas'){ echo ' selected="selected"'; }} ?>
                        >Banca y Finanzas</option>
                        <option value="Administracion"
                        <?php if(isset($categoria)){if($categoria == 'Administracion'){ echo ' selected="selected"'; } }?>
                        >Administracion</option>
                        <option value="Ingenieria"
                        <?php if(isset($categoria)){if($categoria == 'Ingenieria'){ echo ' selected="selected"'; } }?>
                        >Ingenieria</option>
                        <option value="Educacion"
                        <?php if(isset($categoria)){if($categoria == 'Educacion'){ echo ' selected="selected"'; } }?>
                        >Educacion</option>
                        <option value="Recursos Humanos"
                        <?php if(isset($categoria)){if($categoria == 'Recursos Humanos'){ echo ' selected="selected"'; } }?>
                        >Recursos Humanos</option>
                        <option value="Mantenimiento"
                        <?php if(isset($categoria)){if($categoria == 'Mantenimiento'){ echo ' selected="selected"'; } }?>
                        >Mantenimiento</option>
                        <option value="Mercadeo"
                        <?php if(isset($categoria)){if($categoria == 'Mercadeo'){ echo ' selected="selected"'; } }?>
                        >Mercadeo</option>
                        <option value="Ventas"
                        <?php if(isset($categoria)){if($categoria == 'Ventas'){ echo ' selected="selected"';} } ?>
                        >Ventas</option>
                        <option value="Tecnico"
                        <?php if(isset($categoria)){if($categoria == 'Tecnico'){ echo ' selected="selected"'; } }?>
                        >Tecnico</option>
                        <option value="Transporte"
                        <?php if(isset($categoria)){if($categoria == 'Transporte'){ echo ' selected="selected"'; } }?>
                        >Transporte</option>
                        <option value="Salud"
                        <?php if(isset($categoria)){if($categoria == 'Salud'){ echo ' selected="selected"'; } }?>
                        >Salud</option>
                        <option value="Gobierno"
                        <?php if(isset($categoria)){if($categoria == 'Gobierno'){ echo ' selected="selected"'; } }?>
                        >Gobierno</option>
                        <option value="Construccion"
                        <?php if(isset($categoria)){if($categoria == 'Construccion'){ echo ' selected="selected"'; } }?>
                        >Construccion</option>
                        <option value="Relaciones Publicas"
                        <?php if(isset($categoria)){if($categoria == 'Relaciones Publicas'){ echo ' selected="selected"'; } }?>
                        >Relaciones Publicas</option>
                        <option value="Comunicaciones"
                        <?php if(isset($categoria)){if($categoria == 'Comunicaciones'){ echo ' selected="selected"'; } }?>
                        >Comunicaciones</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nivelEdu">Nivel Educativo:</label>
                    <div class="col-sm-10">
                      <select name="nivelEdu" class="form-control" >
                        <option value="0"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '0'){ echo ' selected="selected"'; } }?>
                        >Ninguno</option>
                        <option value="1"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '1'){ echo ' selected="selected"'; } }?>
                        >Primaria</option>
                        <option value="2"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '2'){ echo ' selected="selected"'; } }?>
                        >Secundaria</option>
                        <option value="3"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '3'){ echo ' selected="selected"'; } }?>
                        >Pregrado</option>
                        <option value="4"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '4'){ echo ' selected="selected"'; } }?>
                        >Maestria</option>
                        <option value="5"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '5'){ echo ' selected="selected"'; } }?>
                        >Doctorado</option>
                        <option value="6"
                        <?php if(isset($nivelEdu)){if($nivelEdu == '6'){ echo ' selected="selected"'; } }?>
                        >Post-Doctorado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="edad">Años de Experiencia:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="edad" placeholder="Años de Experiencia"
                      value="<?php if(isset($edad)){echo $edad;} ?>"/>
                    </div>
                  </div>
                </div>
              </div>
						  <input type="hidden" value="<?php if(isset($idPerfil)){echo $idPerfil; }?>" name="ref" />
							<input type="submit" class="btn btn-primary" value="Guardar Perfil" />
							<input type="reset" class="btn btn-primary" value="Limpiar" />
            </form>
            <br/>
						<form class="form-horizontal" action="php/idiomasPerfilP.php" method="POST">
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
										if(isset($pp)){if($pp != null){
                      if(isset($pp['idiomas'])){
                      $idiomas = $pp['idiomas'];
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
										}
                  }
										 ?>
									</table>
								</div>
							</div>
							<input type="hidden" value="<?php echo $idPerfil; ?>" name="refIdioma" />
							<input type="submit" class="btn btn-primary" value="Agregar Idioma" />
						</form>
            <br/>
						<form class="form-horizontal" action="php/habilidadesPerfilP.php" method="POST">
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
                    if(isset($pp)){
										if($pp != null){
                      if(isset($pp['habilidades'])){
											$habilidades = $pp['habilidades'];
											foreach ($habilidades as $habilidad) {
												echo "<tr>";
												echo "<td>" . $habilidad . "</td>";
												echo '</tr>';
											}
                    }
										}
                  }
										 ?>
									</table>
								</div>
							</div>
							<input type="hidden" value="<?php echo $idPerfil; ?>" name="refHabilidad" />
							<input type="submit" class="btn btn-primary" value="Agregar Habilidad" />
						</form>
						<br/>
        </div>
      </body>
  </html>
