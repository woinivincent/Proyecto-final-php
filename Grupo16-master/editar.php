<!DOCTYPE html>
<!-- Lo que es el head y el body copie el mismo que la pagina registrar peliculas, para poder mantener la estetica-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/registroPeliculas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar</title>
</head>

<?php  /*Aca abro php para empezar a traer los datos y asi completar el formulario que esta mas abajo*/ 
$inc = include("bd.php");
if ($inc) {
    $id= $_GET['id'];
    $consulta=  "SELECT * FROM film2 where id = '$id'";
    $resultado = mysqli_query($conex,$consulta);
    $pelicula = $resultado->fetch_array();
}
/*Aca consulto si existe parametro dentro del $_POST, ya que cuando edite el formulario voy a 
enviar desde este ese campo oculto, para identificar que viene desde la pagina editar y no desde mostrar */
if(isset($_POST['parametro'])){
    /* Aca verifico que el parametro sea editar y le asigno los valores de los nuevos campos a variables*/
    if($_POST['parametro']= 'editar'){
        $id=$_GET['id'] ;
        $nuevoTitulo = $_POST['nuevotitulo'];
        $nuevoGenero = $_POST['nuevogenero'];
        $nuevoDirector = $_POST['nuevodirector'];
        $nuevaSinopsis = $_POST['nuevasinopsis'];
        /* Aca se llama al update */
        $editar = "UPDATE film2 SET
                    titulo = '$nuevoTitulo',
                    genero = '$nuevoGenero',
                    director = '$nuevoDirector',
                    sinopsis = '$nuevaSinopsis'
                    WHERE id = '$id' ";
        $resultadoEditar= mysqli_query($conex, $editar);
        /*Y por ultimo si todo salio bien muestra un cartel y redirecciona a la pagina de mostrar*/
        if($resultadoEditar === TRUE){
            echo ' <script> 
                        alert("se edito correctamente");
                        window.location.href = "mostrar.php";
                    </script>';
        }else /*En caso de ocurrir algun erorr lo vuelve a la pagina anterior donde peude volver a intentar editar*/{
            echo ' <script> 
                        alert("no se pudo editar correctamente");
                        window.location.href = "editar.php?id=',$id,'";
                    </script>';
        }

    }
}else{
/*Aca en este punto el resultado de que no exista $_POST['parametro'] va a ser la carga del fomulario completo con los datos*/
?>
<body>
    <div class="contenedorFormularioRegistroPeliculas">  
        <form action="editar.php?id=<?php echo $id ?>" method = "post"  class="formularioRegistroPeliculas">
            <div class="encabezadoRegistroPeliculas">
                <span>Ingrese los datos de la película</span>
            </div>   
            <div> 
                <input id="parametro" name="parametro" value="editar" hidden/>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Titulo</label>
                    <input class=" inputFormularioRegistroPeliculas" type="text" name="nuevotitulo" id="nuevotitulo" value="<?php echo $pelicula['titulo']; ?>" placeholder="Ingrese el Titulo" required>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Género</label>
                    <select class=" inputFormularioRegistroPeliculas" type="text" name="nuevogenero" id="nuevogenero" placeholder="Seleccione el Genero" required>
                    <?php
                    $consulta= mysqli_query($conex,"SELECT * FROM genero");
                    while ($genero = $consulta -> fetch_array()){
                        if($genero['id_genero'] ==  $pelicula['genero']){
                            echo '<option value=',$genero['id_genero'],' selected> ',$genero['nombre_genero'],'</option>';
                        }else{
                            echo '<option value=',$genero['id_genero'],'> ',$genero['nombre_genero'],'</option>';
                        }
                        
                    }
                    ?>
                    </select>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Director</label>
                    <input class=" inputFormularioRegistroPeliculas" type="text" name="nuevodirector" id="nuevodirector" value="<?php echo $pelicula['director']; ?>" placeholder="Ingrese el nombre del Director" required>
                </div>
                <div class=" bloqueFormularioRegistroPeliculas">
                    <label class="textoFormularioRegistroPeliculas">Sinopsis</label>
                    <textarea class=" inputFormularioRegistroPeliculas" style="height: 150px;" type="text" name="nuevasinopsis" id="nuevasinopsis"  placeholder="Ingrese la sinopsis" required> <?php echo $pelicula['sinopsis']; ?></textarea>
                </div>
                <div class="botonesFormularioRegistroPeliculas">
                    <button class="btn btn-primary" > <a href="index.html" style="text-decoration: none; color:white;"> Volver </a> </button>
                    <button class="btn btn-primary" type="submit" > Editar Pelicula </button>
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
</body>
<?php } /*Este es el cierre del ELSE de la consulta del $_POST['parametros'] */ ?>