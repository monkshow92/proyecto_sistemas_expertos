<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	//Datos generales
  $habilidad = $_POST['habilidad'];

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
      array("habilidades" => $habilidad)));
    print "<script>alert(\"Habilidad agregada!\");</script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar Habilidad</title>
    <meta http-equiv="refresh" content="1;../cv.php" />
  </head>
  <body>

  </body>
</html>
