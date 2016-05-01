<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
  include('php/conexion.php');
  $idPerfil = new MongoId($_GET['ref']);
  $ppCol = new MongoCollection($db,'pp');
  $pp = $ppCol->findOne(array('_id'=>$idPerfil));
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
        <title>Aspirantes del Perfil</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div id="container" class="container">
          <h2>
            Aspirantes al Perfil de Plaza
          </h2>
          <div class="panel panel-default">
            <div class="panel-heading">Datos del Perfil de Plaza</div>
            <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Puesto:</label>
            <div class="col-sm-9">
              <p class="form-control-static"><?php if(isset($pp['puesto'])){echo $pp['puesto']; }?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Categoria:</label>
            <div class="col-sm-9">
              <p class="form-control-static"><?php if(isset($pp['categoria'])){echo $pp['categoria']; }?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Nivel Educativo:</label>
            <div class="col-sm-9">
              <p class="form-control-static"><?php
              if(isset($pp['nivelEdu'])){
              switch ($pp['nivelEdu']) {
                case '0':
                  $nivelEduReq = 'Ninguno';
                  break;
                case '1':
                    $nivelEduReq = 'Primaria';
                    break;
                case '2':
                    $nivelEduReq = 'Secundaria';
                    break;
                case '3':
                    $nivelEduReq = 'Pregrado';
                    break;
                case '4':
                    $nivelEduReq = 'Maestria';
                    break;
                case '5':
                    $nivelEduReq = 'Doctorado';
                    break;
                case '6':
                    $nivelEduReq = 'Post-Doctorado';
                    break;
                default:

                  break;
              }
              echo $nivelEduReq;
            }
              ?></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Años de Experiencia:</label>
            <div class="col-sm-9">
              <p class="form-control-static"><?php if(isset($pp['edad'])){echo $pp['edad']; }?></p>
            </div>
          </div>
        </div>
      </div>
          <h3>
            Estos son los aspirantes que aplican para el perfil de plaza.
          </h3>
          <table class="table table-condensed table-striped table-bordered table-hover">
            <title>Aspirantes al Perfil de Plaza</title>
            <thead>
              <tr class="info">
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Nivel Educativo</td>
                <td>Años de Experiencia</td>
                <td>Ver CV</td>
              </tr>
            </thead>
            <tbody>
              <?php
              $cvCol = new MongoCollection($db,'cv');
              $cursor = $cvCol->find();
              foreach ($cursor as $cv) {
                $experiencias = $cv['experiencia'];

                $edadReq = intval($pp['edad']);
                $edad = 0;
                foreach ($experiencias as $experiencia) {
                  $edad = $edad + intval($experiencia['duracion']);
                }
                $edu = intval($cv['nivelEdu']);
                $eduReq = intval($pp['nivelEdu']);

                $idiomasReq = $pp['idiomas'];
                $idiomas = $cv['idiomas'];
                $cantIReq = count($idiomasReq);
                $cantI = 0;
                foreach ($idiomasReq as $iReq) {
                   foreach ($idiomas as $i) {
                     if($i['idioma'] == $iReq['idioma'] &&
                        intval($i['nivelIdioma']) >= intval($iReq['nivelIdioma']) ){
                          $cantI = $cantI + 1;
                        }
                   }
                }

                $habilidadesReq = $pp['habilidades'];
                $habilidades = $cv['habilidades'];
                $cantHReq = count($habilidadesReq);
                $cantH = 0;
                foreach ($habilidadesReq as $hReq) {
                  foreach ($habilidades as $h) {
                    if($h == $hReq){
                      $cantH = $cantH + 1;
                    }
                  }
                }

                //aqui esta la regla de inferencia:
                //si el aspirante cumple con todos los requisitos
                //del perfil de plaza, entonces aplica para el puesto.
                if($edad >= $edadReq && $edu >= $eduReq
                  && $cantI >= $cantIReq && $cantH >= $cantHReq){
                echo "<tr>";
                echo "<td>" . $cv['nombres'] . "</td>";
                echo "<td>" . $cv['apellidos'] . "</td>";

                switch ($cv['nivelEdu']) {
                  case '0':
                    $nivelEdu = 'Ninguno';
                    break;
                  case '1':
                      $nivelEdu = 'Primaria';
                      break;
                  case '2':
                      $nivelEdu = 'Secundaria';
                      break;
                  case '3':
                      $nivelEdu = 'Pregrado';
                      break;
                  case '4':
                      $nivelEdu = 'Maestria';
                      break;
                  case '5':
                      $nivelEdu = 'Doctorado';
                      break;
                  case '6':
                      $nivelEdu = 'Post-Doctorado';
                      break;
                  default:

                    break;
                }
                echo "<td>" . $nivelEdu . "</td>";
                echo "<td>" . $edad . "</td>";
                echo "<td><a href=\"verCV.php?ref=" . $cv['userId'] ."\">Ver CV</a></td>";
                echo "</tr>";
                }
              }
               ?>
            </tbody>
          </table>
        </div>
    </body>
  </html>
