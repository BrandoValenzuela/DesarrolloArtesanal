<?php
class ComodatoExterno{
	private $pdo;
	public $folio;
    public $bienesComodatados;
    public $fechaInicio;
    public $nombrePoseedorComodato;
    public $domicilioPoseedorComodato;
    public $municipioPoseedorComodato;
    public $telefonoPoseedorComodato;
    

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ComodatoExterno $data){
		try {
			$sql = "INSERT INTO comodatoexterno (folio,bienesComodatados,fechaInicio,nombrePoseedorComodato,domicilioPoseedorComodato,municipioPoseedorComodato,telefonoPoseedorComodato) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->folio,
                    $data->bienesComodatados,
                    $data->fechaInicio,
  					$data->nombrePoseedorComodato,
                    $data->domicilioPoseedorComodato, 
                    $data->municipioPoseedorComodato, 
                    $data->telefonoPoseedorComodato
                )
			);
			return 'exito';
		}catch (Exception $e) {
			// die($e->getMessage());
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorId($idComodato){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM comodatoexterno WHERE idComodatoExterno = ?");
			$stm->execute(array($idComodato));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// public function ObtenerPorConcepto($concepto){
	// 	try {
	// 		$palabras = explode(" ",$concepto); 
 //   			$numero = count($palabras); 
	// 		$result = array();
	// 		if ($numero == 1) { 
	// 			$pattern = '%'.$concepto.'%';
	// 			$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE nombre Like ?");
	// 			$stm->execute(array($pattern));
 //  			}elseif ($numero > 1) {
 //  				$stm = $this->pdo->prepare("SELECT *, MATCH(nombre) AGAINST(?) AS Score FROM concurso WHERE MATCH(nombre) AGAINST(?) ORDER BY Score DESC LIMIT 50");
	// 			$stm->execute(array($concepto,$concepto));
 //  			}
 //  			return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		// die($e->getMessage());
	// 		header('location: index.php?c=Principal&a=ErrorConexion');
	// 	}
	// }

	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM comodatoexterno WHERE fechaInicio BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>
