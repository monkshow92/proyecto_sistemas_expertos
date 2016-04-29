<!DOCTYPE html>
<html lang="es">
<head>
	<title>recuperar su contase&ntilde;a</title>
	<meta charset="utf-8">
	<link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
     <div id="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 ">
                    <hgroup class="text-info">
                        <h4 class="text-info">Recupera tu pass </h4>
                    </hgroup>
                    <form action="php/recuperarpassP.php" method="post" name="recuperar" >
                        <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                            <label for="buscarpass">Email</label>
                             <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su correo Electronico">
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
                            <label for="buscarpass"></label>
                            <input type="text" name="respuesta" class="form-control" id="respuesta" placeholder="Ingresa tu Respuesta">
                        </fieldset>
                        <input class="btn btn-primary" type="submit" value="Enviar" ><br>
                        <p class="text-danger" name="mensaje"></p>
                      
                    </form>
                </div>
                <div class="col-sm-4 "></div>
                <!-- <div class="col-sm-3 "></div> -->
            </div>
        </div>
</body>
</html>