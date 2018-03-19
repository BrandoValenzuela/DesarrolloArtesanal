<?php  
class Sesion{
	private $pdo;
    public $usuario;
    public $contraseña;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();   
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
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function cerrarSesion(){
		session_start();
		session_unset();
		header('Location: index.php');
	}
}
?>