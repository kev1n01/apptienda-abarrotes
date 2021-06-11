<?php
	session_start();
	use controlador\LoginControlador;
	use config\ConexionDB;
    include_once "../config/autoloadadmin.php";
 
	$user = trim($_POST['usuario']);
	$pass = trim($_POST['password']);
	$rol = $_GET['rol'];
	$cliente = new LoginControlador();
	echo $cliente->logincontrol($user,$pass,$rol);

?>
















