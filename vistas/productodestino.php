<?php
	session_start();
	
	use controlador\ProductoControlador;
    use config\ConexionDB;
    include_once "../config/autoloadadmin.php";
    
	$ProductAction = $_GET["ProductAction"];
    $idtipo = $_POST["tipo"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $estado = $_POST["estado"];
    $img = $_POST["img"];
    
	if($ProductAction == "Add")
	{
        
        $controlproducto = new ProductoControlador();
        $res = $controlproducto->agregar($idtipo,$descripcion,$precio,$img,$descuento,$estado);
        
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

		$ProductID = $_GET["ProductID"];
        $controlproducto = new ProductoControlador();
        $res = $controlproducto->actualizar($ProductID,$idtipo,$descripcion,$precio,$img,$descuento,$estado);
        
		if($res)
		{
            echo '<script>window.alert("Actulizado correctamente"); 
            window.open("adminproductos.php","_self",null,true)</script>';
		}else{
            
            echo '<script>alert("Error al actualizar!");
           </script>';
        }
	}

?>
