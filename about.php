<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Inicio</title>
    </head>
    <body>
        <?php
          include('php/navbar.php');
        ?>
        <div id="container" class="container">
        <h2>
                Acerca de
            </h2>
            <p>
                Este es un sitio web que implementa un Sistema Experto Basado en Reglas para la
                clasificacion de Curriculum Vitae, de ahi su nombre: &quot;Expert Curriculum&quot;.</p>
                <br />
                <h3>Introducción</h3>
        <p>Se propone como proyecto para la clase de sistemas expertos un aplicativo web que reúna las características esenciales de un sistema experto basado en reglas a través de un programa orientado a la gestión de hojas de vida de personas que aplican a una área de trabajo especifica. Este sistema le permitirá al empleador obtener un list top de las hojas de vida que mejor se acomodan al perfil de empleado que la empresa solicita, y así facilitar la labor y criterio del encargado de recursos humanos.
        </p>
        <br />
        <h3>Objetivo General</h3>
        <p>Ofrecer a las PYMES a nivel nacional e internacional una herramienta que facilite a su departamento de RRHH la gestión y examen de los CV llenados en línea de quienes aplican para las plazas de trabajo que estas empresas oferten.
        </p>
        </div>
    </body>
</html>
