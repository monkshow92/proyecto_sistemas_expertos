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
        <title>Lista de Perfiles</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div id="container" class="container">
          <h2>
          Lista de Perfiles de Plaza
          </h2>
          <p>
          Aqui podras ver la lista de perfiles de plaza.
          </p>
          <table class="table table-condensed table-striped table-bordered table-hover">
            <title>Lista de Perfiles de PLaza</title>
            <thead>
              <tr class="info">
                <td>Puesto</td>
                <td>Categoria</td>
                <td>Nivel Educativo</td>
                <td>Años de Experiencia</td>
                <td>Edicion</td>
                <td>Eliminar</td>
                <td>Aspirantes</td>
              </tr>
            </thead>
            <tbody>
              <?php
              include('php/conexion.php');
              $username = $_SESSION["username"];
            	$id = $username['_id'];
            	$ppCol = new MongoCollection($db,'pp');
              $cursor = $ppCol->find(array('userId' => $id));
              foreach ($cursor as $pp) {
								echo "<tr>";
                echo "<td>" . $pp['puesto'] . "</td>";
                echo "<td>" . $pp['categoria'] . "</td>";
                switch ($pp['nivelEdu']) {
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
                echo "<td>" . $pp['edad'] . "</td>";
                echo "<td><a href=\"perfilDePlaza.php?ref=" . $pp['_id'] ."\">Editar</a></td>";
                echo "<td><a href=\"php/eliminarPerfilP.php?ref=" . $pp['_id'] ."\">Eliminar</a></td>";
                echo "<td><a href=\"verAspirantesAplican.php?ref=" . $pp['_id'] ."\">Ver Aspirantes</a></td>";
                echo "</tr>";
              }
               ?>
            </tbody>
          </table>
        </div>
    </body>
  </html>
