<?php
$temp=FALSE;
if(!empty($_POST)){
    if(isset($_POST['usuario'])&&isset($_POST['tipoUsuario']) && isset($_POST['email'])
        && isset($_POST['password'])&& isset($_POST['confirm_password'])){
        include_once 'conexion.php';//aqui tener cuidado por si no hace lo que se necesita cambiar a solo include
       $collection=new MongoCollection($db,'users');
       $emailquery=array('email'=>$_POST['email']);
       $userquery=array('username'=>$_POST['usuario']);
       $listuser=$collection->find($userquery);
       $listEmail=$collection->find($emailquery);
       foreach ($listEmail as $email){
           $temp=TRUE;
           echo "<script>error();windowlocation='../registro.php';</script>";
       }
       foreach ($listuser as $user){
           $temp=TRUE;
            echo "<script>alert(\"Nombre de usuario ya estan registrados.\");window.location='../registro.php';</script>";
       }
       if(!$temp){
           //creando el nuevo usuario para guardarlo en la base de datos
           $newUser=array('username'=>$_POST['usuario'],'email'=>$_POST['email'],
               'user'=>$_POST['tipoUsuario'],'pass'=>$_POST['password'],'date_new'=> date('Y-m-d H:i:s'));
            $collection=new MongoCollection($db,'users');
            $collection->insert($newUser);
            print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../index.php';</script>";
       }

    }//aqui terminar el if de validacion si existe
    
}//aqui termina el primer if

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pueda que me tire un error aqui
