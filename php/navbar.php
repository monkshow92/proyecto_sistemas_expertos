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
            <a class="nav-link" href="cv.php">MI CURRICULUM</a>
         </li>
         <li class="nav-item" >
            <a class="nav-link" href="listaPerfilesAspirante.php">LISTA DE PERFILES</a>
         </li>
         <?php

         }else{?>
           <li class="nav-item" >
              <a class="nav-link" href="perfilE.php">PERFIL EMPRESA</a>
           </li>
          <li class="nav-item">
            <a class="nav-link" href="perfilDePlaza.php">PERFIL DE PLAZA</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="listaPerfiles.php">LISTA DE PERFILES</a>
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
       <li class="nav-item" style="float: right;margin-right: 30px;">
        <a class="nav-link" href="php/salir.php" >SALIR</a>
       </li>
    <?php endif;?>

    </ul>

</nav>
