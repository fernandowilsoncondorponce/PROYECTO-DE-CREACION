<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<input type="text" id="buscarInput" placeholder="Buscar por nombre, apellido o DNI">
<button onclick="buscarAlumno()">Buscar</button>

<script>
  // Función para redirigir con los parámetros GET
  function redirigirConParametros(dni, accion) {

    //utilizar tu archivo php
    window.location.href = 'prueba de busquedatabla.php?dni=' + dni + '&accion=' + accion;
  }

  // Capturar el evento de clic en los botones
  document.addEventListener('DOMContentLoaded', function() {
    var botonesTardanza = document.getElementsByName('tardanza');
    var botonesJustificacion = document.getElementsByName('justificacion');

    // Agregar el evento de clic a los botones de tardanza
    botonesTardanza.forEach(function(boton) {
      boton.addEventListener('click', function() {
        var dni = boton.getAttribute('data-dni');
        redirigirConParametros(dni, 'tardanza');
      });
    });

    // Agregar el evento de clic a los botones de justificación
    botonesJustificacion.forEach(function(boton) {
      boton.addEventListener('click', function() {
        var dni = boton.getAttribute('data-dni');
        redirigirConParametros(dni, 'justificacion');
      });
    });
  });
</script>

<table id="tablaAlumnos">
  <tr>
    <th>NOMBRE</th>
    <th>APELLIDO</th>
    <th>DNI</th>
    <th>TARDANZA</th>
    <th>JUSTIFICACION</th>
  </tr>
  <tr>
    <td>Nombre1</td>
    <td>Apellido1</td>
    <td>12345678</td>
    <td>
      <button type="button" name="tardanza" data-dni="12345678">Tardanza</button>
    </td>
    <td>
      <button type="button" name="justificacion" data-dni="12345678">Justificación</button>
    </td>
  </tr>
  <tr>
    <td>Nombre2</td>
    <td>Apellido2</td>
    <td>87654321</td>
    <td>
      <button type="button" name="tardanza" data-dni="87654321">Tardanza</button>
    </td>
    <td>
      <button type="button" name="justificacion" data-dni="87654321">Justificación</button>
    </td>
  </tr>
  <!-- Otros registros de alumnos -->
</table>
<h4><?php if (isset($_GET['dni'])) {
  $dni = $_GET['dni'];


$response = "El DNI del alumno seleccionado es: " . $dni;

// Puedes agregar más código aquí según tus necesidades

// Finalizar el script PHP
// exit;
echo $response;


} ?></h4>

<script>
  function buscarAlumno() {
    var input = document.getElementById('buscarInput').value.toLowerCase();
    var tabla = document.getElementById('tablaAlumnos');
    var filas = tabla.getElementsByTagName('tr');

    for (var i = 1; i < filas.length; i++) { // Empezamos desde 1 para omitir la fila de encabezado
      var dni = filas[i].getElementsByTagName('td')[2].innerText;

      if (dni === input) {
        filas[i].style.display = '';
      } else {
        filas[i].style.display = 'none';
      }
    }
  }
</script>





</html>