<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        header("location: ../login_infractor.html");
        return;
    }

    $typeLogin = isset($_POST["typeLogin"]) ? $_POST["typeLogin"] : null;
    if ($typeLogin == null || ($typeLogin != "admin" && $typeLogin != "infractor"))
    {
        header("location: ../login_infractor.html");
        return;
    }

    $pass = isset($_POST['password']) ? $_POST['password'] : null;
    $credencial = isset($_POST['credencial']) ? $_POST['credencial'] : null;
    if ($pass == null || $credencial == null)
    {
        print("No se han proporcionado los parametros requeridos. Se te redireccionará en breve.");
        //sleep(5);
        //header("location: ../login_infractor.html");
        header("refresh: 5; url=../login_infractor.html");
        return;
    }

    $_SESSION['credencial'] = $credencial;

    include 'conexion_bd.php';
    
    if ($typeLogin == "admin")
        $sqlQuery = "SELECT credencial_admin, `password_admin` FROM admins WHERE `password_admin` = '$pass' AND credencial_admin = '$credencial'";
    else
        $sqlQuery = "SELECT credencial, `password` FROM infractor WHERE `password` = '$pass' AND credencial = '$credencial'";

    $consulta = mysqli_query($conexion, $sqlQuery) or die("No existe el usuario indicado, error DB.");
    $nfilas = mysqli_num_rows($consulta);
    
    if ($nfilas == 0)
    {
        print("No se ha encontrado al usuario, se te redireccionará a la página de inicio de sesión.");
        //sleep(2);
        //header("location: ../login_infractor.html");
        header("refresh: 5; url=../login_$typeLogin.html");
    }
    else
        header("location: ../login_ok.html");
?>