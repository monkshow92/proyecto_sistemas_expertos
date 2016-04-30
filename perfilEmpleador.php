<?php session_start(); 
if(isset($_SESSION['username'])){
	$lista=$_SESSION['username'];
	foreach ($lista as $key => $value) {
            if($key=='email'){
              $email=$value;
              break;
            }
            if($key=='username'){
            	$username=$value;
            }
    }
    include('php/conexion.php');
    $collection=new MongoCollection($db,'entidades');
$entidades=$collection->findOne(array('email'=>$email),
	array('nombre','rubro','pais','ciudad','direccion','sitio'));
	if($entidades!=null){
		foreach($entidades as $key => $value){
			if($key=="nombre"){
					$nombre=$value;
			}
			if($key=="rubro"){
					$rubro=$value;
				
			}
			if($key=="pais"){
					$pais=$value;
			}
			if($key=="ciudad"){
					$ciudad=$value;
			}
			if($key=="direccion"){
					$direccion=$value;
			}
			if($key=="sitio"){
					$sitio=$value;
				
			}
		}

	}else{
        $nombre="";
        $rubro="";
        $pais="";
        $ciudad="";
        $direccion="";
        $sitio="";
      print "<script>$('#modi').attr('disabled', false);$('#guardar').attr('disabled', true);</script>";
	}
   
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Perfil Empleador</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('php/navbar.php'); ?>
<div id="container" class="container embed-responsive embed-responsive-16by9">
    <div class="row">
    	<div class="col-sm-6">
    	<hgroup>
    		<h4>Datos importantes del empleador</h4>
    	</hgroup>
    		<form class="form-horizontal" action="php/perfilEmpleadorP.php" method="POST">
    			<div  class="panel panel-primary">
    			<div class="panel-heading">Datos Empleador</div>
    			  <div class="col-sm-12">
    			  	<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Nombre del Empleador</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de usuario" value="<?php if(!isset($nombre)){echo "";}else{echo $nombre;}?>">
                    </fieldset>
                    <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"></label>
                        <label for="seleccionarUsuario">Rubro de la Empresa</label>
                        <select class="form-control" id="rubro" name="rubro">
                            <option><?php if(!isset($rubro)){echo "";}else{echo $rubro;}?></option>
                            <option>opcion1</option>
                            <option>opcion2</option>
                            <option>opcion3</option>
                            <option>opcion4</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Sitio Web</label>
                        <input type="text" name="sitio" class="form-control" id="sitioweb" placeholder="sitio web" value="<?php if(!isset($sitio)){echo "";}else{echo $sitio;}?>" />
                    </fieldset>
                    <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"></label>
                        <label for="seleccionarUsuario">Pais</label>
                        <select class="form-control" id="pais" name="pais">
                            <option><?php if(!isset($pais)){echo "";}else{echo $pais;}?></option>
                            <option>opcion2</option>
                            <option>opcion3</option>
                            <option>opcion4</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"></label>
                        <label for="seleccionarUsuario">Ciudad</label>
                        <select class="form-control" id="ciudad" name="ciudad">
                            <option><?php if(!isset($ciudad)){echo "";}else{echo $ciudad;}?></option>
                            <option>opcion2</option>
                            <option>opcion3</option>
                            <option>opcion4</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Direccion</label>
                        <textarea rows="2" class="form-control" 
                        name="direccion"  ><?php if(!isset($direccion)){echo "";}else{echo $direccion;}?></textarea>
                    </fieldset>
                    <table style="float: right;">
                    	<tr >
                    		<td>
                    			<input id="guardar" type="submit" class="btn btn-primary" value="Guardar" ></input>
                    		</td>
                    		<td>
                    			<input type="hidden" name="email" value="<?php echo $email;?>"></input>
                    		</td>
                    		
                    	</tr>
                    </table>
                    
    			  </div>
    				
    			</div>
    		</form>
    	</div>
    	<div class="col-sm-1"></div>
    	<div class="col-sm-3">
    	<h5 style="margin:0px;padding: 0px;float: right;text-align: left; ">Usuario: <?php echo $username;?></h5><br>
    	<h5 style="margin:0px;padding: 0px;float: right;text-align: left; ">Email: <?php echo $email;?></h5>
    	</div>
    </div>
	
</div>


</body>
</html>
