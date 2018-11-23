<h1>PROCESOS</h1>

    <a href="index.php?action=regProceso" ><input class="btn btn-danger" type="button" value="Agregar Proceso"></a><br><br>

	<table border="1">
		
		<thead>
			
			<tr class="table-danger">
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo de proceso</th>
				<th>Dependencia</th>
                <th>Acciones</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaProceso = new MvcController();
            $vistaProceso -> vistaProcesosController();

			?>

		</tbody>

	</table>


