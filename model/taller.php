<?php
require_once 'artesano.php';

class Taller{
	private $pdo;
    public $CURP;
    public $ParticipacionArtesano;
    public $idRamaArtesanal;
    public $Nombre;
    public $Direccion;
    public $Localidad;
    public $Municipio;
    public $EmpleosTC;
    public $EmpleosHR;
    public $EmpleosIMSS;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Taller $data){
		try {
			$artesano = new Artesano();
			$resultado = $artesano->Obtener($data->CURP);
			if (!empty($resultado)) {
				$sql = "INSERT INTO taller (curp,tipoParticipacion,nombre,domicilio,localidad,municipio,idRamaArtesanal,empTiempoCompleto,empPorHora,empIMSS) 
			        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$this->pdo->prepare($sql)->execute(
					array(
	                    $data->CURP,
	                    $data->ParticipacionArtesano, 
	                    $data->Nombre, 
	                    $data->Direccion,
	                    $data->Localidad,
	                    $data->Municipio, 
	                    $data->idRamaArtesanal, 
	                    $data->EmpleosTC,
	  					$data->EmpleosHR,
	                    $data->EmpleosIMSS
	                )
				);
				return 'exito';
			}else{
				return 'no_existe';
			}
		}catch (Exception $e) {
			return 'fail';
		}
	}

	// public function ObtenerTallerArtesano($curp){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM taller WHERE curp = ?");
	// 		$stm->execute(array($curp));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 	}
	// }

	// public function ObtenerTalleresMunicipio($municipio){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM taller WHERE municipio = ?");
	// 		$stm->execute(array($municipio));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 	}
	// }

	// public function ObtenerTalleresRamaArtesanal($idRama){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM taller WHERE idRamaArtesanal = ?");
	// 		$stm->execute(array($idRama));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 	}
	// }

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