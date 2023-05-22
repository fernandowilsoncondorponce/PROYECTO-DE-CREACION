<?php
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

// // Establecer estilos CSS inline para las celdas ocultas
// $pdf->SetCSS('.hidden-cell { background-color: red; }'); // Ajusta el color según tus necesidades

// // Aplicar estilos CSS a las celdas ocultas
// $pdf->WriteHTML('<style>.hidden-cell { background-color: red; }</style>', \Mpdf\HTMLParserMode::HEADER_CSS);
// $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

// // Generar el archivo PDF
// $pdf->Output('mi_archivo.pdf', 'D');
// 
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

// // Establecer estilos CSS inline para cambiar el color de las celdas
// $pdf->SetCSS('.colored-cell { background-color: #ff0000; color: #ffffff; }'); // Ajusta el color según tus necesidades

// // Aplicar estilos CSS a las celdas en el contenido HTML
// $pdf->WriteHTML('<style>.colored-cell { background-color: #ff0000; color: #ffffff; }</style>', \Mpdf\HTMLParserMode::HEADER_CSS);
// $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

// // Generar el archivo PDF
// $pdf->Output('mi_archivo.pdf', 'D');

// require_once __DIR__ . '/vendor/autoload.php';

// $nombre = "John Doe";
// $edad = 30;

// ob_start();
// include 'html.php';
// $html = ob_get_clean();
// header('Content-Type: text/html');
// // Crear una instancia de mPDF
// $pdf = new \Mpdf\Mpdf();
// // Opcional: Configurar opciones de mPDF

// // Agregar una página
// $pdf->AddPage();

// // Escribir el contenido HTML en el archivo PDF
// $pdf->WriteHTML($html);
// // $pdf->SetOptions([
// //     'ignore_invalid_utf8' => true,
// // ]);
// // Generar el archivo PDF
// $pdf->Output('mi_archivo.pdf', 'D');
require_once 'vendor/tecnickcom/tcpdf/tcpdf.php';

$nombre = "Juan Pérez";
$edad = 30;

ob_start();
include 'Bolet.php';
$html = ob_get_clean();

// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Configurar algunas propiedades del documento
$pdf->SetCreator('Mi Aplicación');
$pdf->SetAuthor('Yo');
$pdf->SetTitle('Mi Documento PDF');
$pdf->SetMargins(10, 10, 10); // Establecer los márgenes del documento

// Agregar una página
$pdf->AddPage();

// Escribir el contenido HTML en el archivo PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el archivo PDF
$pdf->Output('mi_archivo.pdf', 'D');
?>