<h1>REGISTRO DE PROCESOS</h1>

<form method="post">
	
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>

	<script type="text/javascript">
		function mostrar(){
	 		document.getElementById('dRegistro').innerHTML='<?php

			$vista = new MvcController();
            $vista -> vistaDepenAdminSelectController("0");
		?>';
		
			document.getElementById('fechas').innerHTML='<input type="date" name="autoRegistro" style="display:none"> <input type="date" name="proxAutoRegistro" style="display:none">';

		}

	</script>

	<label>Tipo de Proceso: </label><br>
    <select name="tipoRegistro" onchange="mostrar()" require>
			<option value="0" selected>Autoevaluación</option>
			<option value="1">Registro Calificado</option>
			<option value="2">Acreditación</option>
	</select><br><br>
	<div id="fechas">
		<label>Fecha Auto Evaluación</label>
		<input type="date" name="autoRegistro" required >

		<label>Fecha Proxima AutoEvaluacion</label>
		<input type="date" name="proxAutoRegistro" required>

	</div>

	<label>Dependencia a la que pertenece</label>
	<select id="dRegistro" name="depRegistro" selected="">	
		<?php

			$vistaDep = new MvcController();
            $vistaDep -> vistaDepenSelectController();
		?>
	</select><br><br>

		
	<input class="btn btn-danger" type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroProcesoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
