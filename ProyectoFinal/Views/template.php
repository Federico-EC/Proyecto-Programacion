<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Template</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Views/css/styles.css">
</head>
<body>
	<!--<header>
	<h1 class="titleP">Procesos de Calidad</h1>
	</header>-->
	<?php 
	    include "modules/navegacion.php";
	?>
	

	<section>
		<?php 
			$mvc = new MvcController();
			$mvc -> enlacesPaginasController();
		?>
		
	</section>
</body>
</html>