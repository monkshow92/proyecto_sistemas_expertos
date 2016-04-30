<?php
$temp=FALSE;
if(!empty($_POST)){
    if(isset($_POST['usuario'])&&isset($_POST['tipoUsuario']) && isset($_POST['email'])
        && isset($_POST['password'])&& isset($_POST['confirm_password']) && isset($_POST['pregunta']) 
        && isset($_POST['respuesta']) ){
        include 'conexion.php';//aqui tener cuidado por si no hace lo que se necesita cambiar a solo include
       $collection=new MongoCollection($db,'users');
       $emailquery=array('email'=>$_POST['email']);
       $userquery=array('username'=>$_POST['usuario']);
       $listuser=$collection->find($userquery);
       $listEmail=$collection->find($emailquery);
       foreach ($listEmail as $email){
           $temp=TRUE;
           echo "<script>window.location='../registro.php';</script>";
       }
       foreach ($listuser as $user){
           $temp=TRUE;
            echo "<script>alert(\"Nombre de usuario ya estan registrados.\");window.location='../registro.php';</script>";
       }
       if(!$temp){
           //creando el nuevo usuario para guardarlo en la base de datos
            //utilizo el metodo de sha1 para encriptar la contrasena 
        // agregare la pregunta y respuesta para cuando el usuario pierda la contrasena
           $newUser=array('username'=>$_POST['usuario'],'email'=>$_POST['email'],
               'user'=>$_POST['tipoUsuario'],'pass'=>base64_encode($_POST['password']),'pregunta'=>$_POST['pregunta'],'respuesta'=>$_POST['respuesta'],'date_new'=> date('Y-m-d H:i:s'));
            $collection=new MongoCollection($db,'users');
            $collection->insert($newUser);
            $collection=new MongoCollection($db,'entidades');
            $entidad= array('email' =>$_POST['email']);
            if($collection->insert($entidad)){
            print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";}
       }

    }
    //aqui terminar el if de validacion si existe
    
}//aqui termina el primer if

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pueda que me tire un error aqui
