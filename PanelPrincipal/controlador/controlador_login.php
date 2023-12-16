<?php 
session_start();
if (!empty($_POST["btningresar"])){
	if (!empty($_POST['usuario']) and !empty($_POST['password'])) {
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		echo $usuario;
		echo $password;
		$sql  = $conn->query("select * from profesores where usuario = '$usuario' and contrasena = '$password'");
		// SI EL USUARIO EXISTE 
		if ($datos = $sql->fetch_object()) {
			$_SESSION['id'] = $datos->idProfesor;
			$_SESSION['nombre'] = $datos->nomProf;
			$_SESSION['apellido'] = $datos->apellProf;

		header("location: vista.php");
		} else {
			echo "<div class='alert alert-danger' >Acceso denegado</div>";
		}
		
	}else{
		echo "Campos vacios";
	}
} 


 ?>
