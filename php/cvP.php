<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $direccion  = trim($_POST['direccion']);
  $email = $_POST['email'];
  $telFijo = $_POST['telFijo'];
  $movil = $_POST['movil'];
  $fechaNac = $_POST['fechaNac'];

	echo "$nombres";
	echo "$apellidos";
	echo "$direccion";
	echo "$email";
	echo "$telFijo";
	echo "$movil";
	echo "$fechaNac";

  $username = $_SESSION['username'];
  include 'conexion.php';
  $usersCol=new MongoCollection($db,'users');
  $usuario=$usersCol->findOne(array('username'=>$username),array('_id'));
	$id = $usuario['_id'];
	$cvCol = new MongoCollection($db,'cv');
	$cv = $cvCol->findOne(array('userId'=>$id));
	if($cv == null){
		$cvN = array('nombres' => $nombres, 'apellidos' => $apellidos, 'direccion' => $direccion,
		'email'=>$email, 'telFijo' => $telFijo, 'movil' => $movil, 'fechaNac' => $fechaNac,
		'userId' => $id);
		var_dump($cvN);
		$cvCol->insert($cvN);
	}else{
		$cvId = $cv['_id'];
		$cvU = array('nombres' => $nombres, 'apellidos'=>$apellidos, 'direccion' => $direccion,
		'email'=>$email, 'telFijo' => $telFijo, 'movil' => $movil, 'fechaNac' => $fechaNac,
		'userId' => $id,'_id' => $cvId);
		var_dump($cvU);
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
