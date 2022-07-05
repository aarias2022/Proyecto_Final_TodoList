<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Estilos2.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>
<h1 class="animate__animated animate__backInLeft">Buscar Tarea</h1>

<div >
    <form action=""  method="GET">
      <div class="form-group">
        <label for="title">Tarea</label>
        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar tarea"
          >
          <br>
          <input type="submit" name="Buscar" value ="Buscar">
      </div>      
      </form>
    
    
<table border="1"> 
<?php 
if(isset($_GET['Buscar']) && "SELECT * FROM t_tarea WHERE usuarios_id=".$_SESSION['ID']){ 
    $busqueda =$_GET['busqueda']; 

    $conexion = mysqli_connect("localhost","root","","bd_todo");

    $consulta = $conexion->query("SELECT * FROM t_tarea WHERE  tarea LIKE '%$busqueda%' OR fecha LIKE  '%$busqueda%'
    OR fechaF LIKE  '%$busqueda%' "); 
    while ($row =$consulta->fetch_array()){ 

        ?>
        
        <table class="table table-dark table-hover">
            
        <thead>
          <tr>
            <th scope="col" name="ID_Tarea">Nro Tarea</th>
            <th scope="col">Lista de tareas</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Fecha de entrega</th>
          <th>Action</th>
          </tr>
        </thead>
        <tbody>
      
        <?php
                  include 'bd.php';
                 
                          $ID_tarea = $row['ID_tarea'];
                          $tarea = $row['tarea'];
                          $fecha = $row['fecha'];
                          $fechaF = $row['fechaF'];
                      
                       ?>
                      <tr>
                      <td><?php echo $ID_tarea ?></td>
                      <td><?php echo $tarea ?></td>
                      <td>
                      <select id="prioridad" name="prioridad" class=" btn btn-primary btn-sm dropdown-toggle" onchange="ShowSelected();">            
                    <option value="value1">Alto</option>
                    <option value="value2" selected>Normal</option>
                    <option value="value3">Bajo</option>
                    </select>
                      </td>
                      <td><?php echo $fecha ?></td>
                      <td><?php echo $fechaF ?></td>
                      <td>
                      <a href = "eliminar.php?ID_tarea=<?php echo $ID_tarea ?>" class="btn btn-danger btn-sm">Eliminar</a>
                      <a href = "editartarea.php?ID_tarea=<?php echo $ID_tarea ?>" class=" btn btn-warning btn-sm">Editar</a>
                      <button type="button" class=" btn btn-primary btn-sm dropdown-toggle" id="darkButton"
                      data-bs-toggle="dropdown" aria-expanded="fase">Estado
                      </button>
                      <ul class ="dropdown-menu dropdown-menu-dark">
                          <li><a href = "#" class="dropdown-item">Inicio</a></li>
                          <li><a href = "#" class="dropdown-item">En Proceso</a></li>
                          <li><a href = "#" class="dropdown-item">Finalizo</a></li>                           
                      </ul>
                      </tr>
                      </tr>
                      <?php
          ?>
         
        </tbody>
      <?php

    } 
} 
?> 
</table> 
<script src="js/script.js"></script>  
</body>
</html>