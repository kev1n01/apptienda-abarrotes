<?php session_start(); 
    use controlador\PedidoControlador;
    use controlador\ClienteControlador;
    use config\ConexionDB;
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

    <title>Mi Perfil</title>

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
        // $password = $_SESSION["password"];
        
        $vercliente = new ClienteControlador();
        $res = $vercliente->mostrarUser();

		foreach ($res as $Rows) {
            
			$id = $Rows[0];
			$user = $Rows[1];
			$pass = $Rows[2];
			$nombres = $Rows[4];
			$apellidos = $Rows[5];
			$dni = $Rows[6];
			$direccion = $Rows[7];
			$celular = $Rows[8];
		}
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
                <a class="navbar-brand" href="index.html">Entregas TiendaBrave</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Inicio</a></li>
					<li><a href="tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
					<?php if($usuario == null){echo '<li><a href="registro.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($usuario == null){echo '<li><a href="login.php?rol=usuario">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Salir</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
						<hr>
						<h2 class="intro-text text-center">Mi perfil   </h2>
						<hr>
					<div class="col-md-6">	
							<form role="form" action="registro.php?ActionType=Edit&Loc=MA&id=<?php echo $id; ?>" method="POST">
							<h4 style="text-align: center">Informacion de cuenta</h4>
							<div class="form-group">
							  <label for="usuario">Usuario:</label>
							  <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $user; ?>" disabled>
							</div>
							<div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="text" name="password" class="form-control" id="password" value="<?php echo $pass; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" name="nombres" class="form-control" id="nombres" value="<?php echo $nombres; ?>" disabled>
                            </div>
                                
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php echo $apellidos; ?>" disabled>						
                            </div>
                                
                            <div class="form-group">
                                <label for="dni">Dni:</label>
                                <input type="text" name="dni" class="form-control" id="dni" value="<?php echo $dni; ?>" disabled>
                            </div>
                                
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $direccion; ?>" disabled>
                            </div>
                                
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="number" name="celular" class="form-control" id="celular" value="<?php echo $celular; ?>" disabled>
                            </div>
							
							<button type="submit" class="btn btn-primary">Editar </button>
						</form>
					</div>
					
					<div class="col-md-6">	
						<h4 style="text-align: center">Mis pedidos</h4>
						<div class="table-responsive">
							<table border="5px" class="table">
								<tr style="text-align: center; color: Black; font-weight: bold;">

                                    <td>ID de Pedido</td>
                                    <td>Tipo producto</td>
                                    <td>Nombre de Producto</td>
                                    <td>Precio de Producto</td>
                                    <td>Fecha de Pedido</td>
                                    <td>Acción</td>
								</tr>
								
								<?php 
								$pedido = new PedidoControlador();
                                $resultado = $pedido->mostrarPedido($id);

								foreach ($resultado as $Rows){ 
								?>
								<tr style="color: black">
								<td><?php echo $Rows[0]; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[2]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td>
								<a href="#" onclick="cancelOrder(<?php echo $Rows[0]; ?>);">Cancelar</a>
								</td>
								<?php }?>
								</tr>
							</table>
						</div>
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
    <script src="../public/js/bootstrap.min.js"></script>
	<script>
		function cancelOrder(pedidoID)
		{
			if(confirm("¿Estas seguro de cancelar su pedido?") == true)
			{
				window.open("perfildestino.php?id="+pedidoID,"_self",null,true);
			}
		}
	</script>

</body>

</html>














