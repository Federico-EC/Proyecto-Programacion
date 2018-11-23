<?php 
	class MvcController{

		#llamada a la plantilla
		#------------------------

		public function plantilla(){

			include "Views/template.php";

		}

		#Enlaces
		#------------------------
		public function enlacesPaginasController(){

			if (isset($_GET["action"])) {
				$enlacesController = $_GET["action"];
			}
			else{

				$enlacesController = "index";
			}

			$respuesta = Paginas::enlacesPaginasModel($enlacesController);

			include $respuesta;
		}

		#REGISTRO DE DEPENDENCIAS
		#------------------------------------
		public function registroDependenciaController(){

		if(isset($_POST["nombreRegistro"])){
			if($_POST["dRegistro"]=="1"){
				$datosController = array( 
									  "nom"=>$_POST["nombreRegistro"],
									  "sig"=>$_POST["siglasRegistro"],
									  "tip"=>$_POST["tipoRegistro"],
									  "act"=>$_POST["activoRegistro"]);
				$respuesta = Datos::registroDependenciaModel($datosController, "dependencia");
			}else{

			$datosController = array( 
									  "nom"=>$_POST["nombreRegistro"],
									  "sig"=>$_POST["siglasRegistro"],
									  "tip"=>$_POST["tipoRegistro"],
									  "act"=>$_POST["activoRegistro"],
									  "dep"=>$_POST["depRegistro"]);
			$respuesta = Datos::registroDependenciaModel($datosController, "dependencia");

			}
			if($respuesta == "success"){

				echo "Registro Exitoso";

				
			}

			else{

				header("location:index.php");
			}

		}

	}

		#VISTA DE DEPENDENCIAS
		#------------------------------------

	//mostrar todas las depenedencias en un select
		public function vistaDepenSelectController(){
			$respuesta = Datos::vistaDepenModel("dependencia");
			$a="";

			
			foreach($respuesta as $row => $item){
				$c=$item["codigo"];
				$n=$item["nombre"];

				
			echo'<option value='.$c.'>'.$n.'</option>';
			

			}

		}



	//Mostrar solo dependencias administrativas en un select
		public function vistaDepenAdminSelectController($adm){
			$respuesta = Datos::vistaDepenAdminSelectModel("dependencia",$adm);
			
			foreach($respuesta as $row => $item){
				$c=$item["codigo"];
				$n=$item["nombre"];

				
			echo'<option value='.$c.'>'.$n.'</option>';
			

			}

		}



//ELIMINAR DEP___
	public function eliminarDepController($dep){
				
		$respuesta = Datos::eliminarDepModel($dep, "dependencia");

		}





		public function vistaDepenController(){

			$respuesta = Datos::vistaDepenModel("dependencia");

			
			#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

			foreach($respuesta as $row => $item){
				$nomDep=0;

				if ($item["tipo_depen"]=="1"){
					$tip="Administrativa";

				}else{
					$tip="Academica";
				}


				if($item["activo"]=="1"){
					$a="activo";

				}else{
					$a="inactivo";
				}
				$d=$item["id_depen_perten"];


				$dep=Datos::vistaDepenPertenModel("dependencia",$d);

				foreach($dep as $row => $ite){
					$nomDep=$ite["nombre"];
				}

				if ($d=="") {
					$nomDep="Ninguna";
					
				}
				

			echo'<tr >
					<td>'.$item["codigo"].'</td>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["sigla"].'</td>
					<td>'.$tip.'</td>
					<td>'.$a.'</td>
					<td>'.$nomDep.'</td>
					<td><a href="index.php?action=editarDepen&codigo='.$item["codigo"].'"><button class="btn btn-danger">Editar</button></a> </td>	
					</tr>';
					

			}

		}

		#EDITAR DEPENDENCIA
		#------------------------------------

		public function editarDepenController(){

			$datosController = $_GET["codigo"];
			$respuesta = Datos::editarDepenModel($datosController, "dependencia");

			echo'<input type="hidden" value="'.$respuesta["codigo"].'" name="codEditar">
				<label>Nombre Dependencia: </label><br><br>
				<input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required><br><br>

				<label>Sigla Dependencia: </label><br><br>
				<input type="text" value="'.$respuesta["sigla"].'" name="siglaEditar" required><br><br>';

		}

		#ACTUALIZAR DEPENDENCIA
		#------------------------------------
		public function actualizarDepenController(){



			if(isset($_POST["nombreEditar"])){
				$a="0";
				if($_POST["dRegistro"]=="1"){
					$a="1";
							$datosController = array( "codigo"=>$_POST["codEditar"],
										"nombre"=>$_POST["nombreEditar"],
										"sigla"=>$_POST["siglaEditar"],
										"tipo_depen"=>$_POST["tipoEditar"],
										"activo"=>$_POST["activoEditar"],
										"depen"=>$_POST["dRegistro"]);
				
				
				$respuesta = Datos::actualizarDepenModel($datosController, "dependencia",$a);

				if($respuesta == "success"){

					header("location:index.php?action=cambio");

				}

				else{

					echo "error";

				}

				}else{

					$datosController = array( "codigo"=>$_POST["codEditar"],
										"nombre"=>$_POST["nombreEditar"],
										"sigla"=>$_POST["siglaEditar"],
										"tipo_depen"=>$_POST["tipoEditar"],
										"activo"=>$_POST["activoEditar"],
										 "depen"=>$_POST["depenEditar"]);
				
				
				$respuesta = Datos::actualizarDepenModel($datosController, "dependencia",$a);

				if($respuesta == "success"){

					header("location:index.php?action=cambio");

				}

				else{

					echo "error";

				}



				}

				

//
			}
		
		}

#------------------------------------------------------------------------------------
#_____________________________________ACTAS_______________________________________
#------------------------------------------------------------------------------------
public function registroActasController(){

	if(isset($_POST["numeroRegistro"])){
		$datosController = array( 
								"num"=>$_POST["numeroRegistro"],
								"vig"=>$_POST["vigenciaRegistro"],
								"fre"=>$_POST["fResolRegistro"],
								"idp"=>$_POST["idProcRegistro"]);
	$respuesta = Datos::registroActasModel($datosController, "acta");

		
		if($respuesta == "success"){
			echo "Registro Exitoso";			
		}
		else{
			header("location:index.php");
		}

	}

}

//mostrar todos las actas --actas.php
public function vistaActasController(){

	$respuesta = Datos::vistaActasModel("acta");

				
	foreach($respuesta as $row => $item){
		

		$d=$item["id_proceso"];
		$pro=Datos::vistaProceModel("proceso",$d);

		foreach($pro as $row => $ite){
			$nomPro=$ite["nom_proceso"];
		}
	
	echo'<tr>
			<td>'.$item["num_acta"].'</td>
			<td>'.$item["vigencia"].' años </td>
			<td>'.$item["f_resolucion"].'</td>
			<td>'.$nomPro.'</td>
			<td><a href="index.php?action=editarActas&codigo='.$item["num_acta"].'"><button class="btn btn-danger">Editar</button></a></td>
		</tr>';
	}

}

#VISTA DE ACTAS
#------------------------------------
public function vistaProSelectController(){
	$respuesta = Datos::vistaProcesosModel("proceso");
	
	foreach($respuesta as $row => $item){
		$c=$item["id_proceso"];
		$n=$item["nom_proceso"];
		
	echo'<option value='.$c.'>'.$n.'</option>';
	

	}

}

#EDITAR ACTAS
#------------------------------------

public function editarActasController(){

	$datosController = $_GET["codigo"];
	$respuesta = Datos::editarActasModel($datosController, "acta");

	echo'<input type="hidden" value="'.$respuesta["num_acta"].'" name="numEditar">
		<label>Vigencia Acta: </label><br>
		<select name="vigEditar" require>
				<option value="1" selected>1 año</option>
				<option value="2">2 años</option>
				<option value="3">3 años</option>
				<option value="4">4 años</option>
				<option value="5">5 años</option>
		</select><br><br>

		<label>Fecha Resolucion: </label>
		<input type="date" name="freEditar"><br><br>


		';

}

#ACTUALIZAR ACTAS
#------------------------------------
public function actualizarActasController(){

	if(isset($_POST["numEditar"])){

		$datosController = array( "num"=>$_POST["numEditar"],
								"vig"=>$_POST["vigEditar"],
								"fre"=>$_POST["freEditar"],
								"idp"=>$_POST["idpEditar"]);
		
		
		$respuesta = Datos::actualizarActasModel($datosController, "acta");

		
		if($respuesta == "success"){

			header("location:index.php?action=actas");

		}

		else{

			echo "error";

		}

	}

}
	

#------------------------------------------------------------------------------------
#_____________________________________PROCESOS_______________________________________
#------------------------------------------------------------------------------------
		public function registroProcesoController(){

		if(isset($_POST["nombreRegistro"])){
			$datosController = array( 
									  "nom"=>$_POST["nombreRegistro"],
									  "tip"=>$_POST["tipoRegistro"],
									  "auto"=>$_POST["autoRegistro"],
									  "paut"=>$_POST["proxAutoRegistro"],
									  "dep"=>$_POST["depRegistro"]);
			$respuesta = Datos::registroProcesosModel($datosController, "proceso");

			if($respuesta == "success"){
				echo "Registro Exitoso";			
			}
			else{
				header("location:index.php");
			}

		}

	}




		//mostrar todos los procesos --procesos.php
		public function vistaProcesosController(){

			$respuesta = Datos::vistaProcesosModel("proceso");

						
			foreach($respuesta as $row => $item){
				$nomDep=0;

				if ($item["tipo_proceso"]=="0"){
					$tip="Autoevaluación";

				}
				else{
					if ($item["tipo_proceso"]=="1"){
						$tip="Registro Calificado";

					}else{
						$tip="Acreditacion";
					}
				}


				
				$d=$item["id_depen"];
				$dep=Datos::vistaDepenPertenModel("dependencia",$d);

				foreach($dep as $row => $ite){
					$nomDep=$ite["nombre"];
				}
			
			echo'<tr>
					<td>'.$item["id_proceso"].'</td>
					<td>'.$item["nom_proceso"].'</td>
					<td>'.$tip.'</td>
					<td>'.$nomDep.'</td>
										
					<td><a href="index.php?action=editarProceso&codigo='.$item["id_proceso"].'"><button class="btn btn-danger">Editar</button></a></td>
				</tr>';
			}

		}



		public function editarProcesoController(){

			$datosController = $_GET["codigo"];
			$respuesta = Datos::editarProcesosModel($datosController, "proceso");

			echo'<input type="hidden" value="'.$respuesta["id_proceso"].'" name="codEditar">
				<label>Nombre Proceso: </label><br>
				<input type="text" value="'.$respuesta["nom_proceso"].'" name="nombreEditar" required><br><br>
			
				';

		}

		#ACTUALIZAR DEPENDENCIA
		#------------------------------------
		public function actualizarProcesoController(){

			if(isset($_POST["nombreEditar"])){

				$datosController = array( "codigo"=>$_POST["codEditar"],
										"nombre"=>$_POST["nombreEditar"],
										"tip"=>$_POST["tipoEditar"],
										"auto"=>$_POST["autoEditar"],
										"paut"=>$_POST["pautEditar"],
										"dep"=>$_POST["depEditar"]);
				
				$respuesta = Datos::actualizarProcesoModel($datosController, "proceso");

				if($respuesta == "success"){

					echo "<script>alert('Datos Actualizados Correctamente')</script>";

					header("location:index.php?action=procesos");

				}

				else{

					echo "error";

				}

			}
		
		}

	#--------------------------CONSULTAS-------------------------------------
		public function consulta1Controller(){
			$datos="0";
			$admin="0";
			if(isset($_POST["tipoDepConsulta"])){
				
			
				$datosController = array( 
									  "tipDep"=>$_POST["tipoDepConsulta"],
									  "dep"=>$_POST["depConsulta"],
									  "pro"=>$_POST["proConsulta"]);
			

				$datos=$datosController;
				$admin=$_POST["tipoDepConsulta"];
				$proceso="";
				if ($_POST["proConsulta"]=="1") {
					$proceso="Registro Calificado";					
				}elseif($_POST["proConsulta"]=="2"){
					$proceso="Acreditación";
				}else{
					$proceso="Autoevaluación";
				}

				$d=$_POST["depConsulta"];
				$dep=Datos::vistaDepenPertenModel("dependencia",$d);

				foreach($dep as $row => $ite){
				$d=$ite["nombre"];
				}

				echo'<tr>
					
						<th colspan="4">Buscar proceso de '.$proceso.' para: '.$d.'</th>
							
					</tr>
						';


			}
			
			if ($datos!="0") {
				$q="1";

				if($admin=="0"){
					
					$respuest = Datos::consulta1Model($datos);
					if(empty($respuest)){
							$a="No hay datos disponibles en la base de datos";
							echo'<tr>
							<td>'.$a.'</td>					
							</tr>';
					}else{
							echo'
							
				
								<tr>
									<th>Fecha De Resolución</th>
									<th>Número Acta</th>
									<th>Vigencia (años)</th>
									<th>Fecha Expedicion</th>
								</tr>';

							foreach ($respuest as $row => $it){

								echo'<tr>
									<td>'.$it["f_resolucion"].'</td>
									<td>'.$it["num_acta"].'</td>
									<td>'.$it["vigencia"].'</td>
									<td>'.$it["expedicion"].'</td>					
									</tr>';
								}


						}					
				}else{
					$respuest = Datos::consulta2Model($datos);
					if(empty($respuest)){
							$a="No hay datos disponibles en la base de datos";
							echo'<tr>
							<td>'.$a.'</td>					
							</tr>';
					}else{
							echo'		
								<tr>
									<th>Fecha Autoevaluación</th>
									<th>Fecha Proxima Autoevaluación</th>
								</tr>';

							foreach ($respuest as $row => $it){

								echo'<tr>
									<td>'.$it["f_autoeval"].'</td>
									<td>'.$it["f_prox_autoeval"].'</td>										
									</tr>';
								}


						}



				}
			//		
			}
			

				
		}

//......................Consulta 2-----------------------------------

			public function consulta2Controller(){
			$datos="0";
			$admin="0";
			if(isset($_POST["tipoDepConsulta"])){
				
			
				$datosController = array( 
									  "tipDep"=>$_POST["tipoDepConsulta"],
									  "pro"=>$_POST["proConsulta"],
									  "mes"=>$_POST["mesConsulta"]);
									  
			
				
				$datos=$datosController;
				$admin=$_POST["tipoDepConsulta"];

				$proceso="";
				if ($_POST["proConsulta"]=="1") {
					$proceso="Registro Calificado";					
				}elseif($_POST["proConsulta"]=="2"){
					$proceso="Acreditación";
				}else{
					$proceso="Autoevaluación";
				}
				echo'<tr>
					
						<th colspan="4">Buscar procesos de '.$proceso.'</th>
							
					</tr>
						';
			}
			
			if ($datos!="0") {
				$q="1";
				if($admin=="1"){
					
						$respuest = Datos::consulta3Model($datos);
						///aqui voy
						if(empty($respuest)){
								$a="No hay datos disponibles en la base de datos";
								echo'<tr>
								<td>'.$a.'</td>					
								</tr>';
						}else{
								echo'		
									<tr>
										<th>Dependencia</th>
										<th>Fecha de inicio proceso</th>
										<th>Fecha Proxima proceso</th>
									</tr>';

								foreach ($respuest as $row => $it){

									echo'<tr>

										<td>'.$it["nombre"].'</td>
										<td>'.$it["f_autoeval"].'</td>
										<td>'.$it["f_prox_autoeval"].'</td>										
										</tr>';
									}
							}
						}else{

							$respuest = Datos::consulta4Model($datos);
						///aqui voy
							if(empty($respuest)){
									$a="No hay datos disponibles en la base de datos";
									echo'<tr>
									<td>'.$a.'</td>					
									</tr>';
							}else{
								echo'		
									<tr>
										<th>Dependencia</th>
										<th>Fecha de inicio proceso</th>
										<th>Fecha Proxima proceso</th>
									</tr>';

								foreach ($respuest as $row => $it){

									echo'<tr>

										<td>'.$it["nombre"].'</td>
										<td>'.$it["f_resolucion"].'</td>
										<td>'.$it["expedicion"].'</td>										
										</tr>';
									}
							}
							//else
						}


			//							
			}
				
		}











//finnnn
	}
?>