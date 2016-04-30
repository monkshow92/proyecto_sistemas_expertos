<div class="page-header ">
    <h3 style="text-align:  center">Expert Curriculum</h3>
</div>
<nav class="navbar navbar-light bg-faded">
   <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="./index.php">INICIO</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./about.php">ACERCA DE</a>
    </li>
    <?php 
     if(isset($_SESSION['username'])){
      $lista=$_SESSION['username'];
         foreach ($lista as $key => $value) {
            if($key=='user'){
              $tipo=$value;
              break;
            }
         }
         if($tipo=='Aspirante'){?>
         <li class="nav-item" >
            <a class="nav-link" href="#">MI CURRICULUM</a>
         </li>
         <li class="nav-item" style="float: right;margin-right: 30px;">
            <a class="nav-link" href="#">MI PERFIL</a>
         </li>
         <?php
          
         }else{?>
             <li class="nav-item">
            <a class="nav-link" href="#">BUSCAR</a>
         </li>
          </li>
         <li class="nav-item" style="float: right;">
            <a class="nav-link" href="#">PERFIL EMPRESA</a>
         </li>
         <?php

         }
     }

    ?>

  <!--  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>-->
    <?php if(!isset($_SESSION['username'])):?>
       <li class="nav-item">
        <a class="nav-link" href="./registro.php">REGISTRO</a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="./login.php">ENTRAR</a>
       </li>
     <?php else:?>
       <li class="nav-item">
        <a class="nav-link" href="php/salir.php">SALIR</a>
       </li>
    <?php endif;?>
    
    </ul>

</nav>
