<h1>REGISTRO DE DEPENDENCIAS</h1>

<form method="post">
	
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>

	<input type="text" placeholder="Siglas" name="siglasRegistro" required>

	

	<label>Tipo de Dependencia: </label><br>
    <select onchange="cam()" name="tipoRegistro" require>
			<option value="0">Academica</option>
			<option value="1">Administrativa</option>
			
	</select><br><br>

	<label>Estado Dependencia: </label><br>
    <select name="activoRegistro" require>
			<option value="1" selected>Activo</option>
			<option value="0">Inactivo</option>
	</select><br><br>

	<label>¿Pertenece a alguna dependencia?</label>
	 

	 <script type="text/javascript">
	 	var a="0";
	 	function cam(){
	 		a="1";
	 	}

	 	function mostrar(){
	 		
	 		if(a=="0"){
	 			document.getElementById('dRegistro').innerHTML='<?php

			$vistaDep = new MvcController();
            $vistaDep -> vistaDepenAdminSelectController("0");
			?>';
			document.getElementById('no').innerHTML="Seleccione la dependencia"


	 		}else{

	 		document.getElementById('dRegistro').innerHTML='<?php

			$vistaDep = new MvcController();
            $vistaDep -> vistaDepenAdminSelectController("1");
			?>';
			document.getElementById('no').innerHTML="Seleccione la dependencia"
	 	}


	 	}
	 </script>
	
	
	 <select onchange="mostrar()" name="dRegistro">
	 	<option  value="1">NO</option>
	 	<option  value="">Si</option>
	  </select>

	<label id="no"></label>

	
	<select id="dRegistro" name="depRegistro" ></select><br><br>

	<input class="btn btn-danger" type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroDependenciaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "camb"){

		echo "Registro Exitoso";
	
	}

}

?>
