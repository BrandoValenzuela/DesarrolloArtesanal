<?php
require_once 'artesano.php';

class ParticipanteCapacitacion{
	private $pdo;
	public $idCapacitacion;
    public $curp;
    
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ParticipanteCapacitacion $data){
		try {
			$artesano = new Artesano();
			$participantes_previamente_registrados = "<b>REGISTRADOS PREVIAMENTE:</b> <br>";
			$no_registrado_en_sistema = "<b>NO REGISTRADOS EN EL SISTEMA:</b> <br>";
			$registro_participante_exitoso = "<b>REGISTRADOS CON EXITO:</b> <br>";
			while (true) {
				$participante = current($data->curp);
				$registro = $artesano->ObtenerPorCurp($participante);
				if (!empty($registro)) {
					$participacion = $this->VerificarParticipanteCapacitacion($participante,$data->idCapacitacion);
					if (empty($participacion)) {
						$sql = "INSERT INTO participantecapacitacion (curp,idCapacitacion) VALUES (?, ?)";
						$this->pdo->prepare($sql)->execute(
							array(
			                    $participante, 
			                    $data->idCapacitacion
			                )
						);
						$registro_participante_exitoso .= $participante.', ';
					}else{
						$participantes_previamente_registrados .= $participante.', ';
					}
				}else{
					$no_registrado_en_sistema .= $participante.', ';
				}
				$participante = next($data->curp);
				if ($participante === false) {
					break;
				}
				
			}
			return trim($registro_participante_exitoso,', ').'<br>'.trim($participantes_previamente_registrados,', ').'<br>'.trim($no_registrado_en_sistema,', ');
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
			// die($e->getMessage());
		}
	}

	//Recupera las capacitaciones en la que ha participado un artesano.
	public function ObtenerCapacitaciones($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT capacitacion.idCapacitacion,capacitacion.nombre,fechaInicio,fechaFin FROM capacitacion INNER JOIN participantecapacitacion ON capacitacion.idCapacitacion = participantecapacitacion.idCapacitacion WHERE participantecapacitacion.curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Recupera los artesanos que han sido participantes de una capacitacion en específico.
	public function ObtenerParticipantes($idCapacitacion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN participantecapacitacion ON artesano.curp = participantecapacitacion.curp WHERE idCapacitacion = ?");
			$stm->execute(array($idCapacitacion));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Verifica si un artesano a registrar ya se encuentra registrado en el sistema.
	public function VerificarParticipanteCapacitacion($curp,$idCapacitacion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM participantecapacitacion WHERE curp = ? and idCapacitacion = ?");
			$stm->execute(array($curp,$idCapacitacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}

?>

