<?php
    use controlador\PedidoControlador;
    use config\ConexionDB;
    include_once "../config/autoloadadmin.php";

    $ID = $_GET["id"];
	$controlpedido = new PedidoControlador();
    $res = $controlpedido->eliminar($ID);

    if($res!=0){
        echo '<script>alert("Pedido eliminado satisfactoriamente");
                window.open("adminview.php","_self",null,true);</script>';
	}else{
        echo '<script>alert("No fue posible eliminar el pedido");
                window.open("adminview.php,"_self",null,true)</script>';
    }
    
?>