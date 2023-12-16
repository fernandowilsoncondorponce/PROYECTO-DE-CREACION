
    <style>
        .botonSeccion {

            display: block;



        }
    </style>



    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $baseDatos = "bdakirakato";
    // Crear una nueva conexión
    $conn = new mysqli($servername, $username, $password, $baseDatos);

    // Verificar la conexión
    if (mysqli_connect_errno()) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        exit;
    }
    ?>
  <div class="divGradSec show" id="buscarGradSec"> 
    <h2>INGRESAR EL GRADO Y SECCION</h2>
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
        <button class="botonSeccion" submit" name="submit" onclick="Seccion()" id="buscarSeccion">Buscar</button>
    </form>    
    <div id="formularioContainer"></div>


    

    <?php


    if (isset($_GET['grados_A'])) {
        $gradoSeleccionado = $_GET['grados_A'];
        echo "El grado seleccionado es: " . $gradoSeleccionado . " de la seccion A";

        $consulta = "SELECT * FROM alumnos WHERE secAlumno = 'A' AND gradAlumno = '$gradoSeleccionado'";
        // $resultado = $conexion->query($consulta);
        $result = $conn->query($consulta);

        if ($result !== false && $result->num_rows > 0) {

            echo "<h3>Estudiantes encontrados:</h3>";
            while ($fila = $result->fetch_assoc()) {
              
                $codigo = $fila["idAlumno"];
                $nombre = $fila["nomAlumno"];
                $apellido = $fila["apeAlumno"];
                $seccion = $fila["secAlumno"];
                $grado = $fila["gradAlumno"];
                $dni = $fila["dniAlumno"];
                $genero = $fila["generoAlum"];
             
                $html = '
            <table>
              <tr>
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>SECCION</th>
                <th>GRADO</th>
                <th>DNI</th>
                <th>GENERO</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
              </tr>
              <tr>
                <td>' . $codigo . '</td>
                <td>' . $nombre . '</td>
                <td>' . $apellido . '</td>
                <td>' . $seccion . '</td>
                <td>' . $grado . '</td>
                <td>' . $dni . '</td>
                <td>' . $genero . '</td>
                <td>
                  <button class="editar" onclick="editarAlumno(' . $codigo . ')">Editar</button>
                </td>
                <td>
                <button class="eliminar" onclick="eliminarAlumno(' . $codigo . ')">Eliminar</button>
                </td>
              </tr>
            </table>';
                echo $html;
            }
        } else {
            echo "No se encontraron estudiantes para la sección y grado seleccionados.";
        }

        $conn->close();
    }

    ?>
</div>
</div>
<script>
    $variableSeccion = document.getElementById("buscarSeccion");
    $variableGradosA = document.getElementById("formularioGrados");

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
                '<button type="submit" name="submitGrados" id="buscarSecA">Buscar</button>' +
                '</form>' +
                '</div>';
            var formularioContainer = document.getElementById('formularioContainer');
            formularioContainer.innerHTML = formularioGradosHTML;
        }

    }
</script>