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
    // echo "Total de estudiantes en la sección A: " . $alumnoID . "<br>";


$alumnoID = 2;

require_once __DIR__ . '/vendor/autoload.php';

//array hacerlo global si no funciona


//Prara obtenreo todos los estudiantes de la A
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
    // echo '<br>';
    // echo "ID ALUMNO " . $row["idAlumno"] ."<br>";
    // echo "Alumno: " . $alumno . "<br>";

//array de cada libreria
$todaLasAreas = array();

    do {

//el array con las notas
$comNota= array();
//la libreria
$alumBucle = array();

    	 //CANTIDAD DE DATOS = B = 1 luego ....
        // [ALUMNO[B]]
        //USA EL NUMERO 1 PARA  GUARDA EL EL UNO y
        //aqui
        $profesor = $row["nomProf"];

        $curso = $row["curProf"];

        $competencia = $row["CompetReg"];

        $nota = $row["notaReg"];
          //en CADA POSICION DE GUARDA
        $descripcion = $row["conclDescReg"];


array_push($comNota,$competencia);
array_push($comNota, $nota);
$alumBucle[$curso] = $comNota;

array_push($todaLasAreas,$alumBucle);




    } while ($row = $result->fetch_assoc());


// print_r($todaLasAreas); 

$count = count($todaLasAreas);
//PASAR PRIMERO CONTAR TODOS LOS ARRAY PARA PASAR POR 
//TODOS LAS LLAVES
ob_start();
include 'html.php';
$html = ob_get_clean();

// Crear una instancia de mPDF
$pdf = new \Mpdf\Mpdf();
// Opcional: Configurar opciones de mPDF

// Agregar una página
$pdf->AddPage();

// Escribir el contenido HTML en el archivo PDF
$pdf->WriteHTML($html);

// Generar el archivo PDF
$nombreArchivo = __DIR__ . '/' . $alumno . '.pdf';

    // Guardar el archivo PDF en la misma carpeta que el archivo PHP
   $pdf->Output($nombreArchivo, 'F');
//  for ($e=0; $e < $count; $e++) { 
    
// foreach ($todaLasAreas[$e] as $key => $value) {

//   echo  "<br>". $key . "<br>";
//   VALIDAR CADA LLAVE CON SU Competencia porque el array tiene niveles 
//   if ($key == "CIENCIA SOCIALES" && $value[0] == "Competencia1") {
//         echo "<br>" . "La constancia1 tu nota es ". $value[1] ."<br>";
//     }

//     //AHORA SE PUEDE REALIZAR LOS IF PORQUE COMPARARA POR CADA LLAVE
//   if ($key == "CIENCIA SOCIALES" && $value[0] == "Competencia2") {
//         echo "<br>" . "La constancia2 tu nota es ". $value[1] ."<br>";
//   }

//    if ($key == "EDUCACION PARA EL TRABAJO " && $value[0] == "Competencia1") {
//         echo "<br>" . "La constancia1 tu nota es ". $value[1] ."<br>";
//   }
// }
// // echo $e;

// }







// echo "Se ha generado el archivo PDF para el usuario: " . $nombre . "<br>";


}else {
    // echo "No se encontraron resultados.";
}


}


}

$conn->close();





// require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';
// // Recorrer los usuarios
// $usuarios = [
//     [
//         'nombre' => 'John Doe',
//         'edad' => 30,
//     ],
//     [
//         'nombre' => 'Jane Smith',
//         'nombre' => 'Jane Smith',
//         'edad' => 25,
//     ],
//     // Agrega más usuarios aquí
// ];
// foreach ($usuarios as $usuario) {
//     $nombre = $usuario['nombre'];
//     $edad = $usuario['edad'];

//     // Crear el objeto TCPDF
//     $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

//     // Establecer el título del documento
//     $pdf->SetTitle('Información del usuario');

//     // Agregar una página al documento
//     $pdf->AddPage();

//     // Configurar el estilo de fuente
//     $pdf->SetFont('Helvetica', '', 12);

//     // Establecer el contenido del PDF
//     $contenido = "Nombre: " . $nombre . "\n";
//     $contenido .= "Edad: " . $edad . "\n";

//     // Agregar el contenido al PDF
//     $pdf->MultiCell(0, 10, $contenido);

//     // Generar el nombre del archivo
//     $nombreArchivo = __DIR__ . '/' . $nombre . '.pdf';

//     // Guardar el archivo PDF en la misma carpeta que el archivo PHP
//     $pdf->Output($nombreArchivo, 'F');

//     echo "Se ha generado el archivo PDF para el usuario: " . $nombre . "<br>";
// }

// echo "Se han generado los archivos PDF para todos los usuarios.";






// require_once __DIR__ . '/vendor/autoload.php';

// $nombre = "John Doe";
// $edad = 30;

// ob_start();

// include 'html.php';
// $html = ob_get_clean();

// // Crear una instancia de mPDF
// $pdf = new \Mpdf\Mpdf();
// // Opcional: Configurar opciones de mPDF

// // Agregar una página
// $pdf->AddPage();

// // Escribir el contenido HTML en el archivo PDF
// $pdf->WriteHTML($html);

// // Generar el archivo PDF
// $pdf->Output('mi_archivo.pdf', 'D');



 ?>