<?php
class Secretario{
	private $pdo;
    public $nombre;
    public $apodo;
    public $contrasenia;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Secretario $data){
		try {
			$registro = $this->verificarRegistroSecretario($data->nombre,$data->apodo);
			if (empty($registro)) {
				$sql = "INSERT INTO usuario (nombre,apodo,contrasenia,permisos) 
			        VALUES (?,?,?,?)";
				$this->pdo->prepare($sql)
			     ->execute(
					array(
					    $data->nombre,
					    $data->apodo,
					    $data->contrasenia,
					    '0'
	                )
				);
		    	return 'exito';
			}else{
				return 'registro_existente';
			}
		}catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Eliminar($idSecretario){
		try {
			$stm = $this->pdo->prepare("DELETE FROM usuario WHERE idUsuario = ?");
			$stm->execute(array($idSecretario));
			return 'exito';
		}catch (Exception $e){
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Listar(){
		try {
			$stm = $this->pdo->prepare("SELECT idUsuario,nombre,apodo,permisos FROM usuario WHERE permisos = '0'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch (Exception $e){
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}	

	public function verificarRegistroSecretario($nombre,$apodo){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE nombre = ? AND apodo = ?");
			$stm->execute(array($nombre,$apodo));
	    	return $stm->fetch(PDO::FETCH_OBJ);
		}catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>