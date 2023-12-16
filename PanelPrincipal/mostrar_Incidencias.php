<?php

session_start();
// SI EL ID DEL USUARIO ESTA VACIO SE EJECUTARA EL CODIGO
if (empty($_SESSION['id'])) {
    header("location: login.php");
}


?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos_de_entorno.css">
  

  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">  <?php
                           echo $_SESSION['nombre'] . $_SESSION['apellido'];
                              ?> </a>
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="vista.php">VISTA</a>
            </li>
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                INGRESAR REGISTRO
               </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="registrar_Tardanza.php">TARDANZAS</a></li>
                <li><a class="dropdown-item" href="registrar_Actitud.php">INCIDENCIAS</a></li>
              </ul>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="mostrar_Registros.php">HISTORIAL REGISTRO</a>
            </li>
          </ul>
          <a href="controlador/controlador_cerrar_session.php"> <button class="btn btn-outline-success" type="submit" >SALIR</button></a>
        </div>
      </div>
    </nav>
    <main>
<?php
$servername = "sql209.infinityfree.com";
$username = "if0_34477030";
$password = "h0Cqbl8sBR";
$baseDatos = "if0_34477030_bdakirakato";

$conn = new mysqli($servername, $username, $password, $baseDatos);

  // Verificar la conexión
  if (mysqli_connect_errno()) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit;
  }
  ?>

            <h2>INCIDENCIAS</h2>
           
              
<?php 

 //ELIMINAR INCIDENCIA
 if (isset($_GET["idRegInd"])) {
                    
    $idRegInd= $_GET['idRegInd'];
   

    // Realizar la consulta para eliminar el registro
    $sql = "DELETE FROM registro_incidencias WHERE id_Reg_Ind = '$idRegInd'";
    
    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
    
    $conn->close();
   }

   if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT rI.*, a.nomAlumno , p.nomProf FROM registro_incidencias rI
            INNER JOIN alumnos a ON rI.idAlumno = a.idAlumno
            INNER JOIN profesores p ON rI.idProfesor = p.idProfesor
            WHERE rI.idAlumno = '$id'";

           
    $resultado = $conn->query($sql);

    if ($resultado !== false && $resultado->num_rows > 0) {
        ?>

        <table>
            <tr>
                <th>Alumno</th>
                <th>Profesor</th>
                <th>incidencia</th>
                <th>estado</th>
                <th>Eliminar</th>
            </tr>
            
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                // Acceder a los campos de cada fila
                $idRegInd = $fila["id_Reg_Ind"];
                $nomAlumno = $fila["nomAlumno"];
                $nomProf = $fila["nomProf"];
               
                $tipo_incidencia = $fila["tipo_incidencia"];
                $estado_incidencia = $fila["estado_incidencia"];
                ?>
                
                <tr>
                    <td><?php echo $nomAlumno; ?></td>
                    <td><?php echo $nomProf; ?></td>
                    <td><?php echo $tipo_incidencia; ?></td>
                    <td><?php echo $estado_incidencia; ?></td>
                    <td>
                    <form method="get" action="mostrar_Incidencias.php">
                         <input type="hidden" name="idRegInd" value="<?php echo $idRegInd; ?>">
                         <button type="submit">Eliminar</button>
                    </form>
                    </td>
                </tr>
                
                <?php
            }
            ?>
            
        </table>
        
        <?php
    } else {
        echo "No se encontraron Incidencias";
    }
    
    $conn->close();
}
?>


    </main>
   