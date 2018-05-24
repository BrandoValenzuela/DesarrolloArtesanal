<?php
require_once 'artesano.php';

class ParticipanteExpo{
	private $pdo;
	public $IdExpo;
    public $CURP;
    public $IngresoArtesanoExpo;
    public $InversionArtesanoExpo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ParticipanteExpo $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCurp($data->CURP);
			if (!empty($registro)) {
				$participacion = $this->VerificarParticipanteExpo($data->CURP,$data->IdExpo);
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
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerExposiciones($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT exposicion.idExposicion,nombre,municipio,entidad,montoAsignado,ingresoObtenido FROM exposicion INNER JOIN participanteexpo ON exposicion.idExposicion = participanteexpo.idExposicion WHERE participanteexpo.curp = ?");
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

	public function VerificarParticipanteExpo($curp,$idExpo){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM participanteexpo WHERE curp = ? and idExposicion = ?");
			$stm->execute(array($curp,$idExpo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}

?>
