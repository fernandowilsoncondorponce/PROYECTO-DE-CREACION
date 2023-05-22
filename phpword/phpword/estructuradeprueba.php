

<?php

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\Shared\String as PhpWordString;
$myString = new PhpWordString();
use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('plantilla.docx');
 
$nombre = "Sandra S.L.";
$direccion = "Mi dirección";
$municipio = "Mrd";
$provincia = "Bdj";
$cp = "02541";
$telefono = "24536784";


// --- Asignamos valores a la plantilla
$myString->setValue('nombre_empresa',$nombre);
$myString->setValue('direccion_empresa',$direccion);
$myString->setValue('municipio_empresa',$municipio);
$myString>setValue('provincia_empresa',$provincia);
$myString->setValue('cp_empresa',$cp);
// $templateWord->setValue('telefono_empresa',$telefono);

// --- Guardamos el documento
$myString->saveAs('Documento02.docx');

header("Content-Disposition: attachment; filename=Documento02.docx; charset=iso-8859-1");
echo file_get_contents('Documento02.docx');
        

 ?>