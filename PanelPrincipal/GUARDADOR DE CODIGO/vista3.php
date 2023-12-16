<?php

session_start();
// SI EL ID DEL USUARIO ESTA VACIO SE EJECUTARA EL CODIGO
if (empty($_SESSION['id'])) {
  header("location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Estilos generales */
    * {
      box-sizing: border-box;
      /* hacer que el ancho y el alto incluyan el relleno y el borde */
      margin: 0;
      /* quitar los márgenes por defecto */
      padding: 0;
      /* quitar los rellenos por defecto */
    }

    /* Estilos del header */
    header {
      background-color: #fff;
      /* color de fondo negro */
      height: 80px;
      /* altura del header */
      display: flex;
      /* usar flexbox para alinear los elementos */
      align-items: center;
      /* centrar los elementos verticalmente */
      justify-content: space-between;
      /* dejar espacio entre los elementos */
      padding: 0 20px;
      /* agregar relleno a los lados */
    }

    header h1 {
      color: white;
      /* color de texto blanco */
      font-family: Arial, sans-serif;
      /* tipo de letra */
      font-size: 24px;
      /* tamaño de letra */
    }

    header nav {
      display: flex;
      /* usar flexbox para alinear los elementos */
    }

    header nav a {
      color: white;
      /* color de texto blanco */
      text-decoration: none;
      /* quitar el subrayado */
      margin-left: 10px;
      /* agregar margen a la izquierda */
    }

    header nav a:hover {
      color: #ccc;
      /* cambiar el color al pasar el cursor */
    }

    /* Estilos del main */
    /* Estilos del main */
    main {
      display: grid;
      /* usar grid para alinear los elementos */
      grid-template-columns: 1fr 3fr;
      /* dividir el main en dos columnas */
      grid-template-rows: auto auto;
      /* dividir el main en dos filas */
      grid-template-areas:
        "sidebar container"
        "sidebar container";
      /* asignar áreas a los elementos */
      gap: 20px;
      /* dejar espacio entre los elementos */
      padding: 20px;
      /* agregar relleno alrededor */
    }

    .container {
      max-width: 800px;
      /* ancho máximo del contenedor principal */
      grid-area: container;
      /* asignar el área del contenedor */
    }

    .sidebar {
      background-color: #eee;
      /* color de fondo gris claro */
      grid-area: sidebar;
      /* asignar el área de la barra lateral */
    }

    /* ********************* */

    .container {
      max-width: 800px;
      /* ancho máximo del contenedor principal */
    }

    h2 {
      color: #333;
  
      font-family: Arial, sans-serif;
      
      font-size: 28px;
      
      margin-bottom: 26px;
      margin-top: 20px;
    }

    .container p {
      color: #333;
      /* color de texto negro */
      font-family: Arial, sans-serif;
      /* tipo de letra */
      font-size: 18px;
      /* tamaño de letra */
    }

    .container img {
      width: 10%;
      /* ancho de la imagen igual al contenedor */
    }

    .sidebar {
      background-color: #eee;
      /* color de fondo gris claro */
    }

    .sidebar h3 {
      color: #333;
      /* color de texto negro */
      font-family: Arial, sans-serif;
      /* tipo de letra */
      font-size: 22px;
      /* tamaño de letra */
    }

    .sidebar form {
      display: flex;
      /* usar flexbox para alinear los elementos */
    }

    .sidebar label {
      color: #333;
      /* color de texto negro */
      font-family: Arial, sans-serif;
      /* tipo de letra */
    }

    .sidebar input {
      width: 80%;
      /* ancho del input igual al sidebar*/
    }

    .sidebar button {
      background-color: #333;
      /* color de fondo negro */
      color: white;
      /* color de texto blanco */
    }

    .sidebar a {

      display: block;
      color: #333;
      /* color de texto negro */
      text-decoration: none;
      /* quitar el subrayado */
    }

    .sidebar a:hover {
      color: #999;
      /* cambiar el color al pasar el cursor */
    }

    /* LOGO */
    .imagen-logo {
      width: 59px;
      padding-top: 20px;
    }

    /* Estilos del footer */
    footer {
      background-color: #333;
      /* color de fondo negro */
      height: 40px;
      /* altura del footer */
      display: flex;
      /* usar flexbox para alinear los elementos */
      align-items: center;
      /* centrar los elementos verticalmente */
      justify-content: center;
      /* centrar los elementos horizontalmente */
    }

    footer p {
      color: white;
      /* color de texto blanco */
      font-family: Arial, sans-serif;
      /* tipo de letra */
    }

    /* Estilos de los botones */
    button,
    a {
      /*      display: inline-block;*/
      /* hacer que los elementos sean en línea */
      padding: 10px 20px;
      /* agregar relleno a los lados */
      border: none;
      /* quitar el borde */
      border-radius: 5px;
      /* hacer que el borde sea redondeado */
      /* background-color: #333; */
      color: white;
      /* color de texto blanco */
      cursor: pointer;
      /* cambiar el cursor al pasar el cursor */
      transition: transform 0.3s;
      /* agregar una transición al transformar el elemento */
    }

    /*a:hover {
      transform: scale(1.0);
      
    }*/

    .buscar {
      color: white;
      background-color: #135d76;
      padding: 5px 10px;
    }

    .show {
      display: block;

    }

    .hiden {
      display: none;
    }

    /* TABLA */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .tardanza {
      background-color: darkcyan;
      
    }

    .justificacion{
      background-color: #e10e69;
    }

    /* ELEGIR GRADO y SECCION */

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    select {
      width: 80%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      background-color: #ffffff;
      font-size: 14px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #4caf50;
      color: #ffffff;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    a {
      text-decoration: none;

    }

    .botonSeccion {

      display: block;



    }

    .ocultarSecciones {
      display: none;
    }
    .buscarAlumnoExact{
       margin-top: 10px;
       display: flex;
       margin-left: 68%;
       margin-block: auto;

    }
    .botonAlumnoExact{
      margin-left: 9px;
    }
   
  </style>
</head>

<body>
  <header>
    <img class="imagen-logo" src="logo.png" alt="Logo">
    <div class="usuarioPanel"><?php
                              echo $_SESSION['nombre'] . $_SESSION['apellido'];
                              ?></div>
    <button type="button"> <a href="controlador/controlador_cerrar_session.php"> SALIR</a> </button>


  </header>
  <main>



     
  <div class="divGradSec show" id="buscarGradSec">
      <?php

      include 'seccionLista.php';

      ?>
    </div>
    </div>

  


    <aside class="sidebar">
      <a href="#">Buscar Alumno</a>
 
      <a href="registrar_Tardanza.php" >Tardanzas </a>
      <a href="registrar_Actitud.php" > Insidencias</a>
      <a href="mostrar_Registros.php">Mostrar Registro</a>
    </aside>
  </main>
  <footer>
    <p>Todos los derechos reservados © 2023</p>
  </footer>

</body>


</html>