<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="control de deudas" />
	<title>deudoras 1.0</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link type="image/x-icon" href="image/favicon.ico" rel="icon" />
	<link type="image/x-icon" href="image/favicon.ico" rel="shortcut icon" />
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Istok+Web|Esteban|Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="fonts.css">
	<script src="prefixfree.js"></script>
</head>
<body>
	<header>
	
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-list2"></span>Menu</a>
		</div>
		<nav>
			<ul>
				<li><a href="index.php"><span class="icon-pencil"></span>INGRESAR</a></li>
				<li><a href="abono.php"><span class="icon-coin-dollar"></span>ABONAR</a></li>
				<li><a href="deudoras.php"><span class="icon-credit-card"></span>VER DEUDORAS</a></li>
				<li><a href="total.php"><span class="icon-coin-pound"></span>TOTAL</a></li>
				<li><a href="mas.php"><span class="icon-folder-plus"></span>MAS</a></li>
			</ul>
		</nav>
	</header>
	<?php
	if(!empty($_GET['msj']))
	{
	?>
		<aside>
			<?php echo "<h4>".$_GET['msj']."</h4>";?>
		</aside>
	<?php
	}
	?>
	
	<footer>
		<p>
			<strong>Control de deudoras bolsas</strong>
		</p>
		<p>
			Creado por @dcreate
		</p>
	</footer>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="menu.js"></script>
</body>
</html>