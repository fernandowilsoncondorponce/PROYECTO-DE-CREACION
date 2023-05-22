<?php 
// $nombre = "John Doe";
// $edad = 30;


require_once __DIR__ . '/vendor/autoload.php';

$nombre = "John Doe";
$edad = 30;

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
// $pdf->SetOptions([
//     'ignore_invalid_utf8' => true,
// ]);
// Generar el archivo PDF
$pdf->Output('mi_archivo.pdf', 'D');

 ?>