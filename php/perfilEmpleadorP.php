<?php
session_start();
if(isset($_POST['nombre'])&& isset($_POST['rubro'])&& isset($_POST['sitio'])
	&& isset($_POST['pais'])&& isset($_POST['ciudad'])&& isset($_POST['direccion'])
	){
	include("conexion.php");
       $nombre=$_POST['nombre'];
        $rubro=$_POST['rubro'];
        $pais=$_POST['pais'];
        $ciudad=$_POST['ciudad'];
        $direccion=$_POST['direccion'];
        $sitio=$_POST['sitio'];
        $email=$_POST['email'];
        $moficaEmpresa= array('nombre' =>$nombre ,'pais' =>$pais ,'ciudad' =>$ciudad , 
        	'direccion' =>$direccion ,'email'=>$email, 'sitio' =>$sitio ,'rubro' =>$rubro);
        $collection=new MongoCollection($db,'entidades');
        $array=array('email'=>$email);
        if($collection->update($array,$moficaEmpresa)){
        	print "<script>alert(\"Cambios Realizados\");window.location='../perfilE.php';</script>";
        }else{
        	print "<script>alert(\"Cambios Realizados\");window.location='../perfilEmpleador.php';</script>";
        }

}

?>