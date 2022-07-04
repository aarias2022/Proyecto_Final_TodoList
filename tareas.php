<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <h1  class="text-center py-4 my-4">Hola, <b><?php echo htmlspecialchars($_SESSION["valid"]); ?></b> Bienvenid@ a tu lista de Tareas</h1>
     
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Estilos2.css">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
  </head>
  <body id="body">

  <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa fa-edit"></i>
            <h4>lista de tareas</h4>
        </div>
    
        <div class="options__menu">	

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="buscar.php">
                <div class="option">
                    <i class="fa fa-search" title="Buscar"></i>
                    <h4>Buscar</h4>
                </div>
            </a>

            <a href="cambiarcontraseña.php">
                <div class="option">
                    <i class="far fa-address-card" title="Cambiar Contraseña"></i>
                    <h4>Cambiar Contraseña</h4>
                </div>
            </a>
            
            <a href="cerrarsesion.php">
                <div class="option">
                    <i class="far fa-id-badge" title="Cerrar"></i>
                    <h4>Cerrar Sesion</h4>
                </div>
            </a>

            </div>
        </div>
  <main>
    <h2 th:text="'Listado de tareas de ' + ${usuario.nombre}"></h2>
    <h1 class="text-center py-4 my-4">Lista de Tareas</h1>

    <div class="w-50 m-auto">
    <form action="insertar.php" method="post">
        <div class="form-group">
            <label for="title">Ingrese una tarea nueva</label>
            <input class="form-control"  type="text" name="tarea" id="tarea" placeholder="Ingrese tarea" Required>
            <label for="title">Ingrese fecha</label>
            <input class="form-control"  type="date" name="fecha" id="fecha" Required>

        </div><br>
        <button class="btn btn-success">Agregar Tarea</button>
    </form>

    </div><br>
    <hr class="bg-dark w-50 m-auto">
    <div class="lists w-50 m-auto my-4">
        <h1>Tu lista de tareas</h1>
        <div id="lists">
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
           
            $sql = "SELECT * FROM t_tarea WHERE usuarios_id=".$_SESSION['ID'];
            $result = mysqli_query($conexion,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
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
              }
        }
    
    ?>
   
  </tbody>
</table>
        </div>
    </div>
    </main>
    <script src="js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
