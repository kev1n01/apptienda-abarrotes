<?php session_start(); 
    use controlador\ProductoControlador;
    include_once "../config/autoloadadmin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda Brave</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
   
	
	<?php
		$usuario = null;
		if(!empty($_SESSION["usuario"]))
		{
			$usuario = $_SESSION["usuario"];
		}
	?>
</head>

<body>
    <div class="brand">Entregas Tienda Brave</div>
    <div class="address-bar"><strong>Productos de calidad </strong>directo a tus manos</div>
    <!-- navegador -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Entregas ConfiguroWeb</a>
            </div> -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li><a href="../index.php">Inicio</a></li>
					<li><a href="tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
					<li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
					<?php if($usuario == null){echo '<li><a href="registro.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($usuario == null){echo '<li><a href="login.php?rol=usuario">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Salir</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navegador-->

    <div class="container">
	
		<?php 
        
        $ProductoN = new ProductoControlador();
        $resultado = $ProductoN->mostrarMasVendido();
        
        // while($Rows = mysqli_fetch_array($resultado)){
        foreach ($resultado as $Rows) {
            echo '	
            <div class="col-sm-3 col-lg-3 col-md-3">
            <div class="thumbnail">
            <h5 style="text-align: center;">'.$Rows[1].'</h5>
            <img style="border: 2px solid gray; border-radius: 10px; height: 300px; width: 310px;" src="../img/'.$Rows[4].'" alt="">
            <div class="caption">
                    <center>
                    <p><strong><h4>'.$Rows[2].'</h4></strong> </p>
					<p><strong><h3> S/.'.$Rows[3].'</h3></strong><del>'.$Rows[3].'</del></p>
					</center>
                </div>
				<center><a onclick="addToCartOnclick('.$Rows[0].');"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar al Carrito</a></center>
              </div>
             </div>
		';
		}?>
		
	</div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
					<?php echo '<strong>'.$usuario.'</strong>'; ?>
					<br>
					<strong>
					<?php if($usuario != null){echo '<a href="perfil.php?rol=usuario">Mi Perfil</a> |';} ?> 
					<?php if($usuario == null){echo '<a href="login.php?rol=usuario">Ingresar</a>';} else {echo '<a href="Logout.php">Salir</a>';} ?> | 
					<a href="#">Volver al inicio</a>
					</strong><br>
					Copyright &copy; TiendaBrave
					</p>
					
                </div>
            </div>
        </div>
    </footer>

    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script>

		// $('#reg').click(function(){
		// 	window.open('vistas/registrar.php',_self);
		// });
		
		function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página.") == true)
			{
				window.open("login.php?rol=admin","_self",null,true);
			}
		}
		
		function addToCartOnclick(ProductID)
		{	
			if(confirm("Estas seguro que deseas agregar este producto al carrito") == true){
			window.open("vistas/carrito.php?ProductID="+ProductID,"_self",null,true);
			}
		}
    </script>
</body>

</html>
