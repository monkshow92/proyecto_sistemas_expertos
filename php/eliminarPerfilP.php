<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
  include 'conexion.php';
  $idPerfil = new MongoId($_GET['ref']);
  $ppCol = new MongoCollection($db,'pp');
  $ppCol->remove(array("_id" => $idPerfil));
  print "<script>alert(\"Perfil de Plaza Eliminado!\");</script>";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Guardar Perfil de Plaza</title>
    <meta http-equiv="refresh" content="1;../listaPerfiles.php" />
  </head>
  <body>

  </body>
</html>
