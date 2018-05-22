<?php
class Tallerista{
	private $pdo;
    public $idTallerista;
    public $curp;
    public $nombre;
    public $aPaterno;
    public $aMaterno;
    public $domicilio;
    public $localidad;
    public $municipio;
    public $telefono;
    public $email;
    public $especialidad;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Tallerista $data){
		try {
			$sql = "INSERT INTO tallerista (curp,nombre,aPaterno,aMaterno,domicilio,localidad,municipio,telefono,email,especialidad) 
		        VALUES (?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->curp,
				    $data->nombre,
				    $data->aPaterno,
				    $data->aMaterno,
				    $data->domicilio,
				    $data->localidad,
				    $data->municipio,
				    $data->telefono,
				    $data->email,
				    $data->especialidad
                )
			);
		    return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'curp_exitente';
			}else{
				header('Location: index.php?c=Principal&a=ErrorConexion');
			}
		}
	}

	public function ObtenerPorCURP($curp){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tallerista WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorApellido($Apellido){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tallerista WHERE aPaterno = ? OR aMaterno = ?");
			$stm->execute(array($Apellido,$Apellido));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerTalleristasTotales(){
		try {
			$stm = $this->pdo->prepare("SELECT count(*) AS numero FROM tallerista");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	// public function Actualizar($data){
	// 	try {
	// 		$sql = "UPDATE artesano SET 
	// 			    nombre = ?,
	// 			    aPaterno = ?,
	// 			    aMaterno = ?,
	// 			    domicilio = ?,
	// 			    localidad = ?,
	// 			    municipio = ?,
	// 			    telefono = ?,
	// 			    email = ?,
	// 			    especialidad = ?
	// 			    WHERE curp = ?";
	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(				
	// 				    $data->nombre,
	// 				    $data->aPaterno,
	// 				    $data->aMaterno,
	// 				    $data->domicilio,
	// 			    	$data->localidad,
	// 			    	$data->municipio,
	// 				    $data->telefono,
	// 				    $data->email,
	// 				    $data->especialidad,
	// 				    $data->curp
 //                	)
	// 			);
	// 		return 'exito';
	// 	} catch (Exception $e){
	// 		die($e->getMessage());
	// 	}
	// }
}
?>