<?php
  session_start();
if (isset($_SESSION['Correo'])) {
	require 'conexion.php';
} else {
	header('Location: Login.php');
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Stray</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-escalable=1.0,maximun-scalable=1.0,minimum-scalable=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/stray.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
	
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Aclonica&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="js/jquery.hislide.js"></script>

</head>
<body>



	
	<div class="padre">
		<header class="header">
			<div class="menu">
				<div class="logo">
					<a href="index.php"><img class="imagen" src="IMGS/Logo.png"></a>
				</div>
				<div class="nombre">
					<H1 class="h1" ><a href="index.php">STRAY</a></H1>
				</div>
				<div class="login"><a href="Login.php"><button class="log">
						LOGIN
					</button></a>
					
				</div>
			</div>
		</header>
		<div class="nav">
			<nav id="barra" class="navbar navbar-expand-lg navbar-light bg-light">
			   <ul id="ul" class="nav nav-tabs">
					<li class="nav-item">
					  <a class="nav-link active" href="index.php">Stray</a>
					</li>
					<li class="nav-item">
					   <a class="nav-link " href="Gatos.php">Gatos</a>
					</li>
					<li class="nav-item">
					   <a class="nav-link" href="Perros.php">Perros</a>
					</li>
					<li class="nav-item dropdown">
					    <a class="nav-link dropdown" href="s_info.php" >Subir informacion</a> 
					</li>
					<li class="nav-item">
					   <a class="nav-link" href="cerrar.php">Cerrar sesion</a>
					</li>
					

			    </ul>
			       <div id="search">
			       		<form  class="form-inline my-2 my-lg-0" >
			      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    		</form>
			    	</div>
			</nav>
		</div>
		<div class="desplegables">
			<div class="slide hi-slide">
				<div class="hi-prev">

				</div>
				<div class="hi-next">
				</div>
				<ul>
					<li>
						<img src="IMGS/Gatos/Zeus.jpg">
					</li>
					<li>
						<img src="IMGS/Perros/alpha.jpg">
					</li>
					<li>
						<img src="IMGS/Perros/boky.jpg">
					</li>
					<li>
						<img src="IMGS/Gatos/shaka.jpeg">
					</li>
					<li>
						<img src="IMGS/Gatos/colmillo.jpg">
					</li>
					<li>
						<img src="IMGS/Gatos/krono.jpg">
					</li>
					<li>
						<img src="IMGS/Gatos/berlin.png">
					</li>
				</ul>
			</div>
		</div>
		
		<section class="cuerpo">
			<div class="comunicado">
				<H2>Últimas mascotas desaparecidas</H2>
			</div>
			<div class="fotos">
				<?php
				include 'conexion.php';
				$query= "SELECT fotografia from perdidos";
				$results=$conn -> query($query);
				while ($row=$results->fetch()) {
				?>	
				<article id="perdidos" class="perdidos"><img class="img" src="data:image/jpg;base64,<?php echo base64_encode($row['fotografia']); ?>"></article>
				<?php	# code...
				}
				?>
				
				
			</div>



			

			

		</section>
		<footer class="footer">
			<div id="menu">
				<div id="logo">
					<a href="index.php"><img class="imagen" src="IMGS/Logo.png"></a>
				</div>
				<div id="nombre">
					<h1 class="h1" ><a href="index.php">STRAY</a></h1>
				</div>
			</div>
			<hr width="100%">
			<div class="contactos">

				 <div class="contacto">
					<h2 class="h2" >Contactanos</h2>
				</div> -->
				<div class="formulario">
					<form>
						<input type="text" id="nombre_c" placeholder="Nombre">
						<input type="email" id="email_c" placeholder="Email">
						<input type="text" id ="mensaje_c" placeholder="Menjase">
						<div class="envio"><input id="envio" type="submit"  value="Enviar"></div>
					</form>
				 
				</div>
			</div>
			<div class="comentarios">
				<div>
					<h3>¿Como podemos ayudarte?</h3>
				</div>
				<div class="coment">
					<input type="text" name="sugerencias">
				</div>
				
			</div>
			

			<nav class="redes">
				
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-youtube"></a>
				<a href="#" class="fa fa-instagram"></a>
				<a href="#" class="fa fa-github"></a>
				<a href="#" class="fa fa-whatsapp"></a>
			</nav>
			
			  <div class="Copyright"> <div class="copy">© 2020 Copyright:
			    <a href="https://mdbootstrap.com/">Todos los derechos estan reservados.</a></div>
			  </div>
			  
		</footer>
	</div>

	<script >
		$('.slide').hiSlide();
	</script>

</body>
</html>

<?php




  
  $message ='';
  
  include 'conexion.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Correo = filter_var(strtolower($_POST['email_i']), FILTER_SANITIZE_STRING);
	
	$Clave = $_POST['password_i'];
	

	

  if (!empty($_POST['email_i']) && !empty($_POST['password_i'])) {
  	

	
    $records = $conn->prepare('SELECT id, Correo, Clave FROM usuarios WHERE Correo = :Correo and Clave = :Clave');
    
    $records->execute(array(
		':Correo' => $Correo, 
		':Clave' => $Clave
	));
	$results = $records->fetch();
	if ($results !== false) {
		$_SESSION['Correo'] = $Correo;
		header('Location: /STRAY');
	} else {
		$message .= '<li>Datos Incorrectos</li>';
	}
    
    
}
  }
?>
