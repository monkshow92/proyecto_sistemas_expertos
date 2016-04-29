<?php
if(!empty($_POST)){
	$validapre=false;
	$validares=false;
	if(isset($_POST['email']) && isset($_POST['pregunta']) && isset($_POST['respuesta'])){
		include 'conexion.php';
		$email=$_POST['email'];
		$pregunta=$_POST['pregunta'];
		$respuesta=$_POST['respuesta'];
		$collection=new MongoCollection($db,'users');
		$querypregunta=$collection->findOne(array('email'=>$email),array('pregunta'));
		$queryrespuesta=$collection->findOne(array('email'=>$email),array('respuesta'));
		foreach ($querypregunta as $key => $value) {
			if($value==$pregunta){
                 $validapre=true;
			}
		}
		foreach ($queryrespuesta as $key => $value) {
			if($value==$respuesta){
                 $validares=true;
			}
		}
		if($validapre && $validares){
			$pass=$collection->findOne(array('email'=>$email),array('pass'));
			foreach ($pass as $key => $value) {
				if($key=='pass'){
					$pass= base64_decode($value);
				}
			}
			$mensaje='Buen dia '.$email.'su password es '.$pass;
			mail($email, 'CurriculumExpert', $mensaje);
			print "<script>alert('Mensaje Enviado')</script>";
			print "<script>window.location='../login.php';</script>";
		}else{
             print "<script>alert('la pregunta y respuesta no coinciden')</script>";
		}

	}
}

?>