<?php  
class Sesion{
	private $pdo;
    public $usuario;
    public $contraseña;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();   
		}catch(Exception $e){}
	}

	public function verificarCredenciales($data){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT nombre,contrasenia FROM usuario WHERE nombre = ? AND contrasenia = ? Limit 1");
			$stm->execute(
				array(
                    $data->usuario, 
                    $data->contraseña
				)
			);
			$stm->fetchAll(PDO::FETCH_OBJ);
			return $resultado = !empty($stm) ? "acceso_concedido" : "acceso_denegado";
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