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
        foreach ($usuario as $usuario=>$value) {
            if($value==$pass){
                $entrar=True;

            }

        }
        if($entrar){
            session_start();
	   $_SESSION["username"]=$_POST['usuario'];
	   print "<script>;window.location='../home.php';</script>";
        }else{
            print "<script>window.location='../login.php';</script>";
        }
    }
}
?>
