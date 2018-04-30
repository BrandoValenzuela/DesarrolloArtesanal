<?php
require_once 'artesano.php';

class Beneficiario{
	private $pdo;
	public $idApoyo;
    public $curp;
    public $monto;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Beneficiario $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCURP($data->curp);
			if (!empty($registro)) {
				$beneficiado = $this->VerificarBeneficiarioApoyo($data->curp,$data->idApoyo);
				if (empty($beneficiado)) {
					$sql = "INSERT INTO favorecidoapoyo (curp,idApoyo,monto,fechaOtorgamiento) 
				        VALUES (?, ?, ?, ?)";
					$this->pdo->prepare($sql)->execute(
						array(
		                    $data->curp, 
		                    $data->idApoyo, 
		                    $data->monto,
		                    date('Y-m-d')
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

	// public function ObtenerConcursos($curp){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT nombre,municipio,entidad,posicion,montoGanado FROM concurso INNER JOIN participantecon ON concurso.idConcurso = participantecon.idConcurso WHERE participantecon.curp = ?");
	// 		$stm->execute(array($curp));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		header('location: index.php?c=Principal&a=ErrorConexion');
	// 	}
	// }

	public function ObtenerBeneficiarios($idBeneficiario){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN favorecidoapoyo ON artesano.curp = favorecidoapoyo.curp WHERE idApoyo = ?");
			$stm->execute(array($idBeneficiario));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function VerificarBeneficiarioApoyo($curp,$idApoyo){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM favorecidoapoyo WHERE curp = ? and idApoyo = ?");
			$stm->execute(array($curp,$idApoyo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>

