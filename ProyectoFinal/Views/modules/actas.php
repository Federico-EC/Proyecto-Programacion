<h1>ACTAS</h1>

    <a href="index.php?action=regActas" ><input class="btn btn-danger" type="button" value="Agregar Acta"></a><br><br>

	<table border="1">
		
		<thead>
			
			<tr class="table-danger">
				<th>Número de acta</th>
				<th>Vigencia</th>
				<th>Fecha de resolucion</th>
				<th>Proceso</th>
                <th>Acciones</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaAct = new MvcController();
            $vistaAct -> vistaActasController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>