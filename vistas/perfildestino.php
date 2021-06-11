<?php
	use controlador\PedidoControlador;
    include_once "../config/autoloadadmin.php";

	$pedidoID = $_GET["id"];
	$pedido= new PedidoControlador();
    $res= $pedido->eliminarPedidoCliente($pedidoID);

	if($res)
	{
		echo '<script>window.open("perfil.php","_self",null,true)</script>';
	}

?>