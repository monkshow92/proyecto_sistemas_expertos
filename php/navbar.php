<div class="page-header ">
    <h3 style="text-align:  center">Expert Curriculum</h3>
</div>
<nav class="navbar navbar-light bg-faded">
   <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="./">INICIO</a>
    </li>

  <!--  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>-->
    <?php if(!isset($_SESSION['username'])):?>
       <li class="nav-item">
        <a class="nav-link" href="./registro.php">REGISTRO</a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="./login.php">LOGIN</a>
       </li>
     <?php else:?>
       <li class="nav-item">
        <a class="nav-link" href="php/salir.php">LOGOUT</a>
       </li>
    <?php endif;?>
    <li class="nav-item">
      <a class="nav-link" href="./about.php">ACERCA DE</a>
    </li>
    </ul>

</nav>
