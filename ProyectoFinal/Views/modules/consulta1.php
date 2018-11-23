<h1>CONSULTA DE PROCESOS</h1>

<form method="post">
	
	 <script type="text/javascript">
	 	function mostrar(){
	 		document.getElementById('dRegistro').innerHTML='<?php

			$vistaDep = new MvcController();
            $vistaDep -> vistaDepenAdminSelectController("1");
		?>';
		
		document.getElementById('procon').innerHTML='<option value="0">Autoevaluación</option>';
	 	
	 	}

	 	function pros(){
	 		document.getElementById('proConsulta').innerHTML='<option value="0">Autoevaluación</option>';

	 	}
	 </script>
	
	<label>Tipo de Dependencia: </label><br>
    <select onchange="mostrar()" name="tipoDepConsulta" require>
			<option value="0">Academica</option>
			<option value="1">Administrativa</option>
	</select><br><br>

		
	<label>	Seleccione la dependencia</label><br>		
	<select id="dRegistro" name="depConsulta" >
		<?php
			$vistaDep = new MvcController();
            $vistaDep -> vistaDepenAdminSelectController("0");
		?>
		</select><br><br>

	<label>Tipo de Proceso: </label><br>
    <select id="procon" name="proConsulta" require>
    	<option value="0">Autoevaluación</option>
    	<option value="1">Registro Calificado</option>
    	<option value="2">Acreditación</option>
    		
	</select><br><br>

	
	<input class="btn btn-danger" type="submit" value="Enviar">

</form>
<table border="1" id="tb">
		
			<?php

			$consulta1 = new MvcController();
			$consulta1 -> consulta1Controller();
			?>
</table>
<br><br><br>