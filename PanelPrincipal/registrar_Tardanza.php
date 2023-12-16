<?php

session_start();
// SI EL ID DEL USUARIO ESTA VACIO SE EJECUTARA EL CODIGO
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
            <li><a class="dropdown-item" href="#">TARDANZAS</a></li>
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





<h2>Buscar Alumno - Tardanza</h2>
  <h2>INGRESAR EL GRADO Y SECCION</h2>
  <div class="buscarAlumnoExact">
        <input type="text" id="buscarInputAct" placeholder="Buscar por nombre, apellido o DNI">
        <button class="botonAlumnoExact" onclick="buscarAlumnoTar()">Buscar</button>
        </div>
  <form style="display: flex;" method="get">
    <div class="form-group" style="width: 20%;">
      <select name="seccionTar" id="seccionTar">
        <!-- RECORDAR CAMBIAR seccion por seccionTar -->
        <option value="A" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'A') echo 'selected'; ?>>A</option>
        <option value="B" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'B') echo 'selected'; ?>>B</option>
        <option value="C" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'C') echo 'selected'; ?>>C</option>
        <option value="D" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'D') echo 'selected'; ?>>D</option>
        <option value="E" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'E') echo 'selected'; ?>>E</option>
      </select>
    </div>
    <button class="botonSeccionTar"  name="submit" onclick="SeccionTar()" id="buscarSeccionTar" style="margin-left: 29%;">Buscar</button>
  </form>
 

  <div id="formularioContainerTar"></div>




