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
	public $grupoEtnico;
    public $sexo;
    public $edad;
    public $telefonoFijo;
    public $telefonoCel;
    public $email;
    public $facebook;
    public $twitter;
    public $instagram;
    public $idRamaArtesanal;
    public $idCorredor;
    public $anioInicioOficio;
    public $tipoActividad;
    public $actividadPrincipal;
    public $aprendizajeOficio;
    public $perioricidad;
    public $ingresoMensual;
    public $gastoMensual;
    public $perteneceTaller;
    public $trabajoDomicilio;
    public $propiedadLugarTrabajo;
    public $tipoVenta;    
    public $anioInicioSDA;
    public $quiz;
    public $rfc;
    public $fechaAltaRFC;
    public $participacionAsocPasada;
    public $participacionAsocActual;
    public $nombreAsocActual;
    public $fidelidadRamaArtesanal;
    public $satisfaccion;
    public $necesidadesPrioritarias;
    public $folio;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Artesano $data){
		try {
			$folio = $this->GenerarFolioArtesano();
			$sql = "INSERT INTO artesano (curp,nombre,aPaterno,aMaterno,domicilio,localidad,municipio,grupoEtnico,sexo,edad,telefonoFijo,telefonoCel,email,facebook,twitter,instagram,idRamaArtesanal,idCorredor,anioInicioOficio,tipoActividad,actividadPrincipal,aprendizajeOficio,perioricidad,ingresoMensual,gastoMensual,perteneceTaller,trabajoDomicilio,propiedadLugarTrabajo,tipoVenta,anioInicioSDA,quiz,rfc,fechaAltaRFC,participacionAsocPasada,participacionAsocActual,nombreAsocActual,fidelidadRamaArtesanal,satisfaccion,necesidadesPrioritarias,folio) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
					$data->grupoEtnico,
				    $data->sexo,
				    $data->edad,
				    $data->telefonoFijo,
				    $data->telefonoCel,
				    $data->email,
				    $data->facebook,
				    $data->twitter,
				    $data->instagram,
				    $data->idRamaArtesanal,
				    $data->idCorredor,
				    $data->anioInicioOficio,
				    $data->tipoActividad,
				    $data->actividadPrincipal,
				    $data->aprendizajeOficio,
				    $data->perioricidad,
				    $data->ingresoMensual,
				    $data->gastoMensual,
				    $data->perteneceTaller,
				    $data->trabajoDomicilio,
				    $data->propiedadLugarTrabajo,
				    $data->tipoVenta,
				    $data->anioInicioSDA,
				    $data->quiz,
				    $data->rfc,
				    $data->fechaAltaRFC,
				    $data->participacionAsocPasada,
				    $data->participacionAsocActual,
				    $data->nombreAsocActual,
				    $data->fidelidadRamaArtesanal,
				    $data->satisfaccion,
				    $data->necesidadesPrioritarias,
				    $folio
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

	public function ObtenerPorRama($idRamaArtesanal){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM artesano WHERE idRamaArtesanal = ?");
			$stm->execute(array($idRamaArtesanal));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}	

	public function ObtenerPorProducto($idProducto){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT * FROM artesano INNER JOIN produccionartesano ON artesano.curp = produccionartesano.curp WHERE produccionartesano.idProducto = ?");
			$stm->execute(array($idProducto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function GenerarFolioArtesano(){
		try {
			$stm = $this->pdo
			          ->prepare("SELECT contador+1 AS cont, LPAD(contador+1,4,'0') AS semi_folio FROM folio WHERE idFolio = 0");
			$stm->execute();
			$num_artesano = $stm->fetch(PDO::FETCH_OBJ);
			$folio = $num_artesano->semi_folio.date('Y');
			$stm = $this->pdo
			          ->prepare("UPDATE folio SET contador = ? WHERE idFolio = 0");
			$stm->execute(array($num_artesano->cont));
			return $folio;
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerTotalArtesanos(){
		try {
			$stm = $this->pdo->prepare('SELECT count(*) AS numero FROM artesano');
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('Location: index.php?c=Principal&a=ErrorConexion');	
		}
	}

	public function Actualizar($data){
		try {
			$sql = "UPDATE artesano SET 
					idRamaArtesanal = ?,
					idCorredor = ?,
				    nombre = ?,
				    aPaterno = ?,
				    aMaterno = ?,
				    domicilio = ?,
				    localidad = ?,
				    municipio = ?,
					grupoEtnico = ?,
				    sexo = ?,
				    edad = ?,
				    telefonoFijo = ?,
				    telefonoCel = ?,
				    email = ?,
				    facebook = ?,
				    twitter = ?,
				    instagram = ?,
				    anioInicioOficio = ?,
				    tipoActividad = ?,
				    actividadPrincipal = ?,
				    aprendizajeOficio = ?,
				    perioricidad = ?,
				    ingresoMensual = ?,
				    gastoMensual = ?,
				    perteneceTaller = ?,
				    trabajoDomicilio = ?,
				    propiedadLugarTrabajo = ?,
				    tipoVenta = ?,
				    anioInicioSDA = ?,
				    quiz = ?,
				    rfc = ?,
				    fechaAltaRFC = ?,
				    participacionAsocPasada = ?,
				    participacionAsocActual = ?,
				    nombreAsocActual = ?,
				    fidelidadRamaArtesanal = ?,
				    satisfaccion = ?,
				    necesidadesPrioritarias = ?,
				    folio = ?
				    WHERE curp = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(				
						$data->idRamaArtesanal,
						$data->idCorredor,
					    $data->nombre,
					    $data->aPaterno,
					    $data->aMaterno,
					    $data->domicilio,
					    $data->localidad,
					    $data->municipio,
						$data->grupoEtnico,
					    $data->sexo,
					    $data->edad,
					    $data->telefonoFijo,
					    $data->telefonoCel,
					    $data->email,
					    $data->facebook,
					    $data->twitter,
					    $data->instagram,
					    $data->anioInicioOficio,
					    $data->tipoActividad,
					    $data->actividadPrincipal,
					    $data->aprendizajeOficio,
					    $data->perioricidad,
					    $data->ingresoMensual,
					    $data->gastoMensual,
					    $data->perteneceTaller,
					    $data->trabajoDomicilio,
					    $data->propiedadLugarTrabajo,
					    $data->tipoVenta,
					    $data->anioInicioSDA,
					    $data->quiz,
					    $data->rfc,
					    $data->fechaAltaRFC,
					    $data->participacionAsocPasada,
					    $data->participacionAsocActual,
					    $data->nombreAsocActual,
					    $data->fidelidadRamaArtesanal,
					    $data->satisfaccion,
					    $data->necesidadesPrioritarias,
					    $data->folio,
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