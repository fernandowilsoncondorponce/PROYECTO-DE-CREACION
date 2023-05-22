<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");


$servername = "localhost";
$username = "root";
$password = "";
$baseDatos = "bdakirakato";

// Crear una nueva conexión
$conn = new mysqli($servername, $username, $password,$baseDatos);
/**FUNCIONA
// $query = "SELECT * FROM registnotasbimest";
// $resultado = mysqli_query($conn, $query);

// // Verificar si se encontraron registros
// if (mysqli_num_rows($resultado) > 0) {
//     // Recorrer los registros y mostrar la información
//     while ($fila = mysqli_fetch_assoc($resultado)) {
//         echo "ID: " . $fila['idRegNotas'] . "<br>";
//         echo "Fecha: " . $fila['fActReg'] . "<br>";
//         echo "Hora: " . $fila['hActReg'] . "<br>";
//         echo "Competencias: " . $fila['CompetReg'] . "<br>";
//         echo "Nota: " . $fila['notaReg'] . "<br>";
//         echo "Conclusion: " . $fila['conclDescReg'] . "<br>";
//          echo "Conclusion: " . $fila['bimesReg'] . "<br>";
//         echo "<br>";
//     }
// } else {
//     echo "Error en la consulta: " . mysqli_error($conn);
// }
//***/


// ID del alumno específico
// 
// for ($i=0; $i < ; $i++) { 
//     // code...
// }
$alumnoID = 1;
// Consulta SQL con JOIN para obtener datos del profesor y curso
$sql = "SELECT rn.*, p.nomProf, p.curProf
        FROM registnotasbimest rn
        INNER JOIN profesores p ON rn.idProfesor = p.idProfesor
        WHERE rn.idAlumno = $alumnoID";

// Ejecutar consulta
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y utilizar los datos
    while ($row = $result->fetch_assoc()) {
     
        $competencias = $row["CompetReg"];
        $notaReg = $row["notaReg"];
        $conclusionDesc = $row["conclDescReg"];
        $nomProfesor = $row["nomProf"];
        $cursoProfesor = $row["curProf"];
        $bimestre = $row["bimesReg"];

        
        echo "Competencias: " . $competencias . "<br>";
        echo "Nota Registrada: " . $notaReg . "<br>";
        echo "Descripción de la conclusión: " . $conclusionDesc . "<br>";
        echo "Profesor: " . $nomProfesor . "<br>";
        echo "Curso: " . $cursoProfesor . "<br>";
        echo "Bimestre " . $bimestre . "<br>";

    }
} else {
    echo "No se encontraron resultados para el alumno con ID: " . $alumnoID;
}

// Cerrar conexión
$conn->close();


 ?>