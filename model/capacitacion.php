<?php
class Capacitacion{
	private $pdo;
	public $idCapacitacion;
    public $nombre;
    public $idRamaArtesanal;
    public $otraArea;
    public $domicilio;
    public $localidad;
    public $municipio;
    public $fechaInicio;
    public $fechaFin;
    public $material;
    public $montoMaterial;
    public $observaciones;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(Capacitacion $data){
		try {
			$sql = "INSERT INTO capacitacion (nombre,idRamaArtesanal,otraArea,domicilio,localidad,municipio,fechaInicio,fechaFin,material,montoMaterial,observaciones) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
                    $data->nombre, 
                    $data->idRamaArtesanal,
                    $data->otraArea,
                    $data->domicilio,
                    $data->localidad,
                    $data->municipio, 
                    $data->fechaInicio,
                    $data->fechaFin,
  					$data->material,
                    $data->montoMaterial,
                    $data->observaciones
                )
			);
			return 'exito';
		}catch (Exception $e) {
			$mensaje = $e->getMessage();
			if (strpos($mensaje, 'SQLSTATE[23000]') !== false) {
				return 'nombre_existente';
			}else{
				// header('location: index.php?c=Principal&a=ErrorConexion');
				die($e->getMessage());
			}
		}
	}

	public function ObtenerPorId($idCapacitacion){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM capacitacion WHERE idCapacitacion = ?");
			$stm->execute(array($idCapacitacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	
	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM capacitacion WHERE fechaInicio BETWEEN ? AND ?");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			// header('location: index.php?c=Principal&a=ErrorConexion');
			die($e->getMessage());
		}
	}
}

?>
