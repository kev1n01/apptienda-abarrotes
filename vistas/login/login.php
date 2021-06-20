<?php
    // use controlador\ClienteControlador;
    // include_once "config/autoload.php";
    // include_once "controlador/ClienteControlador.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda Brave-Login</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    
    <?php
		$Username = null;
		$rol = $_GET["rol"];
		if(!empty($_SESSION["usuario"]))
		{
			$Username = $_SESSION["usuario"];
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
                <a class="navbar-brand" href="../index.html">Tienda Brave</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Inicio</a></li>
					<li><a href="tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
                    <?php if($Username == null){echo '<li><a href="registro.php?ActionType=Register">Registrarse</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
			
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php if($rol == "usuario"){echo "Ingresar";}else echo "Ingresar como administrador"; ?></h2>
                    
                    <hr>
                </div>

                <div class="col-md-6">
                <!-- LoginDestination.php?rol=>?php echo $rol; ?>-->
                
                 <form role="form" action="logindestino.php?rol=<?php echo $rol;?>" method="POST">
				 
					<div class="form-group">
                        <br>
					  <label for="usuario">Usuario:</label>
					  <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingrese su usuario" autofocus required>
					</div>
					
					<div class="form-group">
					  <label for="password">Contraseña:</label>
					  <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese su contraseña" required>
					</div>
					
					<button type="submit" class="btn btn-primary">Ingresar</button>
					
				  </form>
                
                </div>
                
            </div>
        </div>

    </div>

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
        if(confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesion") == true)
        {
            window.open("login.php?rol=admin","_self",null,true);
        }
    }

    </script>
</body>

</html>
