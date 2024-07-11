<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mostrar.css">
    <title>Lista de Películas</title>
</head>
<body>

<div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Género</th>
                    <th>Director</th>
                    <th>Sinopsis</th>
                    <th>Accion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $inc = include("bd.php");
                if ($inc) {
                    $consulta = "SELECT * FROM film2";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado) {
                        while ($row = $resultado->fetch_array()) {

                            $id = $row['id'];
                            $titulo = $row['titulo'];
                            $consultaGenero = "SELECT * FROM genero";
                            $resultadoGenero = mysqli_query($conex, $consultaGenero);
                            while ($ungenero = $resultadoGenero->fetch_array()){
                                if ($row['genero'] == $ungenero['id_genero']){
                                    $genero = $ungenero['nombre_genero'];
                                }
                            }
                            $director = $row['director'];
                            $sinopsis = $row['sinopsis'];
                ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $titulo; ?></td>
                                <td><?php echo $genero; ?></td>
                                <td><?php echo $director; ?></td>
                                <td><?php echo $sinopsis; ?></td>

                                <td>    
                                    <!------ editar ----->
                                    <a href="editar.php?id=<?php echo $id; ?>" class="btnEdi">Editar</a>    
                                    <!-- <td class = "btnEdi"><input type= "submit" value="Editar" name="btnEditar"></td> -->
                                    <!------ eliminar ----->
                                    <form action="eliminar.php" metod="post">
                                        <input type= "number" value="<?php echo $id ; ?>" name="id" hidden>  
                                        <td class = "btnEli"><input type= "submit" value="Eliminar" name="btnEliminar"></td>
                                    </form>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
                <tr>
                    <td colspan="5">
                        <button> <a href="index.html"> Volver </a></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    
</body>
</html>