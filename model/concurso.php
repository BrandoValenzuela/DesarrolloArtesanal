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
			$this->pdo = Conexion::obtenerConexion();     
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

	public function ObtenerPorId($idConcurso){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE idConcurso = ?");
			$stm->execute(array($idConcurso));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorNombre($nombre){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE nombre = ?");
			$stm->execute(array($nombre));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorConcepto($concepto){
		try {
			$palabras = explode(" ",$concepto); 
   			$numero = count($palabras); 
			$result = array();
			if ($numero == 1) { 
				$pattern = '%'.$concepto.'%';
				$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE nombre Like ?");
				$stm->execute(array($pattern));
  			}elseif ($numero > 1) {
  				$stm = $this->pdo->prepare("SELECT *, MATCH(nombre) AGAINST(?) AS Score FROM concurso WHERE MATCH(nombre) AGAINST(?) ORDER BY Score DESC LIMIT 50");
				$stm->execute(array($concepto,$concepto));
  			}
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function ObtenerPorPeriodo($fi,$ff){
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM Concurso WHERE fecha BETWEEN ? AND ? ORDER BY fecha");
			$stm->execute(array($fi,$ff));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function ObtenerConcursosTotales(){
        try {
            $stm = $this->pdo->prepare('SELECT count(*) AS numero FROM concurso');
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
         	die($e->getMessage());   
        }
    }
}
?>
