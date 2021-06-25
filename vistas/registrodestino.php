
<?php
	use controlador\ClienteControlador;
    include_once "../config/autoloadadmin.php";
 

	$ActionType = $_GET['ActionType'];
	$user = $_POST['usuario'];
	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$dni = $_POST['dni'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];
	$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
	
	if($ActionType == "Register")
	{
			$cliente = new ClienteControlador();
			$res = $cliente->registrarControl($user,$pass,$nombre,$apellido,$dni,$direccion,$celular);

			if($res)
			 {
				 echo '<script>alert("Registro Completado Por favor Ingresar"); 
				 window.open("login.php?rol=usuario","_self",null,true);</script>'; 
			}else
			{
				echo '<script>alert("Error al registrarse. Intentelo nuevamente");
				window.open("registro.php?ActionType=Register","_self",null,true);
				</script>'; 
				
			 }
		}
		
		else
		{
			if($ActionType == "Edit")
			{
				$ID = $_GET['id'];

				$cliente = new ClienteControlador();
				$res = $cliente->actualizar($ID,$user,$pass,$nombre,$apellido,$dni,$direccion,$celular);

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
















