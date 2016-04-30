<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<html>
	<head>
		<title>home</title>
		<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">

		<h1>Bienvenido</h1

</div>
</div>
</div>
	</body>
</html>
