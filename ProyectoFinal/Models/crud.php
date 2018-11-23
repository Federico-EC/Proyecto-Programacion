<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroDependenciaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,sigla,tipo_depen,activo,id_depen_perten) VALUES (:nom,:sig,:tip,:act,:dep)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nom", $datosModel["nom"], PDO::PARAM_STR);
		$stmt->bindParam(":sig", $datosModel["sig"], PDO::PARAM_STR);
		$stmt->bindParam(":tip", $datosModel["tip"], PDO::PARAM_STR);
		$stmt->bindParam(":act", $datosModel["act"], PDO::PARAM_STR);
		$stmt->bindParam(":dep", $datosModel["dep"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	//---ELIMINAR DEPENDENCIA----
	public function eliminarDepModel($id, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE codigo = $id");
		//$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		$stmt->close();

	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaDepenModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT codigo, nombre, sigla, tipo_depen, activo,id_depen_perten FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	//Mostar lista de dependencias en modules-->registro.php
	/*
	public function vistaDepenSelectModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT codigo, nombre FROM $tabla where tipo_depen=$tip");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
*/



		public function vistaDepenAdminSelectModel($tabla,$adm){

		
		$stmt = Conexion::conectar()->prepare("SELECT codigo, nombre FROM $tabla where tipo_depen=$adm");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	public function vistaDepenPertenModel($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT codigo, nombre FROM $tabla where codigo=$id ");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarDepenModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT codigo, nombre, sigla, tipo_depen, activo FROM $tabla WHERE codigo = :codigo");
		$stmt->bindParam(":codigo", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarDepenModel($datosModel, $tabla,$a){

		if($a=="1"){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  nombre = :nombre, sigla = :sigla, tipo_depen = :tipo_depen, activo = :activo,id_depen_perten=:depen WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":sigla", $datosModel["sigla"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_depen", $datosModel["tipo_depen"], PDO::PARAM_INT);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_BOOL);
		$stmt->bindParam(":depen", $datosModel["depe"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();


		}else{

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  nombre = :nombre, sigla = :sigla, tipo_depen = :tipo_depen, activo = :activo,id_depen_perten=:depen WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":sigla", $datosModel["sigla"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_depen", $datosModel["tipo_depen"], PDO::PARAM_INT);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_BOOL);
		$stmt->bindParam(":depen", $datosModel["depen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();
		}

		

    }

#------------------------------------------------------------------------------------
#_____________________________________ACTAS_______________________________________
#------------------------------------------------------------------------------------

	#REGISTRO DE ACTAS
	#-------------------------------------
	public function registroActasModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (num_acta,vigencia,f_resolucion,id_proceso) VALUES (:num,:vig,:fre,:idp)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":num", $datosModel["num"], PDO::PARAM_STR);
		$stmt->bindParam(":vig", $datosModel["vig"], PDO::PARAM_INT);
		$stmt->bindParam(":fre", $datosModel["fre"], PDO::PARAM_STR);
		$stmt->bindParam(":idp", $datosModel["idp"], PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}
	#VISTA ACTAS
	#-------------------------------------
	public function vistaActasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT num_acta,vigencia,f_resolucion,id_proceso FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#EDITAR ACTAS
	#-------------------------------------

	public function editarActasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT num_acta,vigencia,f_resolucion,id_proceso FROM $tabla WHERE num_acta = :codigo");
		$stmt->bindParam(":codigo", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR ACTAS
	#-------------------------------------

	public function actualizarActasModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  num_acta = :num, vigencia = :vig, f_resolucion = :fre,id_proceso=:idp WHERE num_acta = :num");

		$stmt->bindParam(":num", $datosModel["num"], PDO::PARAM_INT);
		$stmt->bindParam(":vig", $datosModel["vig"], PDO::PARAM_INT);
        $stmt->bindParam(":fre", $datosModel["fre"], PDO::PARAM_STR);
		$stmt->bindParam(":idp", $datosModel["idp"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}


		$stmt->close();

	}
	
	public function vistaProceModel($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT id_proceso, nom_proceso FROM $tabla where id_proceso=$id ");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}




#------------------------------------------------------------------------------------
#_____________________________________PROCESOS_______________________________________
#------------------------------------------------------------------------------------

public function registroProcesosModel($datosModel, $tabla){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nom_proceso,tipo_proceso,f_autoeval,f_prox_autoeval,id_depen) VALUES (:nom,:tip,:auto,:paut,:dep)");	

		
		$stmt->bindParam(":nom", $datosModel["nom"], PDO::PARAM_STR);
		$stmt->bindParam(":tip", $datosModel["tip"], PDO::PARAM_STR);
		$stmt->bindParam(":auto", $datosModel["auto"], PDO::PARAM_STR);
		$stmt->bindParam(":paut", $datosModel["paut"], PDO::PARAM_STR);
		$stmt->bindParam(":dep", $datosModel["dep"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}




public function vistaProcesosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_proceso, nom_proceso, tipo_proceso, f_autoeval, f_prox_autoeval,id_depen FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}



	#EDITAR USUARIO
	#-------------------------------------

	public function editarProcesosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_proceso, nom_proceso, tipo_proceso, f_autoeval, f_prox_autoeval,id_depen FROM $tabla WHERE id_proceso = :codigo");
		$stmt->bindParam(":codigo", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	public function actualizarProcesoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_proceso = :codigo, nom_proceso = :nombre, tipo_proceso = :tip,f_autoeval=:auto,f_prox_autoeval=:paut,id_depen=:dep  WHERE id_proceso = :codigo");

		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tip", $datosModel["tip"], PDO::PARAM_INT);
		$stmt->bindParam(":auto", $datosModel["auto"], PDO::PARAM_STR);
		$stmt->bindParam(":paut", $datosModel["paut"], PDO::PARAM_STR);
		$stmt->bindParam(":dep", $datosModel["dep"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

    }

#---------------------------------CONSULTAS---------------------------



    public function consulta1Model($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT f_resolucion,num_acta, vigencia, ADDDATE(acta.f_resolucion, INTERVAL acta.vigencia year)'expedicion' FROM proceso INNER JOIN dependencia ON proceso.id_depen=dependencia.codigo INNER JOIN acta ON acta.id_proceso=proceso.id_proceso WHERE proceso.tipo_proceso=:pro and dependencia.codigo=:dep ORDER BY ADDDATE(acta.f_resolucion, INTERVAL acta.vigencia year) DESC ");

		$stmt->bindParam(":pro", $datosModel["pro"], PDO::PARAM_INT);	
		$stmt->bindParam(":dep", $datosModel["dep"], PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}






//-----consulta 2----------
    public function consulta2Model($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT f_autoeval, f_prox_autoeval FROM proceso INNER JOIN dependencia ON proceso.id_depen=dependencia.codigo WHERE proceso.tipo_proceso=:pro and dependencia.codigo=:dep ORDER BY (f_prox_autoeval) ASC ");

		$stmt->bindParam(":pro", $datosModel["pro"], PDO::PARAM_INT);	
		$stmt->bindParam(":dep", $datosModel["dep"], PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}


//consulta 3 -----------
    public function consulta3Model($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT id_depen,nombre,f_autoeval, f_prox_autoeval FROM proceso INNER JOIN dependencia ON proceso.id_depen=dependencia.codigo WHERE proceso.tipo_proceso=0 and tipo_depen=:tipDep and TIMESTAMPDIFF(MONTH, f_prox_autoeval, CURDATE())>-:mes ORDER BY (f_prox_autoeval) ASC ");

		$stmt->bindParam(":tipDep", $datosModel["tipDep"], PDO::PARAM_INT);	
		$stmt->bindParam(":mes", $datosModel["mes"], PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

//consulta 4
public function consulta4Model($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT nombre, f_resolucion, ADDDATE(acta.f_resolucion, INTERVAL acta.vigencia year)'expedicion' FROM proceso INNER JOIN dependencia ON proceso.id_depen=dependencia.codigo INNER JOIN acta ON acta.id_proceso=proceso.id_proceso WHERE proceso.tipo_proceso=:pro and ADDDATE(acta.f_resolucion, INTERVAL acta.vigencia year)>-:mes  ORDER BY ADDDATE(acta.f_resolucion, INTERVAL acta.vigencia year) DESC ");

		$stmt->bindParam(":pro", $datosModel["pro"], PDO::PARAM_INT);
		$stmt->bindParam(":mes", $datosModel["mes"], PDO::PARAM_INT);	
		
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}	














}
?>