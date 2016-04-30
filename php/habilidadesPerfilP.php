<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}else{
	//Datos generales
  $idPerfil = new MongoId($_POST['refHabilidad']);
  $habilidad = $_POST['habilidad'];

  include 'conexion.php';
  $ppCol = new MongoCollection($db,'pp');
	$pp = $ppCol->findOne(array('_id'=>$idPerfil));
	if($pp == null){
    print "<script>alert(\"Debe guardar el perfil de plaza primero!\");window.location='../perfilDePlaza.php';</script>";
  }else{
    $ppCol->update(array("_id"=>$idPerfil),array('$addToSet' =>
      array("habilidades" => $habilidad)));
    print "<script>alert(\"Habilidad agregada!\");</script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar Habilidad a Perfil de Plaza</title>
    <meta http-equiv="refresh" content="1;../perfilDePlaza.php?ref=<?php echo $idPerfil; ?>" />
  </head>
  <body>

  </body>
</html>
