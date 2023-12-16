

<?php
// Obtener el valor del parámetro DNI enviado desde JavaScript
$dni = $_GET['dni'];

// Ejecutar el código PHP deseado con el DNI obtenido
// Aquí puedes realizar las operaciones necesarias, como consultas a la base de datos, actualizaciones, etc.
// Puedes utilizar la variable $dni para filtrar los resultados o realizar acciones específicas para ese alumno

// Ejemplo de código PHP que muestra un mensaje con el DNI del alumno
// echo "El DNI del alumno seleccionado es: " . $dni;
$response = "El DNI del alumno seleccionado es: " . $dni;

// Puedes agregar más código aquí según tus necesidades

// Finalizar el script PHP
// exit;
echo $response;


?>



