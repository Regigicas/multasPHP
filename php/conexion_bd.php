<?php
    ## Credenciales de la base de datos

    $user = 'root';
    $contrasena = '';
    $ip = 'localhost';
    $database = 'database_multas';

    ## Hacemos la conexión pasándole los credenciales
    $conexion = mysqli_connect($ip, $user, $contrasena, $database) or die ("Conexión Fallida a $database");
    ?>
    