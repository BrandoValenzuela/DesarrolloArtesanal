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
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Exposicion $data){
		try {
			$apoyos = '';
		    foreach ($data->TipoApoyo as $apoyo) {
		        $apoyos = $apoyos.', '.$apoyo;
		    }
		    $apoyos = substr($apoyos,1);
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
                    $apoyos,
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

	public function ObtenerPorId($idExposicion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM exposicion WHERE idExposicion = ?");
			$stm->execute(array($idExposicion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorMunicipioEntidad($munent){
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
	
	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM exposicion WHERE fechaInicio BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerExposTotales(){
		try {
			$stm = $this->pdo->prepare("SELECT count(*) AS numero FROM exposicion");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}

?>
