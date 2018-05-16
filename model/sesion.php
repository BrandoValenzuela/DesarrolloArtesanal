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
			$stm = $this->pdo->prepare("SELECT nombre,contrasenia FROM usuario WHERE nombre = ? AND contrasenia = ?");
			$stm->execute(
				array(
                    $data->usuario, 
                    $data->contraseña
				)
			);
			$resultado = $stm->fetch(PDO::FETCH_OBJ);
			return $acceso = !empty($resultado) ? "acceso_concedido" : "acceso_denegado";
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cerrarSesion(){
		session_start();
		session_unset();
		header('Location: index.php?c=Sesion&a=Index');
	}
}
?>