<?php
	session_start();
    use clases\Pedido;
    use controlador\PedidoControlador;
    include_once "../config/autoloadadmin.php";
        if (!empty($_POST)) {
            $cant = $_POST["cantidad"];
            $ProductID = $_POST["ProductID"];
            $ClienteID = $_POST["ClienteID"];
            $preciototal= $_POST["precioT"];
        }

	date_default_timezone_set("america/lima");
    $fecha = date("Y-m-d");
	
    ///////////////////////////////
	if($_SESSION['usuario'] == null || $_SESSION['password'] == null)
	{
		echo "<script>window.open('login.php?rol=usuario','_self',null,true); 
				window.alert('Por favor inicie sesión para procesar tu pedido');</script>";
    }else {
        # code...

    

	$pedido = new PedidoControlador();
    $res = $pedido->guardarPedido($ClienteID,$ProductID,$fecha,$cant, $preciototal);
	if($res!=0){
        
		echo "<script>window.alert('Pedido registrado exitosamente');
             window.open('perfil.php?ID=$ClienteID','_self',null,true);</script>";
	}else{
        // echo "<script>window.alert('Pedido no sé pudo registrar');
        // window.open('perfil.php?ID=$ClienteID','_self',null,true);</script>";
        echo $fecha;
        var_dump($res); 
    }   
}
?>