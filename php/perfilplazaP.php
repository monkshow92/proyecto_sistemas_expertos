<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
  $idPerfil = $_POST['ref'];
  $puesto = $_POST['puesto'];
  $categoria = $_POST['categoria'];
  $nivelEdu = $_POST['nivelEdu'];
  $edad = $_POST['edad'];

  $username = $_SESSION['username'];
  include 'conexion.php';
  /*$usersCol=new MongoCollection($db,'users');
  $usuario=$usersCol->findOne(array('username'=>$username),array('_id'));*/
	$id = $username['_id'];//$usuario['_id'];
	$ppCol = new MongoCollection($db,'pp');
  if($idPerfil == ""){
    $pp = array('puesto' => $puesto, 'categoria' => $categoria,
      'nivelEdu' => $nivelEdu, 'edad' => $edad, 'userId' => $id);
    $ppCol->insert($pp);
    $idPerfil = $pp['_id'];
  }else{
    $pp = array('_id' => new MongoId($idPerfil),'puesto' => $puesto, 'categoria' => $categoria,
      'nivelEdu' => $nivelEdu, 'edad' => $edad, 'userId' => $id);
    $ppCol->save($pp);
  }
  print "<script>alert(\"Perfil de Plaza Guardado!\");</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Guardar Perfil de Plaza</title>
    <meta http-equiv="refresh" content="1;../perfilDePlaza.php?ref=<?php echo $idPerfil; ?>" />
  </head>
  <body>

  </body>
</html>
