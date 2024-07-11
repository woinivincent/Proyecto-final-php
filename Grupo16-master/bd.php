<?php

$conex = mysqli_connect("localhost", "root", "", "grupo16")or die("error conexion");

if (!$conex) {
    die("Conexión fallida: " . mysqli_connect_error());
}


?>