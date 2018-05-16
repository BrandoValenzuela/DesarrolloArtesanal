<?php
require_once 'model/artesano.php';

class Compra{
	private $pdo;
    public $curp;
    public $alcance;
    public $monto;
    public $tipoPago;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Compra $data){
		try {
			$artesano = new Artesano();
			$registro = $artesano->ObtenerPorCURP($data->curp);
			if (!empty($registro)) {
				$sql = "INSERT INTO compras (curp,alcance,monto,tipoPago,fechaCompra) 
			        VALUES (?, ?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->curp, 
	                    $data->alcance,
	                    $data->monto, 
	  					$data->tipoPago,
	  					date('Y-m-d')
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

	public function ObtenerPorMesAño($mes,$año){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM compras WHERE MONTH(fechaCompra) = ? AND YEAR(fechaCompra) = ?");
			$stm->execute(array($mes,$año));
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
	
	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM compras WHERE fechaCompra BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerCompras($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT alcance,monto,tipoPago,fechaCompra FROM compras WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			// header('location: index.php?c=Principal&a=ErrorConexion');
			die($e->getMessage());
		}
	}
}
?>
