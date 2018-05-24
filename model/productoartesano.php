<?php
class ProductoArtesano{
	private $pdo;
    public $curp;
    public $idProducto;
   
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::obtenerConexion();     
		}catch(Exception $e){
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function Registrar(ProductoArtesano $data){
		try {
			$productos_previamente_registrados = 0;			
			while (true) {
				$producto = current($data->idProducto);
				$registro = $this->verificarProductoArtesano($data->curp,$producto);
				if (empty($registro)) {
					$sql = "INSERT INTO produccionartesano (curp,idProducto) VALUES (?, ?)";
					$this->pdo->prepare($sql)->execute(
						array(
		                    $data->curp,
		                    $producto
		                )
					);
				}else{
					$productos_previamente_registrados++;
				}
				$producto = next($data->idProducto);
				if ($producto === false) {
					break;
				}
			}
			if ($productos_previamente_registrados > 0) {
				return 'exito_con_observación';
			}else{
				return 'exito';
			}
		}catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}

	public function verificarProductoArtesano($curp,$idProducto){
		try {
			$stm = $this->pdo->prepare("SELECT * FROM produccionartesano WHERE curp = ? AND idProducto = ?");
			$stm->execute(array($curp,$idProducto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerProductosArtesano($curp){
		try {			
			$stm = $this->pdo->prepare("SELECT producto.nombre FROM produccionartesano INNER JOIN producto ON produccionartesano.idProducto = producto.idProducto WHERE produccionartesano.curp = ?");
			$stm->execute(array($curp));
  			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			header('location: index.php?c=Principal&a=ErrorConexion');
		}
	}
}
?>
