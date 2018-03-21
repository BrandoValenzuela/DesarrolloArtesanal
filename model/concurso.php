<?php
class Concurso{
	private $pdo;
    public $Nombre;
    public $Direccion;
    public $Municipio;
    public $Entidad;
    public $Alcance;
    public $Fecha;
    public $MontoTotalEstatal;
    public $MontoTotalFederal;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Concurso $data){
		try {
			$sql = "INSERT INTO concurso (nombre,domicilio,municipio,entidad,alcance,fecha,montoTotalEstatal,montoTotalFederal) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->Nombre, 
                    $data->Direccion,
                    $data->Municipio, 
  					$data->Entidad,
                    $data->Alcance, 
                    $data->Fecha,
                    $data->MontoTotalEstatal,
                    $data->MontoTotalFederal
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

	// public function Obtener($nombre){
	// 	try {
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE nombre = ?");
	// 		$stm->execute(array($nombre));
	// 		return $stm->fetch(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 	}
	// }

	// public function ObtenerPorMunEnt($munent){
	// 	try {
	// 		$pattern = '%'.$munent.'%';
	// 		$result = array();
	// 		$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE municipio Like ? OR entidad Like ?");
	// 		$stm->execute(array($pattern,$pattern));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 		// return $e->getMessage();

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
