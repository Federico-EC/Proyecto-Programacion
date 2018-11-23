<h1>EDITAR ACTAS</h1>

<form method="post">
	
	<?php

	$editarAct = new MvcController();
	$editarAct -> editarActasController();
	?>

    <label>Procesos</label><br>
				<select name="idpEditar" selected="">	
					<?php
						$vistaAct = new MvcController();
			            $vistaAct -> vistaProSelectController();
					?>
	</select><br><br>


	<input type="submit" value="Actualizar">

	<?php

	$editarAct -> actualizarActasController();
	?>
	

</form>