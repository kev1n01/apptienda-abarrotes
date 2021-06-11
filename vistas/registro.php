<?php 
	session_start(); 
	$ActionType = $_GET['ActionType'];
    
	if($ActionType == "Edit"){
		$ID = $_GET['id'];
		$Loc = $_GET['Loc'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if($ActionType == "Register"){echo "Registrar una cuenta";}else echo "Editar información de cuenta"; ?></title>

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

    <div class="brand">Entregas TiendaBrave</div>
    <div class="address-bar"><strong>Productos de calidad </strong>directo a tus manos</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Tienda Brave</a> -->
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Inicio</a></li>
					<li><a href="tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Administrador</a></li><?php if($usuario == null){echo '<li><a href="registro.php?ActionType=Register">Registrarse</a></li>';} ?>
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
						<h2 class="intro-text text-center"><?php if($ActionType == "Register"){echo "Registro";}else echo "Edita la Información de tu Cuenta"; ?></h2>
						<hr>
					<div class="col-md-6">	
						<form role="form" action="registrodestino.php?ActionType=<?php echo $ActionType; if($ActionType == "Edit"){ echo "&Loc=" . $Loc . "&id=" .$ID;} ?>" method="POST">
							
                            <!-- <div class="form-group">
                                <label for="id">ID cliente:</label>
                                <input type="text" name="id" class="form-control" id="id" placeholder="Ingresa id cliente" autofocus required>
                            </div> -->
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingresa tu usuario"  autofocus required>
                            </div>
                                
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="Password" name="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
                            </div>

                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingresa tus nombres" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" required>						
                            </div>
                                
                            <div class="form-group">
                                <label for="dni">Dni:</label>
                                <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingresa tu numero de DNI" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingresa tu dirección" required>
                            </div>
                                
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="text" name="celular" class="form-control" id="celular" placeholder="Ingresa tu numero celular" required>
                            </div>
                                
                            <button type="submit" class="btn btn-primary">Enviar</button><br><br>
					    </form>
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
    function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página.") == true)
			{
				window.open("login.php?rol=admin","_self",null,true);
			}
		}
    </script> 
</body>

</html>
