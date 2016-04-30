<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	//Datos generales
  $idioma = $_POST['idioma'];
  $nivelIdioma = $_POST['nivelIdioma'];

  $username = $_SESSION['username'];
  include 'conexion.php';
	$id = $username['_id'];//$usuario['_id'];
	$cvCol = new MongoCollection($db,'cv');
	$cv = $cvCol->findOne(array('userId'=>$id));
	if($cv == null){
    print "<script>alert(\"Debe guardar el curriculum primero!\");</script>";
  }else{
    $cvId = $cv['_id'];
    $cvCol->update(array("_id"=>$cvId),array('$addToSet' =>
      array("idiomas" => array("idioma" => $idioma, "nivelIdioma" => $nivelIdioma))));
    print "<script>alert(\"Idioma agregado!\");</script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar Idioma</title>
    <meta http-equiv="refresh" content="1;../cv.php" />
  </head>
  <body>

  </body>
</html>
