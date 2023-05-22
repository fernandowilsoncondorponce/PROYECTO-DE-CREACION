<?php
////PRINCIPAL CONSULTA******************/////
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


// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit;
}


// $alumnoID = 1; // Asigna el valor del alumno que deseas mostrar
$query1 = "SELECT COUNT(*) AS total_estudiantes_seccion_A
FROM alumnos
WHERE secAlumno = 'A'";

$result = $conn->query($query1);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $alumnoID= $row["total_estudiantes_seccion_A"];
    echo "Total de estudiantes en la sección A: " . $alumnoID . "<br>";


for ($i=0; $i <= $alumnoID; $i++) { 


$query = "SELECT a.nomAlumno, a.idAlumno, p.nomProf, p.curProf, rn.CompetReg, rn.notaReg, rn.conclDescReg
          FROM alumnos a
          JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
          JOIN profesores p ON rn.idProfesor = p.idProfesor
          WHERE a.idAlumno = $i and a.secAlumno = 'A'
          
          ORDER BY p.idProfesor ASC";

$result = $conn->query($query);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos del alumno y sus competencias y notas de los profesores
    $row = $result->fetch_assoc();
    $alumno = $row["nomAlumno"];
    echo "ID ALUMNO " . $row["idAlumno"] ."<br>";
    echo "Alumno: " . $alumno . "<br>";

    do {
       
    	
        $profesor = $row["nomProf"];

        $curso = $row["curProf"];

        $competencia = $row["CompetReg"];
      
        $nota = $row["notaReg"];
        
        $descripcion = $row["conclDescReg"];
       

        echo "Profesor: " . $profesor . "<br>";
        echo "Curso: " . $curso . "<br>";
        echo "Competencia: " . $competencia . "<br>";
        echo "Nota: " . $nota . "<br>";
        echo "<br>";
        echo "conclusiones Descriptivas <br>".$descripcion ." " ;
        echo "<br>";

    } while ($row = $result->fetch_assoc());

    //UTILIZAR EL OBJETO I PONER LOS DATOS DEL OBJETO EN EL html.php
    //utilizar el html.php
    //comensara el bucle pero para el dos y el objeto comenzara otra ves desde cero 
    //pero como ya se creo el archivo no hace falta 
} else {
    // echo "No se encontraron resultados.";
}


}
}

$conn->close();
// *****************************////

// require_once('tcpdf/tcpdf.php');
// require_once 'vendor/autoload.php';
// // Crear el objeto TCPDF
// $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// // Establecer el título del documento
// $pdf->SetTitle('Reporte de Alumnos');

// // Agregar una página al documento
// $pdf->AddPage();

// // Configurar el estilo de fuente
// $pdf->SetFont('Helvetica', '', 12);

// // Establecer el contenido del PDF
// $contenido = '';

// $servername = "localhost";
// $username = "root";
// $password = "";
// $baseDatos = "bdakirakato";

// // Crear una nueva conexión
// $conn = new mysqli($servername, $username, $password, $baseDatos);

// // Verificar la conexión
// if (mysqli_connect_errno()) {
//     echo "Error al conectar a la base de datos: " . mysqli_connect_error();
//     exit;
// }

// $query = "SELECT a.nomAlumno, a.idAlumno, p.nomProf, p.curProf, rn.CompetReg, rn.notaReg, rn.conclDescReg
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           WHERE a.secAlumno = 'A'
//           ORDER BY a.idAlumno ASC, p.idProfesor ASC";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $alumnoActual = $row["idAlumno"];

//     do {
//         // Si cambió el alumno, agregar su información al PDF
//         if ($alumnoActual != $row["idAlumno"]) {
//             $pdf->MultiCell(0, 10, $contenido);
//             $contenido = '';
//             $alumnoActual = $row["idAlumno"];
//         }

//         $alumno = $row["nomAlumno"];
//         $profesor = $row["nomProf"];
//         $curso = $row["curProf"];
//         $competencia = $row["CompetReg"];
//         $nota = $row["notaReg"];
//         $descripcion = $row["conclDescReg"];

//         // Agregar la información del alumno al contenido del PDF
//         $contenido .= "Alumno: " . $alumno . "\n";
//         $contenido .= "Profesor: " . $profesor . "\n";
//         $contenido .= "Curso: " . $curso . "\n";
//         $contenido .= "Competencia: " . $competencia . "\n";
//         $contenido .= "Nota: " . $nota . "\n";
//         $contenido .= "Conclusiones Descriptivas: " . $descripcion . "\n\n";

//     } while ($row = $result->fetch_assoc());

//     // Agregar el último contenido al PDF
//     $pdf->MultiCell(0, 10, $contenido);
// } else {
//     $pdf->Cell(0, 10, "No se encontraron resultados.", 0, 1);
// }

// // Cerrar la conexión a la base de datos
// $conn->close();

// // Generar el archivo PDF
// $pdf->Output('reporte_alumnos.pdf', 'I');


// require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';
// require_once 'vendor/autoload.php';

// $servername = "localhost";
// $username = "root";
// $password = "";
// $baseDatos = "bdakirakato";

// // Crear una nueva conexión
// $conn = new mysqli($servername, $username, $password, $baseDatos);

// // Verificar la conexión
// if (mysqli_connect_errno()) {
//     echo "Error al conectar a la base de datos: " . mysqli_connect_error();
//     exit;
// }

