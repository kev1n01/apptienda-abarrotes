<?php
	session_start();
	$ProductAction = $_GET["ProductAction"];
	
	use controlador\ProductoControlador;
    use config\ConexionDB;
    include_once "../config/autoloadadmin.php";

	if($ProductAction == "Add")
	{
        $idtipo = $_POST["tipo"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
        
        $controlproducto = new ProductoControlador();
        $res = $controlproducto->agregar($idtipo,$descripcion,$precio);
        
        if($res)
        {
            echo '<script>alert("Guardado correctamente")</script>';
            
            echo '<script>window.open("adminproductos.php","_self",null,true);</script>';
        }
        else
        {
            echo '<script>alert("Error al guardar!")</script>';
        }
	}else if($ProductAction == "Edit")
	{
        $idtipo = $_POST["tipo"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$ProductID = $_GET["ProductID"];

        $controlproducto = new ProductoControlador();
        $res = $controlproducto->actualizar($ProductID,$idtipo,$descripcion,$precio);
        
		if($res)
		{
            echo '<script>window.alert("Actulizado correctamente"); 
            window.open("adminproductos.php","_self",null,true)</script>';
		}else{
            
            echo '<script>alert("Error al actualizar!")</script>';
        }
	}

?>
