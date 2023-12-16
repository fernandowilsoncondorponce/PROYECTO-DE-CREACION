


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



  <h2>INGRESAR EL GRADO Y SECCION</h2>
   <div class="buscarAlumnoExact">
    <input type="text" id="buscarInput" placeholder="Ingresa numero de dni">
    <button class="botonAlumnoExact" onclick="buscarAlumno()">Buscar</button>
  </div>
  <form style="display: flex;" method="get">
    <div class="form-group" style="width: 20%;">
      <select name="seccion" id="seccion">
        <option value="A" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'A') echo 'selected'; ?>>A</option>
        <option value="B" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'B') echo 'selected'; ?>>B</option>
        <option value="C" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'C') echo 'selected'; ?>>C</option>
        <option value="D" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'D') echo 'selected'; ?>>D</option>
        <option value="E" <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'E') echo 'selected'; ?>>E</option>
      </select>
    </div>
    <button class="botonSeccion"  name="submit" onclick="Seccion()" id="buscarSeccion" style="margin-left: 29%;">Buscar</button>
  </form>


  <div id="formularioContainer"></div>
 



<?php
if (isset($_GET['grados_A'])) {
    

    $gradoSeleccionado = $_GET['grados_A'];
    echo "Seleccionado es: " . $gradoSeleccionado . " de la sección A";

    $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'A' AND gradAlumno = '$gradoSeleccionado'";
   
    $result = $conn->query($consulta);

    if ($result !== false && $result->num_rows > 0) {
      echo '<h3>Estudiantes encontrados:</h3>';
      echo '<table id="tablaAlumnos">';
      echo '<tr>
              <th>NOMBRE Y APELLIDO</th>
          
              <th>DNI</th>
              <th>TELEFONO</th>
           
            </tr>';

      while ($fila = $result->fetch_assoc()) {
          $codigo = $fila["idAlumno"];
          $nombre = $fila["nomAlumno"];
          $apellido = $fila["apeAlumno"];
          $dni = $fila["dniAlumno"];
          $telefono = $fila["telfAlum"];

          echo '<tr>
                  <td>' . $nombre . '  ' . $apellido . '</td>
                  <td>' . $dni . '</td>
                  <td>'.$telefono.'</td>
                 
                </tr>';
      }

      echo '</table>';
    } else {
        echo "No se encontraron estudiantes para la sección y grado seleccionados.";
    }

    $conn->close();
}
if (isset($_GET['grados_B'])) {
    

  $gradoSeleccionado = $_GET['grados_B'];
  echo "Seleccionado es: " . $gradoSeleccionado . " de la sección B";

  $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'B' AND gradAlumno = '$gradoSeleccionado'";
 
  $result = $conn->query($consulta);

  if ($result !== false && $result->num_rows > 0) {
    echo '<h3>Estudiantes encontrados:</h3>';
    echo '<table id="tablaAlumnos">';
    echo '<tr>
            <th>NOMBRE Y APELLIDO</th>
        
            <th>DNI</th>
            <th>TELEFONO</th>
         
          </tr>';

    while ($fila = $result->fetch_assoc()) {
        $codigo = $fila["idAlumno"];
        $nombre = $fila["nomAlumno"];
        $apellido = $fila["apeAlumno"];
        $dni = $fila["dniAlumno"];
        $telefono = $fila["telfAlum"];

        echo '<tr>
                <td>' . $nombre . '  ' . $apellido . '</td>
                <td>' . $dni . '</td>
                <td>'.$telefono.'</td>
               
              </tr>';
    }

    echo '</table>';
  } else {
      echo "No se encontraron estudiantes para la sección y grado seleccionados.";
  }

  $conn->close();
}
if (isset($_GET['grados_C'])) {
    

  $gradoSeleccionado = $_GET['grados_C'];
  echo "Seleccionado es: " . $gradoSeleccionado . " de la sección C";

  $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'C' AND gradAlumno = '$gradoSeleccionado'";
 
  $result = $conn->query($consulta);

  if ($result !== false && $result->num_rows > 0) {
    echo '<h3>Estudiantes encontrados:</h3>';
    echo '<table id="tablaAlumnos">';
    echo '<tr>
            <th>NOMBRE Y APELLIDO</th>
        
            <th>DNI</th>
            <th>TELEFONO</th>
         
          </tr>';

    while ($fila = $result->fetch_assoc()) {
        $codigo = $fila["idAlumno"];
        $nombre = $fila["nomAlumno"];
        $apellido = $fila["apeAlumno"];
        $dni = $fila["dniAlumno"];
        $telefono = $fila["telfAlum"];

        echo '<tr>
                <td>' . $nombre . '  ' . $apellido . '</td>
                <td>' . $dni . '</td>
                <td>'.$telefono.'</td>
               
              </tr>';
    }

    echo '</table>';
  } else {
      echo "No se encontraron estudiantes para la sección y grado seleccionados.";
  }

  $conn->close();
}
if (isset($_GET['grados_D'])) {
    

  $gradoSeleccionado = $_GET['grados_D'];
  echo "Seleccionado es: " . $gradoSeleccionado . " de la sección D";

  $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'D' AND gradAlumno = '$gradoSeleccionado'";
 
  $result = $conn->query($consulta);

  if ($result !== false && $result->num_rows > 0) {
    echo '<h3>Estudiantes encontrados:</h3>';
    echo '<table id="tablaAlumnos">';
    echo '<tr>
            <th>NOMBRE Y APELLIDO</th>
        
            <th>DNI</th>
            <th>TELEFONO</th>
         
          </tr>';

    while ($fila = $result->fetch_assoc()) {
        $codigo = $fila["idAlumno"];
        $nombre = $fila["nomAlumno"];
        $apellido = $fila["apeAlumno"];
        $dni = $fila["dniAlumno"];
        $telefono = $fila["telfAlum"];

        echo '<tr>
                <td>' . $nombre . '  ' . $apellido . '</td>
                <td>' . $dni . '</td>
                <td>'.$telefono.'</td>
               
              </tr>';
    }

    echo '</table>';
  } else {
      echo "No se encontraron estudiantes para la sección y grado seleccionados.";
  }

  $conn->close();
}
if (isset($_GET['grados_E'])) {
    

  $gradoSeleccionado = $_GET['grados_E'];
  echo "Seleccionado es: " . $gradoSeleccionado . " de la sección E";

  $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'E' AND gradAlumno = '$gradoSeleccionado'";
 
  $result = $conn->query($consulta);

  if ($result !== false && $result->num_rows > 0) {
    echo '<h3>Estudiantes encontrados:</h3>';
    echo '<table id="tablaAlumnos">';
    echo '<tr>
            <th>NOMBRE Y APELLIDO</th>
        
            <th>DNI</th>
            <th>TELEFONO</th>
         
          </tr>';

    while ($fila = $result->fetch_assoc()) {
        $codigo = $fila["idAlumno"];
        $nombre = $fila["nomAlumno"];
        $apellido = $fila["apeAlumno"];
        $dni = $fila["dniAlumno"];
        $telefono = $fila["telfAlum"];

        echo '<tr>
                <td>' . $nombre . '  ' . $apellido . '</td>
                <td>' . $dni . '</td>
                <td>'.$telefono.'</td>
               
              </tr>';
    }

    echo '</table>';
  } else {
      echo "No se encontraron estudiantes para la sección y grado seleccionados.";
  }

  $conn->close();
}
?>

