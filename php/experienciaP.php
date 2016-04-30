<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	//Datos generales
  $cargo = $_POST['cargo'];
  $funciones = $_POST['funciones'];
  $empleador = $_POST['empleador'];
  $ubicacion = $_POST['ubicacion'];
  $telContacto = $_POST['telContacto'];
  $duracion = $_POST['duracion'];

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
      array("experiencia" => array("cargo" => $cargo, "funciones" => $funciones,
      'empleador' => $empleador, 'ubicacion' => $ubicacion,
      'telContacto' => $telContacto, 'duracion' => $duracion))));
    print "<script>alert(\"Experiencia laboral agregada!\");</script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar Experiencia Laboral</title>
    <meta http-equiv="refresh" content="1;../cv.php" />
  </head>
  <body>

  </body>
</html>
