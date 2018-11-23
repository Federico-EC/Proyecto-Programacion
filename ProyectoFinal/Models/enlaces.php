<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

		if($enlaces == "dependencias" || $enlaces == "editarDepen" || $enlaces == "registro"
		||$enlaces=="procesos"||$enlaces=="regProceso"||$enlaces=="editarProceso"
		||$enlaces == "regActas" ||$enlaces=="actas" ||$enlaces=="editarActas"
		||$enlaces=="consulta1" ||$enlaces=="consulta2"){
			$module =  "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/inicio.php";
		}
		else if($enlaces == "ok"){
			$module =  "views/modules/inicio.php";
		}
		else if($enlaces == "fallo"){
			$module =  "views/modules/inicio.php";
		}
		else if($enlaces == "cambio"){
			$module =  "views/modules/dependencias.php";
		}
		else if ($enlaces == "camb"){
			"views/modules/procesos.php";
		}else{
			$module =  "views/modules/inicio.php";
		}
		return $module;
	}

}

?>