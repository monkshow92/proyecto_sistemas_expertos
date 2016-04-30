<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <title>Inicio</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div class="container" id="container">
        <h2>
        SEBR para la Clasificacion de Curriculum Vitae
        </h2>
        <p>
        Para obtener más información acerca de nuetro sitio, visite la pagina de
        <a href="about.php">Acerca de</a>
        </p>
        </div>
    </body>
</html>