<script>
  function buscarAlumno() {
    var input = document.getElementById('buscarInput').value.toLowerCase();
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
  $variableSeccion = document.getElementById("buscarSeccion");

function Seccion() {

  var seccion = document.getElementById('seccion').value;
  console.log(seccion);
  event.preventDefault();
  if (seccion == 'A') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGrados" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_A" id="grados">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +
      '<option value="4TO">4TO</option>' +
      '<option value="5TO">5TO</option>' +
      '</select>' +
      '</div>' +
      '<button style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecA">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainer');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'B') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGrados" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_B" id="grados">' +
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
    var formularioContainer = document.getElementById('formularioContainer');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'C') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGrados" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_C" id="grados">' +
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
    var formularioContainer = document.getElementById('formularioContainer');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'D') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGrados" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_D" id="grados">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
      '<option value="3RO">3RO</option>' +

      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecD">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainer');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
  if (seccion == 'E') {
    $variableSeccion.style.display = 'none';
    var formularioGradosHTML = '<div id="formularioGrados" class="hidden">' +
      '<form style="display: flex;" method="get">' +
      '<div class="form-group" style="width: 20%;">' +
      '<select name="grados_E" id="grados">' +
      '<option value="1ER">1ER</option>' +
      '<option value="2DO">2DO</option>' +
    
      '</select>' +
      '</div>' +
      '<button  style = "margin-left: 28%;"type="submit" name="submitGrados" id="buscarSecE">Buscar</button>' +
      '</form>' +
      '</div>';
    var formularioContainer = document.getElementById('formularioContainer');
    formularioContainer.innerHTML = formularioGradosHTML;
  }
}
</script>

