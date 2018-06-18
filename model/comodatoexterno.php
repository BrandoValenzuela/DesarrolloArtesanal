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
			// header('location: index.php?c=Principal&a=ErrorConexion');
			die($e->getMessage());
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

	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM comodatoexterno WHERE fechaInicio BETWEEN ? AND ? ORDER BY fechaInicio");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>