<?php
if (isset($_GET['grados_A_Tar'])) {
    

    $gradoSeleccionado = $_GET['grados_A_Tar'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección A";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'A' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
        echo "<h3>Estudiantes encontrados:</h3>";
        echo '<table id="tablaAlumnos">';
        echo '<tr>
                <th>NOMBRE Y APELLIDO</th>
                
                <th>DNI</th> 
                <th>LISTA</th>
                <th>DETALLES</th>
              </tr>';

        while ($fila = $result->fetch_assoc()) {
            $codigoTar = $fila["idAlumno"];
            $nombreTar = $fila["nomAlumno"];
            $apellidoTar = $fila["apeAlumno"];
            $dniTar = $fila["dniAlumno"];

            echo '<tr>
                    <td>' . $nombreTar. '  ' . $apellidoTar . '</td>
                   
                    <td>' . $dniTar . '</td>
                    <td>
                      <button type="button" name="registrarTardanza" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Tardanza</button>
                    </td>
                    <td>
                    <button type="button" name="mostrarTardanzas" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Mostrar</button>
                  </td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}

if (isset($_GET['grados_B_Tar'])) {
    

    $gradoSeleccionado = $_GET['grados_B_Tar'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección B";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'B' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
      echo "<h3>Estudiantes encontrados:</h3>";
      echo '<table id="tablaAlumnos">';
      echo '<tr>
              <th>NOMBRE Y APELLIDO</th>
              
              <th>DNI</th> 
              <th>LISTA</th>
              <th>DETALLES</th>
            </tr>';

      while ($fila = $result->fetch_assoc()) {
          $codigoTar = $fila["idAlumno"];
          $nombreTar = $fila["nomAlumno"];
          $apellidoTar = $fila["apeAlumno"];
          $dniTar = $fila["dniAlumno"];

          echo '<tr>
                  <td>' . $nombreTar. '  ' . $apellidoTar . '</td>
                 
                  <td>' . $dniTar . '</td>
                  <td>
                    <button type="button" name="registrarTardanza" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Tardanza</button>
                  </td>
                  <td>
                  <button type="button" name="mostrarTardanzas" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Mostrar</button>
                </td>
                </tr>';
      }

      echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}
if (isset($_GET['grados_C_Tar'])) {
    

    $gradoSeleccionado = $_GET['grados_C_Tar'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección C";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'C' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
      echo "<h3>Estudiantes encontrados:</h3>";
      echo '<table id="tablaAlumnos">';
      echo '<tr>
              <th>NOMBRE Y APELLIDO</th>
              
              <th>DNI</th> 
              <th>LISTA</th>
              <th>DETALLES</th>
            </tr>';

      while ($fila = $result->fetch_assoc()) {
          $codigoTar = $fila["idAlumno"];
          $nombreTar = $fila["nomAlumno"];
          $apellidoTar = $fila["apeAlumno"];
          $dniTar = $fila["dniAlumno"];

          echo '<tr>
                  <td>' . $nombreTar. '  ' . $apellidoTar . '</td>
                 
                  <td>' . $dniTar . '</td>
                  <td>
                    <button type="button" name="registrarTardanza" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Tardanza</button>
                  </td>
                  <td>
                  <button type="button" name="mostrarTardanzas" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Mostrar</button>
                </td>
                </tr>';
      }

      echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}
if (isset($_GET['grados_D_Tar'])) {
    

    $gradoSeleccionado = $_GET['grados_D_Tar'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección D";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'D' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
      echo "<h3>Estudiantes encontrados:</h3>";
      echo '<table id="tablaAlumnos">';
      echo '<tr>
              <th>NOMBRE Y APELLIDO</th>
              
              <th>DNI</th> 
              <th>LISTA</th>
              <th>DETALLES</th>
            </tr>';

      while ($fila = $result->fetch_assoc()) {
          $codigoTar = $fila["idAlumno"];
          $nombreTar = $fila["nomAlumno"];
          $apellidoTar = $fila["apeAlumno"];
          $dniTar = $fila["dniAlumno"];

          echo '<tr>
                  <td>' . $nombreTar. '  ' . $apellidoTar . '</td>
                 
                  <td>' . $dniTar . '</td>
                  <td>
                    <button type="button" name="registrarTardanza" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Tardanza</button>
                  </td>
                  <td>
                  <button type="button" name="mostrarTardanzas" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Mostrar</button>
                </td>
                </tr>';
      }

      echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}
if (isset($_GET['grados_E_Tar'])) {
    

    $gradoSeleccionado = $_GET['grados_E_Tar'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección E";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'E' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
      echo "<h3>Estudiantes encontrados:</h3>";
      echo '<table id="tablaAlumnos">';
      echo '<tr>
              <th>NOMBRE Y APELLIDO</th>
              
              <th>DNI</th> 
              <th>LISTA</th>
              <th>DETALLES</th>
            </tr>';

      while ($fila = $result->fetch_assoc()) {
          $codigoTar = $fila["idAlumno"];
          $nombreTar = $fila["nomAlumno"];
          $apellidoTar = $fila["apeAlumno"];
          $dniTar = $fila["dniAlumno"];

          echo '<tr>
                  <td>' . $nombreTar. '  ' . $apellidoTar . '</td>
                 
                  <td>' . $dniTar . '</td>
                  <td>
                    <button type="button" name="registrarTardanza" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Tardanza</button>
                  </td>
                  <td>
                  <button type="button" name="mostrarTardanzas" data-id="'. $codigoTar .'"data-dni="' . $dniTar . '" data-nombre="' . $nombreTar . '">Mostrar</button>
                </td>
                </tr>';
      }

      echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}
?>

<main>
<script>
  function buscarAlumnoTar() {
    var input = document.getElementById('buscarInputAct').value.toLowerCase();
    var tabla = document.getElementById('tablaAlumnos');
    var filas = tabla.getElementsByTagName('tr');
// Empezamos desde 1 para omitir la fila de encabezado
    for (var i = 1; i < filas.length; i++) { 
      var dni = filas[i].getElementsByTagName('td')[1].innerText;

      if (dni === input) {
        filas[i].style.display = '';
      } else {
        filas[i].style.display = 'none';
      }
    }
  }
  $variableSeccion = document.getElementById("buscarSeccionTar");

function SeccionTar() {

  var seccion = document.getElementById('seccionTar').value;
  console.log(seccion);
  event.preventDefault();
  if (seccion == 'A') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGradosTar" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_A_Tar" id="gradosAct">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +
      '<option value="4TO">4TO</option>' +
      '<option value="5TO">5TO</option>' +
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecA">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainerTar');
    formularioContainer.innerHTML = formularioGradosHTML;
  }


if (seccion == 'B') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGradosTar" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_B_Tar" id="gradosAct">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +
      '<option value="4TO">4TO</option>' +
      '<option value="5TO">5TO</option>' +
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecB">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainerTar');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'C') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGradosTar" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_C_Tar" id="gradosAct">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +
      '<option value="4TO">4TO</option>' +
      '<option value="5TO">5TO</option>' +
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecC">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainerTar');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'D') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGradosTar" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_D_Tar" id="gradosAct">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +
      
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecD">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainerTar');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'E') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGradosTar" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_E_Tar" id="gradosAct">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecE">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainerTar');
    formularioContainer.innerHTML = formularioGradosHTML;
  }

}
</script>

<script>
  // Función para redirigir con los parámetros GET
  function redirigirConParametros(dni, nombre,id) {

    //utilizar tu archivo php
    window.location.href = 'ingresarDatosTardanza.php?dni=' + dni + '&nombre=' + nombre + '&id='+ id;
  }

  // Capturar el evento de clic en los botones
  document.addEventListener('DOMContentLoaded', function() {
    var botonesTardanza = document.getElementsByName('registrarTardanza');
    // var botonesJustificacion = document.getElementsByName('justificacion');

    // Agregar el evento de clic a los botones de tardanza
    botonesTardanza.forEach(function(boton) {
      boton.addEventListener('click', function() {
        var dni = boton.getAttribute('data-dni');
        var nombre = boton.getAttribute('data-nombre');
        var id= boton.getAttribute('data-id'); 
        redirigirConParametros(dni, nombre,id);
      });
    });

   
  });

  
  function redirigirConParametrosMostrar(dni, nombre,id) {

//utilizar tu archivo php
window.location.href = 'mostrar_Tardanzas.php?dni=' + dni + '&nombre=' + nombre + '&id='+ id;
}


  document.addEventListener('DOMContentLoaded', function() {
    var botonesIncidencia = document.getElementsByName('mostrarTardanzas');
    // var botonesJustificacion = document.getElementsByName('justificacion');

    // Agregar el evento de clic a los botones de tardanza
    botonesIncidencia.forEach(function(boton) {
      boton.addEventListener('click', function() {
        var dni = boton.getAttribute('data-dni');
        var nombre = boton.getAttribute('data-nombre');
        var id= boton.getAttribute('data-id'); 
        redirigirConParametrosMostrar(dni, nombre,id);
      });
    });

  
  });

</script>