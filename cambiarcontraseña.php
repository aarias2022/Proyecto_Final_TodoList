<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
	
<div class="container">
    <form action="actualizarcontra.php" method="post">
	<h1 class="animate__animated animate__backInLeft">Cambiar Contraseña</h1>


     	<label>Contraseña Actual</label>
     	<input type="password" 
     	       name="contraseñaActual" 
     	       placeholder="Contraseña actual">
     	       <br>

     	<label>Nueva Contraseña</label>
     	<input type="password" 
     	       name="contraseña" 
     	       placeholder="Nueva Contraseña">
     	       <br>

     	<label>Confirmar Contraseña</label>
     	<input type="password" 
     	       name="ccontraseña" 
     	       placeholder="confirmar contraseña">
     	       <br>

			   <br>

     	<button class="btn btn-success">Actualizar Contraseña</button>
     </form>
</div>
<script src="js/script.js"></script>
</body>
</html>

