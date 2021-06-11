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

    <title>Administrador</title>

    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

	<?php
		$usuario = null;
		if(!empty($_SESSION["usuario"]))
		{$usuario = $_SESSION["usuario"];}
		$ProductAction = $_GET["ProductAction"];
		// if(empty($_SESSION['Admin'])){echo '<script>window.open("registroproducto.php","_self",null,true);</script>';}
	?>
    <style>
.center {
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
    </style>
</head>

<body>

    <div class="brand">Entregas Tienda Brave</div>
    <div class="address-bar"><strong>Productos de calidad</strong> directo a tus manos</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">Tienda Brave</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li><a href="adminview.php">Órdenes</a></li>
					<li><a href="registroproducto.php?ProductAction=add">Agregar Productos</a></li>
					<li><a href="adminproductos.php">Lista de Productos</a></li>
                    <li><a href="admincliente.php">Clientes</a></li>
                    <?php if($_SESSION['admin'] != null){echo '<li><a href="Logout.php">Salir</a>';}?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Agregar Producto</h2>
						<hr>
                        <center>
                    <div class="center">
					<div class="col-md-8">
							<form role="form" action="productodestino.php?ProductAction=
                            <?php echo $ProductAction; if($ProductAction=="Edit"){ echo "&ProductID=" . $_GET['ProdID'];} ?>" 
							method="POST" class="form" enctype = "multipart/form-data">
							
							<!-- <div class="form-group">
							  <label for="id">ID de producto:</label>
							  <input type="text" name="id" class="form-control" id="id" placeholder="Ingresa id producto" required>
							</div> -->
							
							<div class="form-group">
							  <label for="tipo">ID Tipo de producto:</label>
							  <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Ingresa id tipo producto" required>
							</div>
							
							<div class="form-group">
							  <label for="descripcion">Descripcion de Producto:</label>
							  <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Ingresa descripcion de producto" required>
							</div>

							<div class="form-group">
							  <label for="precio">Precio del Producto:</label>
							  <input type="text" name="precio" class="form-control" id="precio" placeholder="Ingrese el precio del producto" required>
							</div>
						
							<!-- <div class="form-group">
								<label for="img">Imagen de Producto:</label>
								<input type="file" class="btn btn-default"  name="img">
							</div> -->
							
							<div class="form-group">
							<button type="submit" style="float: right;" class="btn btn-primary">Agregar</button>
							</div>
						</form>
                    </div>
                    </div>
                        </center>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; TiendaBrave</p>
                </div>
            </div>
        </div>
    </footer>	

    <script src="../public/js/jquery.js"></script>
    <script src="../publicjs/bootstrap.min.js"></script>
	<script>
	
		
	</script>

</body>

</html>
