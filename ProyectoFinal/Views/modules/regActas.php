<h1>REGISTRO DE ACTAS</h1>

<form method="post">
	
	<input type="text" placeholder="Numero de acta" name="numeroRegistro" required><br><br>

	<label>Vigencia</label>
	<select name="vigenciaRegistro" require>
						<option value="1" selected>1 año</option>
						<option value="2">2 años</option>
						<option value="3">3 años</option>
						<option value="4">4 años</option>
						<option value="5">5 años</option>
	</select><br><br>

	

	<label>Fecha Resolucion</label>
	<input type="date" name="fResolRegistro"><br><br>

	<label>Proceso al que pertenece</label><br>
	<select name="idProcRegistro" selected="">	
		<?php

			$vistaPro = new MvcController();
            $vistaPro -> vistaProSelectController();
		?>
	</select><br><br>

	
	<input class="btn btn-danger" type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroActasController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>