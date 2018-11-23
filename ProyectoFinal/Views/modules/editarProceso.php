
<h1>EDITAR PROCESO</h1>

<form method="post">
	
	<?php

	$editarProceso = new MvcController();
	$editarProceso -> editarProcesoController();
	
	?>


		<label>Tipo de Proceso: </label><br>
		<select  name="tipoEditar" require>
			<option value="0">Autoevaluación</option>
			<option value="1">Registro Calificado</option>
			<option value="2">Acreditación</option>
		</select><br><br>

	<div id="fechas">	
		<label>Fecha Auto Evaluación</label>
		<input type="date" name="autoEditar" >

		<label>Fecha Proxima AutoEvaluacion</label>
		<input type="date" name="pautEditar" >
	</div>

	
		<label>Dependencia a la que pertenece</label>
		<select id="dRegistro" name="depEditar" selected="">	
					<?php

						$vistaDep = new MvcController();
			            $vistaDep -> vistaDepenSelectController();
					?>
		</select><br><br>

	
			<input type="submit" value="Actualizar">

<?php
	$editarProceso -> actualizarProcesoController();
?>
	

</form>
