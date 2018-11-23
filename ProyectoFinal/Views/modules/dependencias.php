

<h1>DEPENDENCIAS</h1>

    <a href="index.php?action=registro" ><input class="btn btn-danger" type="button" value="Agregar Dependencia"></a><br><br>

	<table border="1">
		
		<thead>
			
			<tr class="table-danger">
				<th>Código</th>
				<th>Nombre</th>
				<th>Sigla</th>
				<th>Tipo de dependencia</th>
				<th>Estado</th>
				<th>Pertenece</th>
                <th colspan="2">Acciones</th>

			</tr>

		</thead>
		<script type="text/javascript">
			function eliminar(){
				document.getElementById('p').innerHTML=' <tr><th colspan="2">jajaja</th></tr>';

			}

		</script>



		<tbody id="p">
			
			<?php

			$vistaDepen = new MvcController();
            $vistaDepen -> vistaDepenController();

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