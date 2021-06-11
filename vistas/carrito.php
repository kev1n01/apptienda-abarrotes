<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pedido</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" 
	rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" 
	rel="stylesheet" type="text/css">
	<style>
		#pdetails span{
			float: right;
		}
	</style>
</head>

<body>

<div class="brand">Entregas Tienda Brave</div>
    <div class="address-bar"><strong>Productos de calidad </strong>directo a tus manos</div>
    <!-- navegador -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Entregas ConfiguroWeb</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Inicio</a></li>
					<!-- <li><a href="vistas/.php">Productos más Populares</a></li> -->
					<li><a href="tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="perfil.php">Mi perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>
	
	<?php
		$USER = $_SESSION['usuario'];
		$PASS = $_SESSION['password'];
		$ProductID = $_GET['ProductID'];
		// $cant = $_GET["Cant"];
        $precio = $_GET["Precio"];

		if(empty($USER)){echo '<script>window.open("login.php?rol=usuario","_self",null,true);</script>';}
       
        use clases\Cliente;
        use controlador\ClienteControlador;

        include_once "../config/autoloadadmin.php";
		$cliente = new ClienteControlador();
        $ClienteID = $cliente->mostrarIdUser($USER,$PASS);
        
	?>


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Pedido</h2>
                    <hr><br>
                </div>

                <div class="col-md-6">
                 <form role="form" action="carritoDestino.php?ProductID=<?php echo $ProductID; ?>&ClienteID=<?php echo $ClienteID; ?>" method="POST">
					<div class="form-group">
					  <label for="ClienteID">Cliente ID:</label>
					  <input type="text" name="ClienteID" class="form-control" id="ClienteID" value="<?php echo $ClienteID; ?>" disabled>
					</div>

					<div class="form-group">
					  <label for="ProductID">Product ID:</label>
					  <input type="text" name="ProductID" class="form-control" id="ProductID" value="<?php echo $ProductID; ?>" disabled>
					</div>
					
                    <div class="form-group">
						<label for="cantidad">Cantidad:</label>
						<input type="text" name="cantidad" class="form-control" id="cantidad">
					</div>
					
                    <div class="form-group">
						<label for="precioT">Precio Total:</label>
						<input type="text" name="precioT" class="form-control" id="precioT" value="<?php ?>">
					</div>
						<button type="submit" style="float: right;" class="btn btn-success">Realizar compra</button>
					</form>
				</div>
                
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Tienda Brave</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.min.js"></script>

</body>

</html>
