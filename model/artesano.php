<?php
class Artesano{
	private $pdo;
    public $curp;
    public $nombre;
    public $aPaterno;
    public $aMaterno;
    public $domicilio;
    public $localidad;
    public $municipio;
    public $idRamaArtesanal;
    public $anioInicioOficio;
    public $anioInicioSDA;
    public $gastoMensual;
    public $ingresoMensual;
    public $tipoVenta;
    public $trabajoDomicilio;
    public $propiedadTaller;
    public $tipoActividad;
    public $rfc;
    public $fechaAltaRFC;
    public $quiz;
    public $participacionAsocPasada;
    public $participacionAsocActual;
    public $nombreAsocActual;
    public $fidelidadRamaArtesanal;
    public $satisfaccion;
    public $necesidadesPrioritarias;

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
                    $data->curp,
                    $data->idRamaArtesanal, 
                    $data->nombre, 
                    $data->aPaterno, 
                    $data->aMaterno,
                    $data->domicilio,
                    $data->localidad,
                    $data->municipio, 
                    $data->anioInicioOficio,
  					$data->anioInicioSDA,
                    $data->ingresoMensual,
                    $data->gastoMensual,
                    $data->trabajoDomicilio,
                    $data->propiedadTaller,
                    $data->tipoVenta,
                    $data->tipoActividad,
                    $data->rfc,
  					$data->fechaAltaRFC,
                    $data->quiz,
                    $data->participacionAsocPasada,
                    $data->participacionAsocActual,
                    $data->nombreAsocActual, 
                    $data->fidelidadRamaArtesanal, 
                    $data->satisfaccion,
                    $data->necesidadesPrioritarias
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

	public function Obtener($curp){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM artesano WHERE curp = ?");
			$stm->execute(array($curp));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorApellido($Apellido){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM artesano WHERE aPaterno = ? OR aMaterno = ?");
			$stm->execute(array($Apellido,$Apellido));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}


	public function Actualizar($data){
		try {
			$sql = "UPDATE artesano SET 
						idRamaArtesanal = ?,
						nombre = ?,
						aPaterno = ?,
						aMaterno = ?,
						domicilio = ?,
						localidad = ?,
						municipio = ?,
						anioInicioOficio = ?,
						anioInicioSDA = ?,
						ingresoMensual = ?,
						gastoMensual = ?,
						trabajoDomicilio = ?,
						propiedadTaller = ?,
						tipoVenta = ?,
						tipoActividad = ?,
						rfc = ?,fechaAltaRFC = ?,
						quiz = ?,participacionAsocPasada = ?,
						participacionAsocActual = ?,
						nombreAsocActual = ?,
						fidelidadRamaArtesanal = ?,
						satisfaccion = ?,
						necesidadesPrioritarias = ?
				    WHERE curp = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->idRamaArtesanal, 
                    $data->nombre, 
                    $data->aPaterno, 
                    $data->aMaterno,
                    $data->domicilio,
                    $data->localidad,
                    $data->municipio, 
                    $data->anioInicioOficio,
  					$data->anioInicioSDA,
                    $data->ingresoMensual,
                    $data->gastoMensual,
                    $data->trabajoDomicilio,
                    $data->propiedadTaller,
                    $data->tipoVenta,
                    $data->tipoActividad,
                    $data->rfc,
  					$data->fechaAltaRFC,
                    $data->quiz,
                    $data->participacionAsocPasada,
                    $data->participacionAsocActual,
                    $data->nombreAsocActual, 
                    $data->fidelidadRamaArtesanal, 
                    $data->satisfaccion,
                    $data->necesidadesPrioritarias,
                    $data->curp
                )
			);
			return 'exito';
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}
?>