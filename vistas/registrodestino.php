
<?php
	use controlador\ClienteControlador;
	use config\ConexionDB;
    include_once "../config/autoloadadmin.php";
    include_once "../config/autoload.php";

	$ActionType = $_GET['ActionType'];
	// $rol = $_GET['rol'];
	$ID = $_GET['id'];
	$user = $_POST['usuario'];
	$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];
	

		if($ActionType == "Register")
		{
			$cliente = new ClienteControlador;
			$res = $cliente->registrarControl($user,$pass,$nombre,$apellido,$dni,$direccion,$celular);
			
			if($res != "save")
			 {
				 echo '<script>alert("Error al registrarse");
				 		window.open("registro.php?ActionType=Register","_self",null,true);</script>'; 
			 }else
			 {
				 echo '<script>alert("Registro Completado Por favor Ingresar"); 
				 		window.open("login.php?rol=usuario","_self",null,true);</script>'; 
			 }
		}
		
		else
		{
			if($ActionType == "Edit")
			{
				
				$cliente = new ClienteControlador;
				$res = $cliente->actualizar($ID);

				if(!$res)
				{
					echo '<script>window.alert("Error al actulizar");
					window.open("registro.php?ActionType=Edit","_self",null,true);</script>';}
			}else{	
				$Location = $_GET['Loc'];
				if($Location == "MA"){
				echo '<script>window.open("Perfil.php","_self",null,true);</script>';}
				else if($Location == "MC"){
				echo '<script>window.open("admincliente.php","_self",null,true);</script>';}
			}
		}	
			
?>
















