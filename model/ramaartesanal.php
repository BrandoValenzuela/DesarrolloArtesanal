<?php
class RamaArtesanal{
	private $pdo;
    public $id;
    public $Nombre;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(RamaArtesanal $data){
		try {
			$sql = "INSERT INTO ramaartesanal (nombre) 
		        VALUES (?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->nombre
                )
			);
			return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'rama_existente';
			}else{
				header('location: index.php?c=Principal&a=ErrorConexion');
			}
		}
	}

	public function Listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM ramaartesanal");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM ramaartesanal WHERE idRamaArtesanal = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>