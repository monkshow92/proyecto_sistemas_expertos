<?php
include 'php/navbar.php';
define('BR','<br/>');
echo BR . "Probando conexion".BR;
//conectando a MongoDB
//obteniendo la coleccion de usuarios
include 'php/conexion.php';
//$db = conectar();
$users = $db->users;
//creando un documento
//$usuario = array("nombre" => "Dennis", "username" => "dennis_zill",
//"password" => "987654321");
//$users->insert($usuario);
//$person = $users->findOne();
//$users->remove(array("_id" => $person['_id']));
echo BR . "cantidad de usuarios: " . $users->count() . BR;
echo BR;
//var_dump($usuario);
$cursor = $users->find();
foreach($cursor as $usuario){
	echo BR . "id: " . $usuario['_id'];
	echo BR . "user: " . $usuario['user'];
	//var_dump($usuario['nombre']);
	echo BR . "username: " . $usuario['username'];
	echo BR . "email: " . $usuario['email'];
	echo BR . "date_new: " . $usuario['date_new'];
	echo BR . "pass: " . $usuario['pass'] . BR;
}
echo BR . "Conexion con Mongo establecida";
//echo phpinfo();
?>
