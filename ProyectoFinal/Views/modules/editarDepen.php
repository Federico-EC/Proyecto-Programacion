

<h1>EDITAR DEPENDENCIA</h1>

<form method="post">
	
	<?php

	$editarDepen = new MvcController();
	$editarDepen -> editarDepenController();
	?>

		<script type="text/javascript">
		
	
	 </script>

	<label>Tipo de Dependencia: </label><br>
	<select  name="tipoEditar" >
		<option value="0">Academica</option>
		<option value="1">Administrativa</option>		
	</select><br><br>

	<label>Estado Dependencia: </label><br>
	<select name="activoEditar" >
		<option value="1">Activo</option>
		<option value="0">Inactivo</option>
	</select><br><br>


	
	<label id="noa">Pertenece a otra dependencia</label>

	 <select  name="dRegistro">
	 	<option  value="1">NO</option>
	 	<option  value="0">Si</option>
	  </select><br>

	<label id="noa"> ¿Cual?</label>
	<select id="dRegistroa" name="depenEditar" >
		<?php

				$vistaDep = new MvcController();
	            $vistaDep -> vistaDepenSelectController();
				?>
	</select><br><br>


	<input type="submit" value="Actualizar">
	<?php

	$editarDepen -> actualizarDepenController();
	
	?>
	
</form>