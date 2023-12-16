<?php 

 $servername = "localhost";
      $username = "root";
      $password = "";
      $baseDatos = "bdakirakato";
      // Crear una nueva conexión
      $conn = new mysqli($servername, $username, $password, $baseDatos);
       $conn->set_charset("utf8");
      // Verificar la conexión
      // if (mysqli_connect_errno()) {
      //   echo "Error al conectar a la base de datos: " . mysqli_connect_error();
      //   exit;
      // }



 ?>