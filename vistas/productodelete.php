<?php
    use controlador\ProductoControlador;
    use config\ConexionDB;
    include_once "../config/autoloadadmin.php";

    $ID = $_GET["ProdID"];
	$controlproducto = new ProductoControlador();
    $res = $controlproducto->eliminar($ID);

	if($res){
        echo '<script>alert("No fue posible eliminar el producto")</script>';
	}else{
        echo '<script>alert("Producto eliminado satisfactoriamente")</script>';
		echo '<script>window.open("adminproductos.php","_self",null,true);</script>';
    }
    
?>