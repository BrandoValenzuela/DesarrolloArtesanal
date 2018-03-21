<?php
require_once 'artesano.php';

class ArtesanoExpo{
	private $pdo;
	public $IdExpo;
    public $CURP;
    public $IngresoArtesanoExpo;
    public $InversionArtesanoExpo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ArtesanoExpo $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->Obtener($data->CURP);
			if (!empty($registro)) {
				$participacion = $this->VerificarParticipanteConcurso($data->CURP,$data->IdExpo);
				if (empty($participacion)) {
					$sql = "INSERT INTO participanteexpo (curp,idExposicion,montoAsignado,ingresoObtenido) 
				        VALUES (?, ?, ?, ?)";
					$this->pdo->prepare($sql)->execute(
						array(
		                    $data->CURP, 
		                    $data->IdExpo, 
		                    $data->InversionArtesanoExpo,
		                    $data->IngresoArtesanoExpo
		                )
					);
					return 'exito';	
				}else{
					return 'nombre_existente';	
				}
			}else{
				return 'registro_inexistente';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Obtener($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM participanteexpo WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			// die($e->getMessage());
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerExposiciones($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT nombre,municipio,entidad,montoAsignado,ingresoObtenido FROM exposicion INNER JOIN participanteexpo ON exposicion.idExposicion = participanteexpo.idExposicion WHERE participanteexpo.curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerParticipantes($idExposicion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN participanteexpo ON artesano.curp = participanteexpo.curp WHERE idExposicion = ?");
			$stm->execute(array($idExposicion));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function VerificarParticipanteConcurso($curp,$idExpo){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM participanteexpo WHERE curp = ? and idExposicion = ?");
			$stm->execute(array($curp,$idExpo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	// public function Eliminar($id){
	// 	try {
	// 		$stm = $this->pdo
	// 		            ->prepare("DELETE FROM alumnos WHERE id = ?");			          

	// 		$stm->execute(array($id));
	// 	}catch (Exception $e){
	// 		die($e->getMessage());
	// 	}
	// }

	// public function Actualizar($data)
	// {
	// 	try 
	// 	{
	// 		$sql = "UPDATE alumnos SET 
	// 					Nombre          = ?, 
	// 					Apellido        = ?,
 //                        Correo        = ?,
	// 					Sexo            = ?, 
	// 					FechaNacimiento = ?
	// 			    WHERE id = ?";

	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(
 //                        $data->Nombre, 
 //                        $data->Correo,
 //                        $data->Apellido,
 //                        $data->Sexo,
 //                        $data->FechaNacimiento,
 //                        $data->id
	// 				)
	// 			);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }


}

?>
