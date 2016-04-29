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
        <div id="container" class="embed-responsive embed-responsive-16by9">
            <div class="row">
                <div class="col-sm-4 "></div>
                <div class="col-sm-4 ">
                    <hgroup class="text-info">
                        <h4 class="text-info">Registrate</h4>
                        <h6 class="text-info">Las contrasenas deben tener un minimo de 6 carateres</h6>

                    </hgroup>
                    <form action="php/registroP.php" method="post" name="registro">
                        <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                            <label for="formGroupExampleInput">Usuario</label>
                             <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingrese el nombre de usuario" pattern="^([a-zA-Z]+[0-9]{0,4}){4,12}$" required title="Nombre de usuario">
                        </fieldset>
                        <fieldset class="form-group-sm">
                            <!-- Select para guardar el tipo de usuario-->
                        <label for="seleccionarUsuario">Tipo Usuario</label>
                        <select class="form-control" id="estadocivil" name="tipoUsuario">
                            <option>Empresa</option>
                            <option>Aspirante</option>
                        </select>
                        </fieldset>
                        <fieldset class="form-group">
                         <!-- caja de guardar el correo electronico-->
                            <label for="email">Correo ELectronico</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su Correo Electronico">
                        </fieldset>
                        <fieldset class="form-group">
                         <!-- caja para guardar la contrasena-->
                        <label for="pass">Contrasena</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese los dos nombres">
                    </fieldset>
                    <fieldset class="form-group">
                        <!-- caja para guardar la confirmacion de la contrasena-->
                        <label for="confirm_pass">Confirmar Contrasena</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Ingrese los dos nombres">
                    </fieldset>
                    <fieldset class="form-group-sm">
                            <!-- Select para guardar el tipo de usuario-->
                        <label for="seleccionarUsuario">Elige una pregunta</label>
                        <select class="form-control" id="pregunta" name="pregunta">
                           <!--  <option>Elige una pregunta</option> -->
                            <option>Equipo favorito</option>
                            <option>Comida Favorita</option>
                            <option>Nombre de tu Mascota</option>
                        </select>
                    </fieldset>
                   <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="formGroupExampleInput"></label>
                        <input type="text" name="respuesta" class="form-control" id="respuesta" placeholder="Ingrese una respuesta" title="Ingresa una respuesta a la pregunta">
                    </fieldset> 
                    <input class="btn btn-primary" type="submit" value="Registrar" >
                    <p class="text-danger" id="mensaje" ></p>
                    </form>
                </div>
                <div class="col-xs-6 col-sm-4 "></div>
                </div>
        </div>
        <script src="javascript/validar_registro.js" ></script>
    </body>
</html>
