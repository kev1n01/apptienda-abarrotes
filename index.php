<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda Brave</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
   
	
	<?php
		$Username = null;
		if(!empty($_SESSION["usuario"]))
		{
			$Username = $_SESSION["usuario"];
		}

        $ID = null;
        if (!empty($_GET['ID'])) {
            $ID = $_GET['ID'];
        }
	?>
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
                    <?php if($Username == null){echo '<li><a href="index.php">Inicio</a></li>';}else{ echo '<li><a href="index.php?ID=<?php echo $ID?>">Inicio</a></li>';}?>
                    <?php if($Username == null){echo '<li><a href="vistas/tienda.php">Tienda</a></li>';}else{ echo '<li><a href="vistas/tienda.php?ID='.$ID.'">Tienda</a></li>';}?>
                    <?php if($Username == null){echo '<li><a href="vistas/nosotros.php">Nosotros</a></li>';}else{ echo '<li><a href="vistas/nosotros.php?ID='.$ID.'">Nosotros</a></li>';}?>
                    <?php if($Username == null){echo " ";}else{ echo '<li><a href="vistas/perfil.php?ID='.$ID.'">Mi perfil</a></li>';}?>
					<?php if($Username != null){echo " ";}else{echo '<li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>';}?>
					<?php if($Username == null){echo '<li><a href="vistas/registro.php?ActionType=Register">Registrarse</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="vistas/login.php?rol=usuario">Ingresar</a></li>';} else {echo '<li><a href="vistas/Logout.php">Salir</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navegador-->

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/slide-4.jpg" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
				
        <div class="nav categoria">
			<h2 >Productos Nuevos</h2>
					<ul class="nav navbar-nav">
                        <li><a  href="vistas/categorias/arroz.php">Arroz</a></li>
                        <li><a  href="vistas/categorias/aceite.php">aceite</a></li>
                        <li><a  href="vistas/categorias/azucar.php">azucar y endulzante</a></li>
                        <li><a  href="vistas/categorias/fideos.php">fideos y pastas</a></li>
                        <li><a  href="vistas/categorias/conservas.php">conservas</a></li>
                        <li><a  href="vistas/categorias/menestras.php">menestras</a></li>
                        <li><a  href="vistas/categorias/galletas.php">galletas y golosinas</a></li>
                        <li><a  href="vistas/categorias/chocolateria.php">chocolateria</a></li>
                        <li><a  href="vistas/categorias/snacks.php">snacks y piqueos</a></li>
                        <li><a  href="vistas/categorias/salsas.php">salsas y condimentos</a></li>
					</ul>
        </div>
				
	
		
		<?php 
        use controlador\indexControlador;
        include_once "config/autoload.php";
        $ProductoN = new indexControlador();
        $resultado = $ProductoN->mostrar();
        
        // while($Rows = mysqli_fetch_array($resultado)){
        foreach ($resultado as $Rows){?>
            	   
            <div class="col-sm-4 col-lg-3 col-md-4">
                <div class="thumbnail">
                    <?php echo $Username;?>
                    <h4 style="text-align: center;"><?php echo $Rows[1];?></h4>
                    <center><span class="sale">- <?php echo $Rows[5];?>%</span>
                    <span class="new"><?php echo $Rows[6];?></span>
                    </center>
                    <img style="border: 2px solid gray; border-radius: 10px; height: 320px; width: 298px;" src="img/<?php echo$Rows[4];?>" alt="">
                    <div class="caption">
                        <center>
                        <p><strong><h4><?php echo $Rows[2];?></h4></strong> </p>
                        <strong class="product-price">S/.<?php if ($Rows[7]==null){$precio = $Rows[3]; echo $Rows[3];}else{ $precio = $Rows[7]; echo $Rows[7];}?></strong> 
                        <del class="product-old-price"><?php if($Rows[5]==null){echo "   ";}else{$precio = $Rows[3]; echo "S/.".$Rows[3];}?></del>
                        
                        <form action="vistas/carrito.php?" method="post">
                            <input type="text"  name="cantidad" id="cantidad" placeholder = "Cantidad" value="1">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $precio; ?>">
                            <input type="hidden" name="productID" id="productID" value="<?php echo $Rows[0]; ?>">
                            <input type="submit" class="btn btn-primary" value="Agregar al carrito">
                        </form>
                        <!-- <option style="width:70px;" type="number" name="cantidad" id="cantidad" value="1"> -->
                        </center>
                    </div>
                    <!-- <center><a onclick="addToCartOnclick(<?php echo $Rows[0];?>,<?php echo $precio?>);"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar al Carrito</a></center> -->
                 </div>
             </div>
        
        <?php }?>
		
	</div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
					<?php echo '<strong>'.$Username.'</strong>'; ?>
					<br>
					<strong>
					<?php if($Username != null){echo '<a href="vistas/perfil.php?">Perfil</a> |';} ?> 
					<?php if($Username == null){echo '<a href="vistas/login.php?rol=usuario">Ingresar</a>';} else {echo '<a href="vistas/Logout.php">Salir</a>';} ?> | 
					<a href="#">Volver al inicio</a>
					</strong><br>
					Copyright &copy; TiendaBrave
					</p>
					
                </div>
            </div>
        </div>
    </footer>

    <script src="public/js/jquery.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script>
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		})
		
	
		
		function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página") == true)
			{
				window.open("vistas/login.php?rol=admin","_self",null,true);
			}
		}

		function addToCartOnclick(ProductID,Precio)
		{	   

			if(confirm("Estas seguro que deseas agregar este producto al carrito") == true){
			    window.open("vistas/carrito.php?ProductID="+ProductID+"&Precio="+Precio,"_self",null,true);
			}
		}
    </script>
</body>

</html>
