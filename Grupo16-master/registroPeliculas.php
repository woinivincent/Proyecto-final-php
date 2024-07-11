<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/registroPeliculas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registrar Pelicula</title>
</head>
<?php 
$inc = include("bd.php");
if(isset($_POST['parametro'])){
    if($_POST['parametro'] == 'insertar'){
        echo 'Entro al insertar';
        $titulo= $_POST['titulo'];
        $genero = $_POST['genero'];
        $director= $_POST['director'];
        $sinopsis= $_POST['sinopsis'];
        $insertar = "INSERT INTO film2 (id,titulo,genero,director,sinopsis) values (null,'$titulo','$genero','$director','$sinopsis') ";
        $resultadoInsertar = mysqli_query($conex, $insertar);
        var_dump($resultadoInsertar);
        if($resultadoInsertar === TRUE){
            echo ' <script> 
                        alert("se inserto correctamente");
                        window.location.href = "mostrar.php";
                    </script>';
        }else /*En caso de ocurrir algun erorr lo vuelve a la pagina anterior donde peude volver a intentar editar*/{
            /*echo ' <script> 
                        alert("no se pudo insertar correctamente la pelicula");
                        window.location.href = "registroPeliculas.php";
                    </script>';*/
        }

    }

}
?> 
<body>
    <div class="contenedorFormularioRegistroPeliculas">  
        <form action ="registroPeliculas.php" method = "post"  class="formularioRegistroPeliculas">
            <div class="encabezadoRegistroPeliculas">
                <span>Ingrese los datos de la película</span>
            </div>   
            <div> 
                <input name="parametro" id="parametro" value="insertar" hidden/>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Titulo</label>
                    <input class=" inputFormularioRegistroPeliculas" type="text" name="titulo" id="titulo" placeholder="Ingrese el Titulo" required>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Género</label>
                    <select class=" inputFormularioRegistroPeliculas" type="text" name="genero" id="genero" placeholder="Seleccione el Genero" required>
                    echo '<option value="0">Seleccione un genero</option>';
                    <?php
                    $consulta= mysqli_query($conex,"SELECT * FROM genero");
                    while ($genero = $consulta -> fetch_array()){
                        echo '<option value=',$genero['id_genero'],'> ',$genero['nombre_genero'],'</option>';  
                    }
                    ?>
                    </select>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Director</label>
                    <input class=" inputFormularioRegistroPeliculas" type="text" name="director" id="director" placeholder="Ingrese el nombre del Director" required>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Sinopsis</label>
                    <textarea class=" inputFormularioRegistroPeliculas" style="height: 150px;" type="text" name="sinopsis" id="sinapsis" placeholder="Ingrese la sinopsis" required></textarea>
                </div>
                <!-- <div class="bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Portada</label>
                    <input class="inputFormularioRegistroPeliculas" type="file" name="portada" id="portada" placeholder="Cargue la portada" required>
                </div> -->
                <div class="botonesFormularioRegistroPeliculas">
                    <button class="btn btn-primary" > <a href="index.html" style="text-decoration: none; color:white;"> Volver </a> </button>
                    <button class="btn btn-primary" > <a href="mostrar.php" style="text-decoration: none; color:white;"> Mostrar peliculas </a></button>
                    <button class="btn btn-primary" type="submit" > Registrar Pelicula </button>
                </div>
            </div>
        </form>
        <div class= "messagge-container">
        <?php
        include("registroPeli.php");

        ?>

        </div>

    </div>   
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./script/registroPeliculas.js"></script>
</body>
</html>