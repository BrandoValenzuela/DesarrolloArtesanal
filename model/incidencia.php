<?php
require_once 'model/artesano.php';

class Incidencia{
	private $pdo;
    public $curp;
    public $observacion;
    public $informante;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Incidencia $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCURP($data->curp);
			if (!empty($registro)) {
				$sql = "INSERT INTO incidencias (curp,observacion,fechaRegistro,informante) 
			        VALUES (?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->curp, 
	                    $data->observacion,
	                    date('Y-m-d'),
	  					$data->informante
	                )
				);
				return 'exito';
			}else{
				return 'registro_inexistente';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorCURP($curp){
		try {
			$Artesano = new Artesano();
			$registro = $Artesano->ObtenerPorCURP($curp);
			if (!empty($registro)) {
				$stm = $this->pdo->prepare("SELECT * FROM incidencias WHERE curp = ?");
				$stm->execute(array($curp));
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}else{
				return 'registro_inexistente';
			}
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}
	
	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT incidencias.*,artesano.nombre,artesano.aPaterno,artesano.aMaterno FROM incidencias INNER JOIN artesano ON incidencias.curp = artesano.curp WHERE fechaRegistro BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>
