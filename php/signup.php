<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/imagenes/signup.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link href="css/signup.css" rel="stylesheet">
  <title>Registrar nueva cuenta</title>
</head>

<body class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <form class="form-signin mt-5" action="registro_infractor.php" method="POST" ENCTYPE="multipart/form-data">

          <h1 class="h3 mb-3 font-weight-normal">Registrarse</h1>

          <?php
            session_start();
            $inputCredencial = isset($_SESSION['inputCredencial']) ? $_SESSION['inputCredencial'] : "";
            $inputNombre = isset($_SESSION['inputNombre']) ? $_SESSION['inputNombre'] : "";
            $inputApellidos = isset($_SESSION['inputApellidos']) ? $_SESSION['inputApellidos'] : "";
            $inputTlf = isset($_SESSION['inputTlf']) ? $_SESSION['inputTlf'] : "";
            $inputFechaExpCarnet = isset($_SESSION['inputFechaExpCarnet']) ? $_SESSION['inputFechaExpCarnet'] : "";

            echo "<input type='text' name='inputNombre' class='form-control mt-2' placeholder='Nombre' value='$inputNombre' required>";
            echo "<input type='text' name='inputApellidos' class='form-control mt-2' placeholder='Apellidos' value='$inputApellidos' required>";
            echo "<input type='text' name='inputCredencial' class='form-control mt-2' placeholder='NIF/CIF' value='$inputCredencial' required autofocus>";
            echo "<input type='password' name='inputPassword' class='form-control mt-2' placeholder='Contraseña' required>";
            echo "<input type='text' name='inputTlf' class='form-control mt-2' placeholder='Telefono' value='$inputTlf' required>";
            echo "<input type='text' name='inputFechaExpCarnet' class='form-control mt-2' placeholder='Fecha de expedición del carnet dd-mm-yyyy' value='$inputFechaExpCarnet' required>";
          ?>
          
          <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Enviar</button>
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</body>
</html>