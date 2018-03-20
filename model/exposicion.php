<?php
class Exposicion{
	private $pdo;
    public $Nombre;
    public $Direccion;
    public $Localidad;
    public $Municipio;
    public $Entidad;
    public $FechaInicioExpo;
    public $FechaFinExpo;
    public $TipoApoyo;
    public $IngresosExpo;
    public $InversionExpo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Exposicion $data){
		try {
			$sql = "INSERT INTO exposicion (nombre,fechaInicio,fechaFin,domicilio,localidad,municipio,entidad,tipoApoyo,ingresoTotal,montoInvertido) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->Nombre, 
                    $data->FechaInicioExpo, 
                    $data->FechaFinExpo,
                    $data->Direccion,
                    $data->Localidad,
                    $data->Municipio, 
  					$data->Entidad,
                    $data->TipoApoyo,
                    $data->IngresosExpo,
                    $data->InversionExpo
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

	public function Obtener($idExposicion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM exposicion WHERE idExposicion = ?");
			$stm->execute(array($idExposicion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorMunEnt($munent){
		try {
			$pattern = '%'.$munent.'%';
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM exposicion WHERE municipio Like ? OR entidad Like ?");
			$stm->execute(array($pattern,$pattern));
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
