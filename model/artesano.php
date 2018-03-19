<?php
class Artesano{
	private $pdo;
    public $id;
    public $CURP;
    public $Nombre;
    public $Apaterno;
    public $Amaterno;
    public $Direccion;
    public $Localidad;
    public $Municipio;
    public $idRamaArtesanal;
    public $FechaInicioOficio;
    public $FechaRegistroSDA;
    public $GastoMensual;
    public $IngresoMensual;
    public $TipoVenta;
    public $TrabajoDomicilio;
    public $PropTaller;
    public $TipoActividad;
    public $RFC;
    public $FechaAltaRFC;
    public $CUIS;
    public $AsocPasada;
    public $AsocActual;
    public $NombreAsocActual;
    public $Fidelidad;
    public $Satisfaccion;
    public $Necesidades;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::StartUp();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Artesano $data){
		try {
		$sql = "INSERT INTO artesano (curp,idRamaArtesanal,nombre,aPaterno,aMaterno,domicilio,localidad,municipio,anioInicioOficio,anioInicioSDA,ingresoMensual,gastoMensual,trabajoDomicilio,propiedadTaller,tipoVenta,tipoActividad,rfc,fechaAltaRFC,quiz,participacionAsocPasada,participacionAsocActual,nombreAsocActual,fidelidadRamaArtesanal,satisfaccion,necesidadesPrioritarias) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->CURP,
                    $data->idRamaArtesanal, 
                    $data->Nombre, 
                    $data->Apaterno, 
                    $data->Amaterno,
                    $data->Direccion,
                    $data->Localidad,
                    $data->Municipio, 
                    $data->FechaInicioOficio,
  					$data->FechaRegistroSDA,
                    $data->IngresoMensual,
                    $data->GastoMensual,
                    $data->TrabajoDomicilio,
                    $data->PropTaller,
                    $data->TipoVenta,
                    $data->TipoActividad,
                    $data->RFC,
  					$data->FechaAltaRFC,
                    $data->CUIS,
                    $data->AsocPasada,
                    $data->AsocActual,
                    $data->NombreAsocActual, 
                    $data->Fidelidad, 
                    $data->Satisfaccion,
                    $data->Necesidades
                )
			);
		     return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'curp_exitente';
			}
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM artesano WHERE curp = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// public function ObtenerPorApellido($Apellido){
	// 	try {
	// 		$stm = $this->pdo
	// 		          ->prepare("SELECT * FROM artesano WHERE aPaterno = ? OR aMaterno = ?");
	// 		$stm->execute(array($Apellido,$Apellido));
	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	} catch (Exception $e) {
	// 		die($e->getMessage());
	// 	}
	// }

	// public function Listar(){
	// 	try
	// 	{
	// 		$result = array();

	// 		$stm = $this->pdo->prepare("SELECT * FROM alumnos");
	// 		$stm->execute();

	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	}
	// 	catch(Exception $e)
	// 	{
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