// $query = "SELECT a.nomAlumno, a.idAlumno, p.nomProf, p.curProf, rn.CompetReg, rn.notaReg, rn.conclDescReg
//           FROM alumnos a
//           JOIN registnotasbimest rn ON a.idAlumno = rn.idAlumno
//           JOIN profesores p ON rn.idProfesor = p.idProfesor
//           WHERE a.secAlumno = 'A'
//           ORDER BY a.idAlumno ASC, p.idProfesor ASC";

// $result = $conn->query($query);

// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $alumno = $row["nomAlumno"];
//         $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
//         $pdf->SetTitle('Reporte de Alumno: ' . $alumno);
//         $pdf->AddPage();
//         $pdf->SetFont('Helvetica', '', 12);

//         $contenido = "Alumno: " . $alumno . "\n\n";
//         $contenido .= "Profesor: " . $row["nomProf"] . "\n";
//         $contenido .= "Curso: " . $row["curProf"] . "\n";
//         $contenido .= "Competencia: " . $row["CompetReg"] . "\n";
//         $contenido .= "Nota: " . $row["notaReg"] . "\n";
//         $contenido .= "Conclusiones Descriptivas: " . $row["conclDescReg"] . "\n\n";

//         $pdf->MultiCell(0, 10, $contenido);
//         $pdf->Output('reporte_alumno_' . $alumno . '.pdf', 'F');
//     }
// } else {
//     echo "No se encontraron resultados.";
// }

// // Cerrar la conexión a la base de datos
// $conn->close();






// require_once('tcpdf/tcpdf.php');
// require_once 'vendor/autoload.php';

// $nombre1 = "John Doe";
// $edad1 = 30;

// $nombre2 = "Jane Smith";
// $edad2 = 35;

// // Crear el objeto TCPDF
// $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// // Establecer el título del documento
// $pdf->SetTitle('Información de Usuario');

// // Agregar una página al documento
// $pdf->AddPage();

// // Configurar el estilo de fuente
// $pdf->SetFont('Helvetica', '', 12);

// // Obtener el contenido de la plantilla HTML
// $htmlTemplate = <<<EOD
// <!DOCTYPE html>
// <html>
// <head>
//     <title>Plantilla HTML</title>
// </head>
// <body>
//     <h1>Información del usuario</h1>
//     <p>Nombre: {{nombre}}</p>
//     <p>Edad: {{edad}}</p>
// </body>
// </html>
// EOD;

// // Reemplazar las etiquetas de impresión con los valores correspondientes
// $htmlTemplate1 = str_replace('{{nombre}}', $nombre1, $htmlTemplate);
// $htmlTemplate1 = str_replace('{{edad}}', $edad1, $htmlTemplate1);

// $htmlTemplate2 = str_replace('{{nombre}}', $nombre2, $htmlTemplate);
// $htmlTemplate2 = str_replace('{{edad}}', $edad2, $htmlTemplate2);

// // Escribir el contenido HTML en el PDF
// $pdf->writeHTML($htmlTemplate1, true, false, true, false, '');

// // Generar el nombre del archivo PDF
// $nombreArchivo1 = 'pdf1.pdf';

// // Guardar el archivo PDF en la carpeta deseada
// $pdf->Output($nombreArchivo1, 'F');

// // Agregar una nueva página al documento
// $pdf->AddPage();

// // Escribir el contenido HTML actualizado en el PDF
// $pdf->writeHTML($htmlTemplate2, true, false, true, false, '');

// // Generar el nombre del segundo archivo PDF
// $nombreArchivo2 = 'pdf2.pdf';

// // Guardar el segundo archivo PDF en la carpeta deseada
// $pdf->Output($nombreArchivo2, 'F');

// // Cerrar el objeto TCPDF
// $pdf->close();
///CREANDO ARCHIVOS CONSECUTIVOS***********>
// require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';
// // Datos de los usuarios
$usuarios = [
    [
        'nombre' => 'John Doe',
        'edad' => 30,
    ],
    [
        'nombre' => 'Jane Smith',
        'nombre' => 'Jane Smith',
        'edad' => 25,
    ],
    // Agrega más usuarios aquí
];

// Recorrer los usuarios
foreach ($usuarios as $usuario) {
    $nombre = $usuario['nombre'];
    $edad = $usuario['edad'];

    // Crear el objeto TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Establecer el título del documento
    $pdf->SetTitle('Información del usuario');

    // Agregar una página al documento
    $pdf->AddPage();

    // Configurar el estilo de fuente
    $pdf->SetFont('Helvetica', '', 12);

    // Establecer el contenido del PDF
    $contenido = "Nombre: " . $nombre . "\n";
    $contenido .= "Edad: " . $edad . "\n";

    // Agregar el contenido al PDF
    $pdf->MultiCell(0, 10, $contenido);

    // Generar el nombre del archivo
    $nombreArchivo = __DIR__ . '/' . $nombre . '.pdf';

    // Guardar el archivo PDF en la misma carpeta que el archivo PHP
    $pdf->Output($nombreArchivo, 'F');

    echo "Se ha generado el archivo PDF para el usuario: " . $nombre . "<br>";
}

echo "Se han generado los archivos PDF para todos los usuarios.";
// ////CREAR ARCHIVOS CONSECUTIVOS********/
 ?>


