<?php
if (isset($_POST)){
    $inc = include("bd.php");
    if ($inc) {
        $idEliminar= $_GET['id'];
        $eliminar = "DELETE FROM film2 where id = '$idEliminar' ";
        $resultadoEliminar = mysqli_query($conex, $eliminar);
        if($resultadoEliminar){
            echo ' <script> 
                        alert("se elimino correctamente");
                        window.location.href = "mostrar.php";
                    </script>';
        }else{
            echo ' <script> 
                        alert("No se pudo eliminar correctamente");
                        window.location.href = "mostrar.php";
                    </script>';
        }
    } 
}
?>