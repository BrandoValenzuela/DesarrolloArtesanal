<?php
class Corredor{
	private $pdo;
	private $idCorrdor;
    public $nombre;
   
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Corredor $data){
		try {
			$sql = "INSERT INTO corredor (nombre) VALUES (?)";
			$this->pdo->prepare($sql)->execute(array($data->nombre));
			return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'producto_existente';
			}else{
				header('location: index.php?c=Principal&a=ErrorConexion');
			}
		}
	}

	public function Listar(){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM corredor");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}	
}

?>
