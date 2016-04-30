<?php
if(!empty($_POST)){
    $entrar=FALSE;
    if(isset($_POST['usuario']) && isset($_POST['password'])){
        include 'conexion.php';
        $collection=new MongoCollection($db,'users');
        //$userquery=array('username'$_POST['usuario']);
        $user=$_POST['usuario'];
        $pass=$_POST['password'];
      //  $listuser=$collection->find();
        $usuario=$collection->findOne(array('username'=>$user),array('pass'));
        if($usuario!=null){
            foreach($usuario as $key=>$value) {
            if($value==base64_encode($pass)){
                $entrar=True;//base64_decode

            }

        }
        }
        
        if($entrar){
            session_start();
            $usuario=$collection->findOne(array('username'=>$user),array('username','user','email'));
            if($usuario!=null){
                $_SESSION["username"]=$usuario;
            }
            
         print "<script>;window.location='../home.php';</script>";
        }else{
          print "<script>window.location='../login.php';</script>";
        }
    }
}
?>
