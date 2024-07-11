<?php
include("bd.php");

if (isset($_POST["grupo16"])) {   
    if (!empty($_POST["titulo"]) && !empty($_POST["genero"]) && !empty($_POST["director"]) && !empty($_POST["sinopsis"])) {
        $titulo = mysqli_real_escape_string($conex, trim($_POST["titulo"]));
        $genero = mysqli_real_escape_string($conex, trim($_POST["genero"]));
        $director = mysqli_real_escape_string($conex, trim($_POST["director"]));
        $sinopsis = mysqli_real_escape_string($conex, trim($_POST["sinopsis"]));
        $consulta = "INSERT INTO film2 (titulo, genero, director, sinopsis) VALUES ('$titulo','$genero','$director', '$sinopsis')";
        $resultado = mysqli_query($conex, $consulta);
        

        if ($resultado) {

        ?>
        <h3 class="ok">Tu pelicula se agrego a la bd correctamente!</h3>
        <?php
    }else {
    
    
        ?>
        <h3 class="bad">Ha ocurrido un error!!!!</h3>
        <?php
    }
    }else {
        ?>
        <h3 class="bad">Por favor complete los campos!</h3>
        <?php
        }
    }

?>