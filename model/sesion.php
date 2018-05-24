<?php  
class Sesion{
	private $pdo;
    public $usuario;
    public $contraseña;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();   
		}catch(Exception $e){
			header("Location: index.php?c=Sesion&a=ErrorConexion");
		}
	}

	public function verificarCredenciales(Sesion $data){
		try{
			$stm = $this->pdo->prepare("SELECT nombre,permisos FROM usuario WHERE apodo = ? AND contrasenia = ?");
			$stm->execute(
				array(
                    $data->usuario, 
                    $data->contraseña
				)
			);
			$resultado = $stm->fetch(PDO::FETCH_OBJ);
			return $resultado;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cerrarSesion(){
		session_start();
		session_unset();
		session_destroy();
		header('Location: index.php?c=Sesion&a=Index');
	}
}
?>