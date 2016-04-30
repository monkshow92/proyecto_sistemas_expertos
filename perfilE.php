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
    	<form class="form-horizontal" action="perfilEmpleador.php" method="POST">
    	    <div  class="panel panel-primary"> 
    	        <div class="panel-heading">Datos Empleador</div>
    	           <div class="col-sm-12">
                    <table class="table table-condensed">
                    <tr>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Nombre del Empleador:</label><br>
                        </fieldset>
                    	</td>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($nombre)){echo "";}else{echo $nombre;}?> </label><br>
                        </fieldset>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		 <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Rubro Empleador: </label><br>
                        </fieldset>
                        
                    	</td>
                    	<td>
                    		 <fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($rubro)){echo "";}else{echo $rubro;}?> </label><br>
                        </fieldset>
                        
                    	</td>
                    </tr>
                     <tr>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Sitio Web del Empleador:</label><br>
                        </fieldset>
                    	</td>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($sitio)){echo "";}else{echo $sitio;}?></label><br>
                        </fieldset>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Pais del Empleador:</label><br>
                        </fieldset>
                    	</td>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($pais)){echo "";}else{echo $pais;}?></label><br>
                        </fieldset>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Ciudad del Empleador: </label><br>
                        </fieldset>
                    	</td>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($ciudad)){echo "";}else{echo $ciudad;}?></label><br>
                        </fieldset>
                    	</td>
                    </tr>
                    <tr>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario">Direccion del Empleador: </label>
                        </fieldset>
                    	</td>
                    	<td>
                    		<fieldset class="form-group">
                            <!-- etiqueta para guardar nombre del nuevo usuario-->
                        <label for="logear usuario"><?php if(!isset($direccion)){echo "";}else{echo $direccion;}?> </label>
                        </fieldset>
                    	</td>
                    </tr>
                    	<tr >
                    		<td>
                    			<input id="guardar" type="submit" class="btn btn-primary" value="Modificar" ></input>
                    		</td>
                    		
                    	</tr>
                    </table>
    	            </div>
    	        </div>
    	         
    	    </div>
    	</form>
        </div>
    </div>
</div>
</body>