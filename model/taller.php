<?php
require_once 'artesano.php';

class Taller{
	private $pdo;
    public $curp;
    public $tipoParticipacion;
    public $nombre;
    public $domicilio;
    public $localidad;
    public $municipio;
    public $idRamaArtesanal;
    public $empTiempoCompleto;
    public $empPorHora;
    public $empIMSS;
    public $empTotales;
    public $ingresoMensual;
    public $gastoMensual;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Taller $data){
		try {
			$artesano = new Artesano();
			$resultado = $artesano->Obtener($data->curp);
			if (!empty($resultado)) {
				$sql = "INSERT INTO taller (curp,tipoParticipacion,nombre,domicilio,localidad,municipio,idRamaArtesanal,empTiempoCompleto,empPorHora,empIMSS,empTotales,ingresoMensual,gastoMensual) 
			        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->curp,
	                    $data->tipoParticipacion, 
	                    $data->nombre, 
	                    $data->domicilio,
	                    $data->localidad,
	                    $data->municipio, 
	                    $data->idRamaArtesanal, 
	                    $data->empTiempoCompleto,
	  					$data->empPorHora,
	                    $data->empIMSS,
	                    $data->empTotales,
	                    $data->ingresoMensual,
	                    $data->gastoMensual
	                )
				);
				return 'exito';
			}else{
				return 'no_existe';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Obtener($idTaller){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT taller.*,artesano.nombre AS nombreArt,artesano.aPaterno,artesano.aMaterno FROM taller INNER JOIN artesano ON taller.curp = artesano.curp WHERE idTaller = ?");
			$stm->execute(array($idTaller));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerTalleres(){
		try {
			$stm = $this->pdo->prepare("SELECT idTaller,nombre FROM taller");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');	
		}
	}

	public function ObtenerTalleresMunicipio($municipio){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM taller WHERE municipio = ?");
			$stm->execute(array($municipio));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerTallerArtesano($curp){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT idTaller,nombre,domicilio,localidad,municipio FROM taller WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerTalleresRamaArtesanal($idRama){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM taller WHERE idRamaArtesanal = ?");
			$stm->execute(array($idRama));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');	
		}
	}



	// public function Eliminar($id){
	// 	try {
	// 		$stm = $this->pdo
	// 		            ->prepare("DELETE FROM alumnos WHERE id = ?");			          

	// 		$stm->execute(array($id));
	// 	}catch (Exception $e){
	// 		die($e->getMessage());
	// 	}
	// }

	// public function Actualizar($data)
	// {
	// 	try 
	// 	{
	// 		$sql = "UPDATE alumnos SET 
	// 					Nombre          = ?, 
	// 					Apellido        = ?,
 //                        Correo        = ?,
	// 					Sexo            = ?, 
	// 					FechaNacimiento = ?
	// 			    WHERE id = ?";

	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(
 //                        $data->Nombre, 
 //                        $data->Correo,
 //                        $data->Apellido,
 //                        $data->Sexo,
 //                        $data->FechaNacimiento,
 //                        $data->id
	// 				)
	// 			);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }


}

?>