<?php
class Apoyo{
	private $pdo;
    public $nombre;
    public $descripcion;
    public $fechaOtorgamiento;
    public $monto;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Apoyo $data){
		try {
			$sql = "INSERT INTO otrosapoyos (nombre,descripcion,fechaOtorgamiento,monto) 
		        VALUES (?, ?, ?, ?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->nombre, 
                    $data->descripcion,
                    $data->fechaOtorgamiento, 
  					$data->monto
                )
			);
			return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'nombre_existente';
			}else{
				header('location: index.php?c=Principal&a=ErrorConexion');
			}
		}
	}

	public function ObtenerPorFecha($mes,$año){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM otrosapoyos WHERE MONTH(fechaOtorgamiento) = ? AND YEAR(fechaOtorgamiento) = ? ORDER BY fechaOtorgamiento");
			$stm->execute(array($mes,$año));
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorId($idApoyo){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM otrosapoyos WHERE idApoyo = ?");
			$stm->execute(array($idApoyo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorNombre($nombre){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM otrosapoyos WHERE nombre = ?");
			$stm->execute(array($nombre));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerApoyos($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT otrosapoyos.idApoyo,otrosapoyos.nombre,favorecidoapoyo.monto,favorecidoapoyo.fechaOtorgamiento FROM otrosapoyos INNER JOIN favorecidoapoyo ON otrosapoyos.idApoyo = favorecidoapoyo.idApoyo WHERE favorecidoapoyo.curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>
