<?php
require_once 'artesano.php';
require_once 'tallerista.php';

class TalleristaCapacitacion{
	private $pdo;
	public $idCapacitacion;
    public $curp;
    public $pagoTallerista;
    public $formaPago;
    public $registroIndividuo;
    
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(TalleristaCapacitacion $data){
		try {
			$artesano = new Artesano();
			$tallerista = new Tallerista();
			if ($data->registroIndividuo == '1') {
				$registro = $tallerista->ObtenerPorCURP($data->curp);
				if (!empty($registro)) {
					$participacion = $this->VerificarTalleristaCapacitacion($data->curp,$data->idCapacitacion);
					if (empty($participacion)) {
						$sql = "INSERT INTO talleristacapacitacion (curp,idCapacitacion,pagoTallerista,formaPago) VALUES (?, ?, ?, ?)";
					}else{
						return 'nombre_existente';	
					}
				}else{
					return 'registro_inexistente';
				}	
			}else{
				$registro = $artesano->ObtenerPorCURP($data->curp);
				if (!empty($registro)) {
					$participacion = $this->VerificarArtesanoCapacitacion($data->curp,$data->idCapacitacion);
					if (empty($participacion)) {
						$sql = "INSERT INTO artesanotallerista (curp,idCapacitacion,pagoTallerista,formaPago) VALUES (?, ?, ?, ?)";
					}else{
						return 'nombre_existente';	
					}
				}else{
					return 'registro_inexistente';
				}
			}
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->curp, 
                    $data->idCapacitacion, 
                    $data->pagoTallerista,
                    $data->formaPago
                )
			);
			return 'exito';			
		}catch (Exception $e) {
			die($e->getMessage());
			// header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	// public function Obtener($curp){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM participanteexpo WHERE curp = ?");
	// 		$stm->execute(array($curp));
	// 		return $stm->fetch(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		// die($e->getMessage());
	// 		header('location: index.php?c=Principal&a=ErrorConexion');
	// 	}
	// }

	//Recupera las capacitaciones en las que el tallerista ha participado.
	public function ObtenerCapacitaciones($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT capacitacion.idCapacitacion,capacitacion.nombre,fechaInicio,fechaFin,pagoTallerista,formaPago FROM capacitacion INNER JOIN talleristacapacitacion ON capacitacion.idCapacitacion = talleristacapacitacion.idCapacitacion WHERE talleristacapacitacion.curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Recupera los individuos registrados como talleristas participantes en una capacitacion en específico.
	public function ObtenerTalleristas($idCapacitacion){
		try {
			$stm = $this->pdo->prepare("SELECT tallerista.curp,nombre,aPaterno,aMaterno FROM tallerista INNER JOIN talleristacapacitacion ON tallerista.curp = talleristacapacitacion.curp WHERE idCapacitacion = ?");
			$stm->execute(array($idCapacitacion));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Recupera los individuos registrados como artesanos participantes en una capacitacion en específico.
	public function ObtenerArtesanosTalleristas($idCapacitacion){
		try {
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN artesanotallerista ON artesano.curp = artesanotallerista.curp WHERE idCapacitacion = ?");
			$stm->execute(array($idCapacitacion));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Verifica si un individuo registrado como tallerista ya se encuentra registrado en una capacitacion en especifico.
	public function VerificarTalleristaCapacitacion($curp,$idCapacitacion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM talleristacapacitacion WHERE curp = ? and idCapacitacion = ?");
			$stm->execute(array($curp,$idCapacitacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	//Verifica si un individuo registrado como artesano ya se encuentra registrado en una capacitacion en especifico.
	public function VerificarArtesanoCapacitacion($curp,$idCapacitacion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM artesanotallerista WHERE curp = ? and idCapacitacion = ?");
			$stm->execute(array($curp,$idCapacitacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
			// header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}

?>

