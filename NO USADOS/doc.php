<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Conexión a la base de datos
// // Establecer los encabezados
// header("Content-Type: application/json"); // Indicar que la respuesta es en formato JSON
// header("Access-Control-Allow-Origin: *"); // Permitir solicitudes desde cualquier origen
// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Permitir los métodos GET, POST, PUT y DELETE
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); // Permitir ciertos encabezados adicionales

$servername = "localhost";
$username = "root";
$password = "";
$baseDatos = "bdakirakato";

// Crear una nueva conexión
$conexion = new mysqli($servername, $username, $password,$baseDatos);


// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit;
}


// // Realizar la consulta
// $query = "SELECT * FROM alumnos";

// // Ejecutar la consulta
// $resultado = mysqli_query($conexion, $query);

// // Verificar si hay resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Recorrer los resultados y mostrarlos
//     while ($fila = mysqli_fetch_assoc($resultado)) {
//         echo "ID: " . $fila['idAlumno'] . "<br>";
//         echo "Nombre: " . $fila['nomAlumno'] . "<br>";
//         echo "Apellido: " . $fila['apeAlumno'] . "<br>";
//         // ... mostrar otros datos que desees
//         echo "<br>";
//     }
// } else {
//     echo "No se encontraron alumnos.";
// }

// // Cerrar la conexión
// mysqli_close($conexion);
//*******************************************************//
// Realizar la consulta
// $query = "SELECT * FROM registnotasbimest";

// // Ejecutar la consulta
// $resultado = mysqli_query($conexion, $query);

// // Verificar si hay resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Recorrer los resultados y mostrarlos
//     while ($fila = mysqli_fetch_assoc($resultado)) {
//         echo "ID: " . $fila['idRegNotas'] . "<br>";
//         echo "Fecha Actual: " . $fila['fActReg'] . "<br>";
//         echo "Hora Actual: " . $fila['hActReg'] . "<br>";
//         echo "Competencias: " . $fila['CompetReg'] . "<br>";
//         echo "Nota: " . $fila['notaReg'] . "<br>";
//         echo "Descripción: " . $fila['conclDescReg'] . "<br>";
//         echo "ID Profesor: " . $fila['idProfesor'] . "<br>";
//         echo "ID Alumno: " . $fila['idAlumno'] . "<br>";
//         echo "Bimestre: " . $fila['bimesReg'] . "<br>";
//         echo "<br>";
//     }
// } else {
//     echo "No se encontraron registros en la tabla.";
// }


//PASADO A JSONM

// $query = "SELECT notaReg, nomAlumno FROM registnotasbimest INNER JOIN alumnos ON registnotasbimest.idAlumno = alumnos.idAlumno";
// $resultado = mysqli_query($conexion, $query);

// // Verificar si se obtuvieron resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Crear un array para almacenar los datos
//     $data = array();

//     // Recorrer los resultados y agregarlos al array
//     while ($row = mysqli_fetch_assoc($resultado)) {
//         $data[] = $row;
//     }

//     // Devolver los datos como respuesta en formato JSON
//     echo json_encode($data);
// } else {
//     // No se encontraron registros
//     echo "No se encontraron registros.";
// }

// // Cerrar la conexión a la base de datos
// mysqli_close($conexion);



// $query = "SELECT alumnos.* FROM alumnos INNER JOIN registnotasbimest ON alumnos.idAlumno = registnotasbimest.idAlumno WHERE registnotasbimest.notaReg = 'A'";
// $resultado = mysqli_query($conexion, $query);

// // Verificar si se obtuvieron resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Recorrer los resultados y mostrar los datos
//     while ($row = mysqli_fetch_assoc($resultado)) {
//         echo "ID: " . $row['idAlumno'] . "<br>";
//         echo "Nombre: " . $row['nomAlumno'] . "<br>";
//         echo "Apellido: " . $row['apeAlumno'] . "<br>";
//         // Agrega aquí los demás campos que desees mostrar
//         echo "<br>";
//     }
// } else {
//     // No se encontraron registros
//     echo "No se encontraron registros.";
// }

// // Cerrar la conexión a la base de datos
// mysqli_close($conexion);

 

// $query = "SELECT registnotasbimest.*, alumnos.nomAlumno, alumnos.apeAlumno FROM registnotasbimest INNER JOIN alumnos ON registnotasbimest.idAlumno = alumnos.idAlumno WHERE registnotasbimest.notaReg = 'A'";
// $resultado = mysqli_query($conexion, $query);

