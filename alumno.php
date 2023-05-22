<?php 

// $comNota= array();

// array_push($comNota, "competencia1");
// array_push($comNota, "A");

// $curso = "materia";

// $diccionario = array();
// $diccionario[$curso] = $comNota;
// // $diccionario["clave2"] = "valor2";

// // Mostrar los valores de clave1
// print_r($diccionario[$curso][0]);
// 
// 
// $diccionario = array();
// $diccionario["clave1"] = array("valor1", "valor3");
// $diccionario["clave2"] = "valor2";

// // Agregar dos arrays más a la misma clave dentro de un bucle
// for ($i = 0; $i < 5; $i++) {
//     $diccionario["clave1"] = array_merge($diccionario["clave1"], array("valor5","valor4"));
// }

// // Mostrar los valores de clave1
// print_r($diccionario["clave1"]);
// 
$diccionario = array();
$diccionario["clave1"] = array("constancia1", "A");
// $diccionario["clave2"] = "valor2";

// Agregar el diccionario al array
$array = array($diccionario);

// Mostrar el array
print_r($array); 
echo '<br>';
$diccionario = array();
$diccionario ["clave1"] = array("constancia2", "A");
// $array = array($diccionario);
array_push($array,$diccionario);
print_r($array);

$diccionario = array();
$diccionario ["clave2"] = array("constancia1", "B");
array_push($array,$diccionario);

// Mostrar el array
print_r($array); 

 ?>