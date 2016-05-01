<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
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
		}
	}else{
    print "<script>window.location='listaPerfilesAspirante.php';</script>";
  }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Ver Perfil de Plaza</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div id="container" class="container">
        <h2>
        Ver Perfil de Plaza
        </h2>
        <p>
        A continuacion se muestran los datos del perfil de plaza.
        </p>

              <div class="panel panel-primary">
                <div class="panel-heading">Datos del Perfil</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="puesto">Puesto:</label>
                    <div class="col-sm-9">
                      <p class="form-control-static"><?php echo $puesto; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="categoria">Categoria:</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="categoria" disabled="disabled">
                        <option value="Banca y Finanzas"
                        <?php if($categoria == 'Banca y Finanzas'){ echo ' selected="selected"'; } ?>
                        >Banca y Finanzas</option>
                        <option value="Administracion"
                        <?php if($categoria == 'Administracion'){ echo ' selected="selected"'; } ?>
                        >Administracion</option>
                        <option value="Ingenieria"
                        <?php if($categoria == 'Ingenieria'){ echo ' selected="selected"'; } ?>
                        >Ingenieria</option>
                        <option value="Educacion"
                        <?php if($categoria == 'Educacion'){ echo ' selected="selected"'; } ?>
                        >Educacion</option>
                        <option value="Recursos Humanos"
                        <?php if($categoria == 'Recursos Humanos'){ echo ' selected="selected"'; } ?>
                        >Recursos Humanos</option>
                        <option value="Mantenimiento"
                        <?php if($categoria == 'Mantenimiento'){ echo ' selected="selected"'; } ?>
                        >Mantenimiento</option>
                        <option value="Mercadeo"
                        <?php if($categoria == 'Mercadeo'){ echo ' selected="selected"'; } ?>
                        >Mercadeo</option>
                        <option value="Ventas"
                        <?php if($categoria == 'Ventas'){ echo ' selected="selected"'; } ?>
                        >Ventas</option>
                        <option value="Tecnico"
                        <?php if($categoria == 'Tecnico'){ echo ' selected="selected"'; } ?>
                        >Tecnico</option>
                        <option value="Transporte"
                        <?php if($categoria == 'Transporte'){ echo ' selected="selected"'; } ?>
                        >Transporte</option>
                        <option value="Salud"
                        <?php if($categoria == 'Salud'){ echo ' selected="selected"'; } ?>
                        >Salud</option>
                        <option value="Gobierno"
                        <?php if($categoria == 'Gobierno'){ echo ' selected="selected"'; } ?>
                        >Gobierno</option>
                        <option value="Construccion"
                        <?php if($categoria == 'Construccion'){ echo ' selected="selected"'; } ?>
                        >Construccion</option>
                        <option value="Relaciones Publicas"
                        <?php if($categoria == 'Relaciones Publicas'){ echo ' selected="selected"'; } ?>
                        >Relaciones Publicas</option>
                        <option value="Comunicaciones"
                        <?php if($categoria == 'Comunicaciones'){ echo ' selected="selected"'; } ?>
                        >Comunicaciones</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="nivelEdu">Nivel Educativo:</label>
                    <div class="col-sm-9">
                      <select name="nivelEdu" class="form-control"  disabled="disabled">
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
                    <label class="control-label col-sm-3" for="edad">Años de Experiencia:</label>
                    <div class="col-sm-9">
                      <p class="form-control-static"><?php echo $edad; ?></p>
                    </div>
                  </div>
                </div>
              </div>

            <br/>

              <div class="panel panel-primary">
                <div class="panel-heading">Idiomas Requeridos</div>
                <div class="panel-body">
									<table class="table table-condensed">
										<tr>
											<th>Idioma</th>
											<th>Nivel</th>
										</tr>

										<?php
										if($pp != null){
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
										 ?>
									</table>
								</div>
							</div>

            <br/>

              <div class="panel panel-primary">
                <div class="panel-heading">Habilidades Requeridas</div>
                <div class="panel-body">
									<table class="table table-condensed">
										<tr>
											<th>Habilidad</th>
										</tr>
										<?php
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
										 ?>
									</table>
								</div>
							</div>
						<br/>
        </div>
      </body>
  </html>
