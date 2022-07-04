<?php
       $ID_tarea=$_POST['ID_tarea'];
       $tarea=$_POST['tarea'];
       $fechaF=$_POST['fecha'];
       
    include 'bd.php';
    $sql="UPDATE t_tarea SET tarea='$tarea' , fechaF='$fechaF' WHERE ID_tarea=$ID_tarea";
    $result=mysqli_query($conexion, $sql);

    if($result){
        header("location: ./tareas.php");

    }

?>