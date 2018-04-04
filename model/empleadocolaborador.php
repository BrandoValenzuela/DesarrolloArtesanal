<?php
require_once 'artesano.php';

class EmpleadoColaborador{
	private $pdo;
    public $curp;
    public $idTaller;
    public $sueldoMensual;
    public $tipoParticipacion;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(EmpleadoColaborador $data){
		try {
			$artesano = new Artesano();
			$resultado = $artesano->Obtener($data->curp);
			if (!empty($resultado)) {
				$sql = "INSERT INTO empleadocolaborador (idTaller,curp,sueldoMensual,tipoParticipacion) 
			        VALUES (?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->idTaller, 
	                    $data->curp,
	                    $data->sueldoMensual, 
	                    $data->tipoParticipacion
	                )
				);
				return 'exito';
			}else{
				return 'no_existe';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerEmpleados($idTaller){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN empleadocolaborador ON artesano.curp = empleadocolaborador.curp WHERE idTaller = ? AND tipoParticipacion = 1");
			$stm->execute(array($idTaller));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}


	public function ObtenerColaboradores($idTaller){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT artesano.curp,nombre,aPaterno,aMaterno FROM artesano INNER JOIN empleadocolaborador ON artesano.curp = empleadocolaborador.curp WHERE idTaller = ? AND tipoParticipacion = 2");
			$stm->execute(array($idTaller));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

		public function ObtenerTalleresEmpleado($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT empleadocolaborador.idTaller,nombre,domicilio,localidad,municipio FROM taller INNER JOIN empleadocolaborador ON taller.idTaller = empleadocolaborador.idTaller WHERE empleadocolaborador.curp = ? AND empleadocolaborador.tipoParticipacion = 1");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
						// die($e->getMessage());
		}
	}

	public function ObtenerTalleresColaborador($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT taller.idTaller,nombre,domicilio,localidad,municipio FROM taller INNER JOIN empleadocolaborador ON taller.idTaller = empleadocolaborador.idTaller WHERE empleadocolaborador.curp = ? AND empleadocolaborador.tipoParticipacion = 2");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
			// die($e->getMessage());
		}
	}
}
?>