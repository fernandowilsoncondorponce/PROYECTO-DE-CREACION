<?php
session_start();

if (empty($_SESSION['id'])) {
  header("location: login.php");
}


?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos_de_entorno.css">
  

  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">  <?php
                           echo $_SESSION['nombre'] . $_SESSION['apellido'];
                              ?> </a>
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="vista.php">VISTA</a>
            </li>
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                INGRESAR REGISTRO
               </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="registrar_Tardanza.php">TARDANZAS</a></li>
                <li><a class="dropdown-item" href="registrar_Actitud.php">INCIDENCIAS</a></li>
              </ul>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="mostrar_Registros.php">HISTORIAL REGISTRO</a>
            </li>
          </ul>
          <a href="controlador/controlador_cerrar_session.php"> <button class="btn btn-outline-success" type="submit" >SALIR</button></a>
        </div>
      </div>
    </nav>
    <main>
 
  <?php

$servername = "sql209.infinityfree.com";
$username = "if0_34477030";
$password = "h0Cqbl8sBR";
$baseDatos = "if0_34477030_bdakirakato";

$conn = new mysqli($servername, $username, $password, $baseDatos);

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit;
}
?>


  <h3 style="margin-bottom: 15px;">JUSTIFICACION</h3>
  
  
  <form style="display: inline-grid;margin-bottom: 30px;"  action="ingresarDatosTardanza.php" method="get" id="myForm">
    <textarea name="texto" id="texto" required style="height: 94px; width: 270px;"></textarea>
    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
    <input type="hidden" name="nombre" value="<?php echo ($_GET['nombre']); ?>">
    <?php  if (!isset($_GET['texto'])) {
  echo '<button type="submit" style="margin-top: 5px; background-color: blueviolet; " onclick="ocultarBoton()" id ="enviarBtn">Enviar</button>';
}?>

  </form>
  <?php
  if (isset($_GET['texto'])) {
    $justificacion = strval($_GET['texto']);
    $codigo = strval($_GET['id']) ;
    $nombre = strval($_GET['nombre']);
    $idProfesor = $_SESSION['id'];
    date_default_timezone_set('America/Lima');
    $fechaTard = date("Y-m-d");
    // echo  $fechaTard;
    $horaTard = date("H:i:s");
      $sql = "INSERT INTO registro_tardanzas (idAlumno, idProfesor, fecha_Tard, hora_Tard, just_Tard,reg_Tard)
      VALUES ('$codigo', '$idProfesor', '$fechaTard', '$horaTard', '$justificacion', 'TARDANZA')";
        if ($conn->query($sql) === TRUE) {
    echo "<br>Datos ingresados correctamente";
  } else {
    echo "<br>Error al ingresar datos: " . $conn->error;
  }
 
  $conn->close();
  }
  ?>



    <button style="display: block;"  onclick="redireccionar()">Regresar</button>

  </main>

  <script>

  function redireccionar() {
   
    window.location.href = "registrar_Tardanza.php";
  }
  function ocultarBoton(){
    let enviar = document.getElementById('enviar');
      enviar.style.display = 'none';

  }
</script>