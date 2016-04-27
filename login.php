<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registro</title>
        <?php include 'php/navbar.php';?>
    </head>
    <body>
        <div id="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 ">
                    <hgroup class="text-info">
                        <h4 class="text-info">Ingresa </h4>
                        <h6 class="text-info">ingrese su usuario y contrasena: <a href="./registro.php">Registrate</a> si aun no tienes una cuenta</h6>

                    </hgroup>
                    <form action="php/loginP.php" method="post" name="login" >
                        <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                            <label for="logear usuario">Usuario</label>
                             <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingrese el nombre de usuario">
                        </fieldset>
                        <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                            <label for="logear usuario">Contrasena</label>
                            <input type="password" name="password" class="form-control" id="usuario" placeholder="Ingrese su contrasena">
                        </fieldset>
                        <input class="btn btn-primary" type="submit" value="Ingresar" ><br>
                        <p class="text-danger" name="mensaje"></p>
                    </form>
                </div>
                <div class="col-sm-4 "></div>
                <div class="col-sm-3 "></div>
            </div>
        </div>
<!--        <script src="javascript/validar_login.js" ></script>-->
    </body>
</html>
