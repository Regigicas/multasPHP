<?php
    session_start();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="imagenes/multa.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"crossorigin="anonymous"></script>
  
  <title>Listado de multas (Administrador) </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Multicas</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <h2>Administración de Multas</h2>

        <h5><a href="introducir_multa.php">Introducir Nueva Multa</a></h5>
        <h5><a href="introducir_coche.php">Registrar nuevo coche</a></h5>

        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Matricula</th>
              <th scope="col">Infractor</th>
              <th scope="col">Fecha</th>
              <th scope="col">Razón</th>
              <th scope="col">Lugar</th>
              <th scope="col">Precio</th>
              <th scope="col">Estado pago</th>
              <th scope="col">Reclamada</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
                if (!isset($_SESSION["credencial"]) || !isset($_SESSION["isAdmin"]))
                {
                    header("location: ../login_admin.html");
                    return;
                }
                
                include "obtener_multas_administrador.php";

                $nrow = 0;
                foreach ($arrayMultas as $multa)
                {
                    ++$nrow;
                    $idMulta = $multa["idMulta"];
                    $razon = $multa["razon"];
                    $fecha = $multa["fecha"];
                    $reclamada = $multa["reclamada"];
                    $precio = $multa["precio"];
                    $estado = $multa["estado"];
                    $matricula = $multa["matricula"];
                    $direccion = $multa["direccion"];
                    $infractor = $multa["infractor"];
                    
                    $estadoString = "";
                    switch ($estado)
                    {
                        case 0:
                            $estadoString = "No pagada";
                            break;
                        case 1:
                            $estadoString = "Pagada";
                            break;
                        case 2:
                            $estadoString = "En proceso de pago";
                            break;
                        default;
                            break;
                    }

                    $reclamadaString = $reclamada ? "Sí" : "No";

                    echo "<th scope='row'>$nrow</th>";
                    echo "<td>$matricula</td>";
                    echo "<td>$infractor</td>";
                    echo "<td>$fecha</td>";
                    echo "<td>$razon</td>";
                    echo "<td>$direccion</td>";
                    echo "<td>$precio €</td>";
                    echo "<td>$estadoString</td>";
                    echo "<td>$reclamadaString</td>";
                    echo "<td>";
                    echo "  <form action='detalles_multa_admin.php' method='POST' ENCTYPE='multipart/form-data'>";
                    echo "    <input type='hidden' name='detMulta' value='$idMulta'>";
                    echo "    <input class='btn btn-primary' type='submit' value='Detalles multa'>";
                    echo "  </form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
