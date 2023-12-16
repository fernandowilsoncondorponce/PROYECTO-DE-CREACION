<?php

session_start();
// SI EL ID DEL USUARIO ESTA VACIO SE EJECUTARA EL CODIGO
if(empty($_SESSION['id'])){
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
      /* color de texto negro */
      font-family: Arial, sans-serif;
      /* tipo de letra */
      font-size: 28px;
      /* tamaño de letra */
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

    .editar {
      background-color: #2ac3a2;
    }

    .eliminar {
      background-color: #e10e69;
    }

    /* ELEGIR GRADO y SECCION */
   
  /* .form-group {
    margin-bottom: 15px;
  } */

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
  a{
        text-decoration: none;

  }

  .hidden {
    display: none;
  }

  </style>
</head>

<body>
  <header>
    <img class="imagen-logo" src="logo.png" alt="Logo"> <!-- agregar un logo -->
    <!-- <h1>Mi sitio web</h1>  -->
    
      <!-- <a href="#">Inicio</a>
      <a href="#">Servicios</a> -->
      <div class = "usuarioPanel"><?php
      echo $_SESSION['nombre'] . $_SESSION['apellido'];
      ?></div>
      <button type="button" > <a  href="controlador/controlador_cerrar_session.php"> SALIR</a> </button> 
      
    
  </header>
  <main>
    <div class="divBuscar show" id="buscar-alumno"> <!-- agregar un contenedor para el contenido principal -->
      <h2>BUSCAR</h2>
      <form action="#" method="get" style="margin-bottom: 21px;">
        <label for="buscar">INGRESA DNI:</label>
        <input type="text" id="buscar" name="buscar" placeholder="Ingrese dni">
        <button class="buscar" id="buscarAlumno" type="submit">Buscar</button>
      </form>

      <form action="#" method="get" style="margin-bottom: 21px;">
        <label for="buscar">INGRESA NOMBRE:</label>
        <input type="text" id="buscar" name="buscarNombre" placeholder="Ingrese el nombre">
        <button class="buscar" id="buscarNombre" type="submit">Buscar</button>
      </form>

      <form action="#" method="get" style="margin-bottom: 21px;">
        <label for="buscar">INGRESA APELLIDO:</label>
        <input type="text" id="buscar" name="buscarApellido" placeholder="Ingrese Apellido">
        <button class="buscar" id="buscarApellido" type="submit">Buscar</button>
      </form>



      <?php
      // header('Access-Control-Allow-Origin: *');
      // header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
      // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      // header("Allow: GET, POST, OPTIONS, PUT, DELETE");

      $servername = "localhost";
      $username = "root";
      $password = "";
      $baseDatos = "bdakirakato";
      // Crear una nueva conexión
      $conn = new mysqli($servername, $username, $password, $baseDatos);

      // Verificar la conexión
      if (mysqli_connect_errno()) {
        echo "Error al conectar a la base de datos: " . mysqli_connect_error();
        exit;
      }


      if (isset($_GET['buscar'])) {
        // Aquí puedes realizar las acciones que deseas hacer con $_GET['buscar']
        // $buscar = $_GET['buscar'];
        $i = $_GET['buscar'];
        // $i = 74331018;

        // $sql = "SELECT * FROM alumnos WHERE dniAlumno = '$i'";
        // $numero = '7433';
        $sql = "SELECT * FROM alumnos WHERE dniAlumno LIKE '$i%'";


        $result = $conn->query($sql);
        if ($result !== false && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $codigo = $row["idAlumno"];
          $nombre = $row["nomAlumno"];
          $apellido = $row["apeAlumno"];
          $seccion = $row["secAlumno"];
          $grado = $row["gradAlumno"];
          $dni = $row["dniAlumno"];
          $genero = $row["generoAlum"];
          $html = '
  <table>
    <tr>
      <th>CODIGO</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>SECCION</th>
      <th>GRADO</th>
      <th>DNI</th>
      <th>GENERO</th>
      <th>EDITAR</th>
      <th>ELIMINAR</th>
    </tr>
    <tr>
      <td>' . $codigo . '</td>
      <td>' . $nombre . '</td>
      <td>' . $apellido . '</td>
      <td>' . $seccion . '</td>
      <td>' . $grado . '</td>
      <td>' . $dni . '</td>
      <td>' . $genero . '</td>
      <td>
        <button class="editar" onclick="editarAlumno(' . $codigo . ')">Editar</button>
      </td>
      <td>
      <button class="eliminar" onclick="eliminarAlumno(' . $codigo . ')">Eliminar</button>
      </td>
    </tr>
  </table>';
          echo $html;
        } else {
          echo "No se encontraron resultados.";
        }

        // Resto del código...
      } else {
        // El índice 'buscar' no está definido
        // Puedes mostrar un mensaje o realizar otra acción
        echo "<br>";
        echo "NINGUN RESULTADO";
      }



      ?>

 


<?php include 'seleccionador.php'; ?>

      <div class="divModificar hiden" id="modificar-alumno"> <!-- agregar un contenedor para el contenido principal -->
        <h2>MODIFICAR ALUMNO</h2>
        <form action="#" method="get">
          <label for="buscar">Nombre</label>
          <input type="text" id="buscar" name="buscar" placeholder="Ingrese el nombre">
          <label for="buscar">Apellido</label>
          <input type="text" id="buscar" name="buscar" placeholder="Ingrese el nombre">
          <label for="buscar">DNI</label>
          <input type="text" id="buscar" name="buscar" placeholder="Ingrese el nombre">
        </form>
       
      </div>

<div class="divTardanzas hiden" id="tardanzas-alumno">

  <h2>Buscar Alumno - Tardanzas</h2>
 
  

</div>

<div class="divActitud hiden" id="actitud-alumno">

  <h2>Buscar Alumno - Actitud</h2>
 
  
  

</div>


      <aside class="sidebar"> <!-- agregar una barra lateral para las opciones dinámicas -->
        <a href="#" onclick="clickBuscarAlumno()">Buscar Alumno</a>
        <a href="#" onclick="clickAgregarAlumno()">Agregar Alumno</a>
        <a href="#" onclick= "clickAgregarTardanzas()">Tardanzas </a>
        <a href="#" onclick="clickAgregarActitud()"> Insidencias</a>
      </aside>
  </main>
  <footer>
    <p>Todos los derechos reservados © 2023</p> 
  </footer>
  <script>
    function clickAgregarAlumno() {
      // let seccionBuscarSecGrad = document.getElementById('buscarGradSec');

      let seccionBuscarAlumno = document.getElementById('buscar-alumno');
      let seccionModificarAlumno = document.getElementById('modificar-alumno');
      let seccionTardanzaAlumno = document.getElementById('tardanzas-alumno')
  
      let seccionActitudAlumno = document.getElementById('actitud-alumno')
      
     
      seccionModificarAlumno.style.display = "block"
 
      seccionTardanzaAlumno.style.display = 'none';
      seccionActitudAlumno.style.display='none'
      seccionBuscarAlumno.style.display = 'none';
    }


    function clickBuscarAlumno() {
      let seccionBuscarAlumno = document.getElementById('buscar-alumno');
      let seccionModificarAlumno = document.getElementById('modificar-alumno');
       let seccionTardanzaAlumno = document.getElementById('tardanzas-alumno')
      let seccionActitudAlumno = document.getElementById('actitud-alumno')
      seccionBuscarAlumno.style.display = 'block';
      seccionModificarAlumno.style.display = "none";
     seccionTardanzaAlumno.style.display = 'none';
      seccionActitudAlumno.style.display='none'
    }

    function clickAgregarTardanzas(){
      let seccionBuscarAlumno = document.getElementById('buscar-alumno');
      let seccionModificarAlumno = document.getElementById('modificar-alumno');
      let seccionTardanzaAlumno = document.getElementById('tardanzas-alumno')
      let seccionActitudAlumno = document.getElementById('actitud-alumno')

      seccionBuscarAlumno.style.display = 'none';
      seccionModificarAlumno.style.display = "none";
       seccionTardanzaAlumno.style.display = 'block';
      seccionActitudAlumno.style.display='none';
    }
     function clickAgregarActitud(){
      let seccionBuscarAlumno = document.getElementById('buscar-alumno');
      let seccionModificarAlumno = document.getElementById('modificar-alumno');
      let seccionTardanzaAlumno = document.getElementById('tardanzas-alumno')
      let seccionActitudAlumno = document.getElementById('actitud-alumno')

      seccionBuscarAlumno.style.display = 'none';
      seccionModificarAlumno.style.display = "none";
       seccionTardanzaAlumno.style.display = 'none';
      seccionActitudAlumno.style.display='block';
    }



  </script>
 
</body>

</html>