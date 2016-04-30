<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	//Datos generales
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $direccion  = trim($_POST['direccion']);
  $email = $_POST['email'];
  $telFijo = $_POST['telFijo'];
  $movil = $_POST['movil'];
  $fechaNac = $_POST['fechaNac'];
	$estadoCivil = $_POST['estadoCivil'];

//Formacion academica
	$nivelEdu = $_POST['nivelEdu'];
	$titulo = $_POST['titulo'];
	$institucion = $_POST['institucion'];
	$fechaInicio = $_POST['fechaInicio'];
	$fechaFin = $_POST['fechaFin'];


  $username = $_SESSION['username'];
  include 'conexion.php';
  /*$usersCol=new MongoCollection($db,'users');
  $usuario=$usersCol->findOne(array('username'=>$username),array('_id'));*/
	$id = $username['_id'];//$usuario['_id'];
	$cvCol = new MongoCollection($db,'cv');
	$cv = $cvCol->findOne(array('userId'=>$id));
	if($cv == null){
		$cvN = array('nombres' => $nombres, 'apellidos' => $apellidos, 'direccion' => $direccion,
		'email'=>$email, 'telFijo' => $telFijo, 'movil' => $movil, 'fechaNac' => $fechaNac,
		'estadoCivil' => $estadoCivil,'userId' => $id, 'titulo' => $titulo,
		'nivelEdu' => $nivelEdu, 'institucion' => $institucion, 'fechaInicio' => $fechaInicio,
		'fechaFin' => $fechaFin);
		$cvCol->insert($cvN);
	}else{
		$cvId = $cv['_id'];
		$cvU = array('_id' => $cvId, 'nombres' => $nombres, 'apellidos'=>$apellidos, 'direccion' => $direccion,
		'email'=>$email, 'telFijo' => $telFijo, 'movil' => $movil, 'fechaNac' => $fechaNac,
		'estadoCivil' => $estadoCivil,'userId' => $id, 'titulo' => $titulo,
		'nivelEdu' => $nivelEdu, 'institucion' => $institucion, 'fechaInicio' => $fechaInicio,
		'fechaFin' => $fechaFin);
		$cvCol->save($cvU);
	}
	print "<script>alert(\"Curriculum guardado!\");</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Guardar CV</title>
    <meta http-equiv="refresh" content="1;../cv.php" />
  </head>
  <body>

  </body>
</html>
