<?php
require_once 'artesano.php';

class ParticipanteConcurso{
	private $pdo;
	public $IdConcurso;
    public $CURP;
    public $Posicion;
    public $MontoPremio;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ParticipanteConcurso $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCURP($data->CURP);
			if (!empty($registro)) {
				$participacion = $this->VerificarParticipanteConcurso($data->CURP,$data->IdConcurso);
				if (empty($participacion)) {
					$sql = "INSERT INTO participantecon (curp,idConcurso,posicion,montoGanado) 
				        VALUES (?, ?, ?, ?)";
					$this->pdo->prepare($sql)->execute(
						array(
		                    $data->CURP, 
		                    $data->IdConcurso, 
		                    $data->Posicion,
		                    $data->MontoPremio
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

	public function ObtenerConcursos($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT concurso.idConcurso,nombre,municipio,entidad,posicion,montoGanado,piezaParticipante FROM concurso INNER JOIN participantecon ON concurso.idConcurso = participantecon.idConcurso WHERE participantecon.curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerParticipantes($idConcurso){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN participantecon ON artesano.curp = participantecon.curp WHERE idConcurso = ?");
			$stm->execute(array($idConcurso));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function VerificarParticipanteConcurso($curp,$idConcurso){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM participantecon WHERE curp = ? and idConcurso = ?");
			$stm->execute(array($curp,$idConcurso));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>