// // Verificar si se obtuvieron resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Recorrer los resultados y mostrar los datos
//     while ($row = mysqli_fetch_assoc($resultado)) {
//         echo "ID Nota: " . $row['idRegNotas'] . "<br>";
//         echo "Alumno: " . $row['nomAlumno'] . " " . $row['apeAlumno'] . "<br>";
//         echo "Fecha: " . $row['fActReg'] . "<br>";
//         echo "Hora: " . $row['hActReg'] . "<br>";
//         // Agrega aquí los demás campos que desees mostrar
//         echo "<br>";
//     }
// } else {
//     // No se encontraron registros
//     echo "No se encontraron registros.";
// }

// // Cerrar la conexión a la base de datos
// mysqli_close($conexion);


// Realizar la conexión a la base de datos y ejecutar la consulta
$query = "SELECT * FROM registnotasbimest WHERE notaReg = 'A'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer los resultados y mostrar los datos
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "ID Nota: " . $row['idRegNotas'] . "<br>";
        echo "Fecha: " . $row['fActReg'] . "<br>";
        echo "Hora: " . $row['hActReg'] . "<br>";
        // Agrega aquí los demás campos que desees mostrar
        echo "<br>";
    }
} else {
    // No se encontraron registros
    echo "No se encontraron registros.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Realizar la consulta
// /// MUESTRA TODOS LAS NOTAS A
// $query = "SELECT a.nomAlumno, a.gradAlumno, a.secAlumno, p.nomProf, p.curProf
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           WHERE rn.notaReg = 'A'";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Recorrer los resultados y mostrar los datos
//     while ($row = $result->fetch_assoc()) {
//         echo "Nombre del alumno: " . $row["nomAlumno"] . "<br>";
//         echo "Grado: " . $row["gradAlumno"] . "<br>";
//         echo "Sección: " . $row["secAlumno"] . "<br>";
//         echo "Nombre del profesor: " . $row["nomProf"] . "<br>";
//         echo "Curso: " . $row["curProf"] . "<br>";
//         echo "<br>";
//     }
// } else {
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión
// $conn->close();
// MOSTRAR DE UN ALUMNO SU NOTAS DE CADA PROFESSOR

// Verificar la conexión
// if ($conn->connect_error) {
//     die("Error de conexión: " . $conn->connect_error);
// }

// // Realizar la consulta
// $query = "SELECT a.nomAlumno, p.nomProf, rn.CompetReg
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           GROUP BY a.idAlumno, p.idProfesor
//           ORDER BY a.idAlumno ASC, p.idProfesor ASC";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Variable para almacenar el ID del último alumno
//     $lastAlumnoID = null;

//     // Recorrer los resultados y mostrar los datos
//     while ($row = $result->fetch_assoc()) {
//         $alumnoID = $row["nomAlumno"];
//         $profesor = $row["nomProf"];
//         $competencia = $row["CompetReg"];

//         // Mostrar el primer alumno con sus competencias de cada profesor
//         if ($alumnoID !== $lastAlumnoID) {
//             echo "Alumno: " . $alumnoID . "<br>";
//             echo "Profesor: " . $profesor . "<br>";
//             echo "Competencias: " . $competencia . "<br>";
//             echo "<br>";
//         }

//         // Actualizar el ID del último alumno
//         $lastAlumnoID = $alumnoID;
//     }
// } else {
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión
// $conn->close();



// Realizar la consulta a un solo profesor sus tres competencias
// $query = "SELECT a.nomAlumno, p.nomProf, rn.CompetReg
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           WHERE a.idAlumno = (SELECT MIN(idAlumno) FROM alumnos)
//           ORDER BY p.idProfesor ASC";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Mostrar el primer alumno con todas las competencias de los profesores
//     $row = $result->fetch_assoc();
//     $alumno = $row["nomAlumno"];

//     echo "Alumno: " . $alumno . "<br>";

//     do {
//         $profesor = $row["nomProf"];
//         $competencia = $row["CompetReg"];

//         echo "Profesor: " . $profesor . "<br>";
//         echo "Competencia: " . $competencia . "<br>";
//         echo "<br>";

//     } while ($row = $result->fetch_assoc());
// } else {
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión
// $conn->close();

// las competencias de los profesores 
// $query = "SELECT a.nomAlumno, p.nomProf, p.curProf, rn.CompetReg
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           WHERE a.idAlumno = (SELECT MIN(idAlumno) FROM alumnos)
//           ORDER BY p.idProfesor ASC";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Mostrar el primer alumno con todas las competencias de los profesores
//     $row = $result->fetch_assoc();
//     $alumno = $row["nomAlumno"];

//     echo "Alumno: " . $alumno . "<br>";

//     do {
//         $profesor = $row["nomProf"];
//         $curso = $row["curProf"];
//         $competencia = $row["CompetReg"];

//         echo "Profesor: " . $profesor . "<br>";
//         echo "Curso: " . $curso . "<br>";
//         echo "Competencia: " . $competencia . "<br>";
//         echo "<br>";

//     } while ($row = $result->fetch_assoc());
// } else {
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión
// $conn->close();


?>
