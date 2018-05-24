<?php
include_once 'artesano.php';

class ComodatoArtesano{
	private $pdo;
    public $curp;
    public $folio;
    public $fechaInicio;
    public $bienesComodatados;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ComodatoArtesano $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCURP($data->curp);
			if (!empty($registro)) {
				$sql = "INSERT INTO comodatoartesano (curp,folio,fechaInicio,bienesComodatados) 
			        VALUES (?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->curp, 
	                    $data->folio,
	                    $data->fechaInicio,
	  					$data->bienesComodatados
	                )
				);
				return 'exito';
			}else{
				return 'artesano_inexistente';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerComodatos($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM comodatoartesano WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM comodatoartesano WHERE fechaInicio BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>
