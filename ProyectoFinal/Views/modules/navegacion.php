	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="Views/css/styles.css">
<nav>
		<ul class="nav nav-tabs justify-content-center">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="index.php?action=dependencias">Dependencias</a></li>
			<li><a href="index.php?action=procesos">Procesos</a></li>
			<li><a href="index.php?action=actas">Actas</a></li>
			<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Consultas
        		</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="index.php?action=consulta1">Consulta de procesos</a>
				<a class="dropdown-item" href="index.php?action=consulta2">Consulta vencimiento de procesos</a>
      		</li>
		</ul>
</nav>

<script>$('.dropdown').collapse("show")</script>