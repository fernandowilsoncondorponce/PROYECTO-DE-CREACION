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
    echo '<br>';
    // echo "ID ALUMNO " . $row["idAlumno"] ."<br>";
    echo "Alumno: " . $alumno . "";

//array de cada libreria
$todaLasAreas = array();

    do {

//el array con las notas
$comNota= array();
//la libreria
$alumBucle = array();

    
        //USA EL NUMERO 1 PARA  GUARDA EL EL UNO y
   
        $profesor = $row["nomProf"];

        $curso = $row["curProf"];

        $competencia = $row["CompetReg"];

        $nota = $row["notaReg"];
          
        $descripcion = $row["conclDescReg"];


array_push($comNota,$competencia);
array_push($comNota, $nota);
$alumBucle[$curso] = $comNota;

array_push($todaLasAreas,$alumBucle);



} while ($row = $result->fetch_assoc());


print_r($todaLasAreas); 

$count = count($todaLasAreas);

// *****************
//  //AHORA SE PUEDE REALIZAR LOS IF PORQUE COMPARARA POR CADA LLAVE
 for ($e=0; $e < $count; $e++) { 
    
foreach ($todaLasAreas[$e] as $key => $value) {
// echo " ".$key  ."<br> " ;
if ($key == "CCSS" && $value[0] == "Competencia1") {
        echo "<br>".$key  ."<br>";
        echo "" . "  La competencia1 = ". $value[1] ."";
  }

if ($key == "CCSS" && $value[0] == "Competencia2") {
     echo " <br>".$key  ."<br>";
        echo " La competencia2 =". $value[1] ." ";
  }

if ($key == "CCSS" && $value[0] == "Competencia3") {
     echo " <br>".$key  ."<br>";
        echo "" . "La competencia3 =  ". $value[1] ."";
  }

   if ($key == "EPT" && $value[0] == "Competencia1") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia1 = ". $value[1] ."";
  }

   if ($key == "EF" && $value[0] == "Competencia1") {
    echo "<br> ". $key  ."<br>";
        echo "" . "La competencia1 = ". $value[1] ."";
  }
   
    if ($key == "EF" && $value[0] == "Competencia2") {
        echo "<br> ".$key  ."<br> ";
        echo "" . "La competencia2 = ". $value[1] ."";
  }
  if ($key == "EF" && $value[0] == "Competencia3") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia3 = ". $value[1] ."";
  }

   if ($key == "COM" && $value[0] == "Competencia1") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia1 = ". $value[1] ."";
  }

   if ($key == "COM" && $value[0] == "Competencia2") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia2 = ". $value[1] ."";
  }

   if ($key == "COM" && $value[0] == "Competencia3") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia3 = ". $value[1] ."";
  }
   if ($key == "ING" && $value[0] == "Competencia1") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia1 = ". $value[1] ."";
  }
  if ($key == "ING" && $value[0] == "Competencia2") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia2 = ". $value[1] ."";
  }
  if ($key == "ING" && $value[0] == "Competencia3") {
    echo "<br> ".$key  ."<br>";
        echo "" . "La competencia3 = ". $value[1] ."<br>";
  }
}
}
// ************************

// //PASAR PRIMERO CONTAR TODOS LOS ARRAY PARA PASAR POR 
// //TODOS LAS LLAVES
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
// $nombreArchivo = __DIR__ . '/' . $alumno . '.pdf';

//     // Guardar el archivo PDF en la misma carpeta que el archivo PHP
//    $pdf->Output($nombreArchivo, 'F');
   
//    
//    ***********************************



}else {
    // echo "No se encontraron resultados.";
}

}

}
$conn->close();

 ?>