
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
              <a class="nav-link active" aria-current="page" href="#">VISTA</a>
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

include 'seccionLista.php';

?>
    </main> 
    
    <!-- End Example Code -->
  </body>
</html>