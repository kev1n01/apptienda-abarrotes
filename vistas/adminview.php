<?php session_start(); 
    use controlador\PedidoControlador;
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
		if(empty($_SESSION['admin'])){echo '<script>window.open("adminview.php","_self",null,true);</script>';}
 
    ?>
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
					<li><a href="registroproducto.php?ProductAction=Add">Agregar Productos</a></li>
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
						<h2 class="intro-text text-center">Pedidos</h2>
						<hr>
						<div class="table-responsive">
							    <table border="5px" class="table">
								<tr style="text-align: center; color: Black; font-weight: bold;">
                                <td>ID de Pedido</td>
                                <td>ID de Cliente</td>
                                <td>Tipo producto</td>
                                <td>Nombre de Producto</td>
                                <td>Precio de Producto</td>
                                <td>Fecha de Pedido</td>
                                <td>Acción</td>
								</tr>

								<?php 
                                $pedido = new PedidoControlador();
                                $resultado = $pedido->mostrar();
                                
                                foreach ($resultado as $Rows){ ?>
								<tr style="color: black">
								<td><?php echo $Rows[0]; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[2]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td><?php echo $Rows[5]; ?></td>
								<td>
								<a href="#" style="margin-bottom: 5px;" class="btn btn-danger" onclick="CancelarPedido(<?php echo $Rows[0]; ?>);">Eliminar</a>
								</td>
                                <?php }?>
                            </tr>
                            </table>
						</div>
					
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
		function CancelarPedido(ID)
		{
			if(confirm("¿Estas seguro de eliminar el pedido?")==true)
			{
				window.open("pedidodelete.php?id="+ID,"",null,true);
			}
		}
	</script>

</body>

</html>
