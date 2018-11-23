<h1>CONSULTA DE VENCIMIENTO DE PROCESOS</h1>

<form method="post">
	
	 <script type="text/javascript">
	 	function mostrar(){
	 		
		document.getElementById('procon').innerHTML='<option value="0">Autoevaluación</option>';
	 	
	 	}

	 	
	 </script>
	
	<label>Tipo de Dependencia: </label><br>
    <select onchange="mostrar()" name="tipoDepConsulta" require>
			<option value="0">Academica</option>
			<option value="1">Administrativa</option>
	</select><br><br>

		

	<label>Tipo de Proceso: </label><br>
    <select id="procon" name="proConsulta" require>
    	<option value="0">Autoevaluación</option>
    	<option value="1">Registro Calificado</option>
    	<option value="2">Acreditación</option>
    		
	</select><br><br>

	<label>Rango de consulta en meses </label><br>
    <select id="mes" name="mesConsulta" require>
    	<option value="10">10</option>
    	<option value="12">12</option>
    	<option value="18">18</option>
    	<option value="24">24</option>
        		
	</select><br><br>

	
	<input class="btn btn-danger" type="submit" value="Enviar">

</form>
<table border="1" id="tb">
		
			<?php

			$consulta1 = new MvcController();
			$consulta1 -> consulta2Controller();
			?>
</table>
<br><br><br>