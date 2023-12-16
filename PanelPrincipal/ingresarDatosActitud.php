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



      <h3 style="margin-bottom: 15px;">INGRESAR OCURRENCIA</h3>
      <form method="post" id="Form">
        <select name="dato" id="dato"style="width: 84%;">
         
          <option value="Incidente diciplinario">Incidente disciplinario</option>
          <option value="Retraso">Retraso</option>
          <option value="Ausencia">Ausencia</option>
          <option value="Comportamiento inapropiado">Comportamiento inapropiado</option>
          <option value="Problemas de salud">Problemas de salud</option>
          <option value="Problemas academicos">Problemas académicos </option>
          <option value="Otros">Otros</option>
        </select>
        <textarea style="width: 83%; height: 98px;" name="texto" id="texto" required></textarea>
        <?php 
         if (!isset($_POST["dato"]) && !isset($_POST["texto"])) {
          echo '<button type="submit" style="display: table;margin-bottom: 10px;background: blueviolet;" > Enviar</button>';
         }
        ?>
       
      </form>
     
    <?php


    if (isset($_POST["dato"]) && isset($_POST["texto"])) {
      $tipoIncidencia = $_POST["dato"];
      $texto = $_POST["texto"];
      $dni = $_GET['dni'];
      $nombre = $_GET['nombre'];
      $codigo = $_GET['id'];
      $idProfesor = $_SESSION['id'];


      $response = " El alumno " . $nombre . " con el dni: " . $dni . "su id" . $codigo;

    
      date_default_timezone_set('America/Lima');
    $fechaInd = date("Y-m-d");
    $horaInd = date("H:i:s");

    // Consulta de inserción
    $sql = "INSERT INTO registro_incidencias (idAlumno, idProfesor, fecha_Ind, hora_Ind, nota_Ind, tipo_incidencia, estado_incidencia)
        VALUES ('$codigo', '$idProfesor', '$fechaInd', '$horaInd', '$texto', '$tipoIncidencia', 'PENDIENTE')";

    if ($conn->query($sql) === TRUE) {
      echo "Datos ingresados correctamente";
    } else {
      echo "Error al ingresar datos: " . $conn->error;
    }
   
    $conn->close();
    
  }
  
    ?>
   <div>
    <button onclick="redireccionar()">Regresar</button>
    </div>
   
  </main>
<script>

  function redireccionar() {
   
    window.location.href = "registrar_Actitud.php";
  }
</script>


