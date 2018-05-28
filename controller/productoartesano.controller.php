<?php
require_once 'model/productoartesano.php';
require_once 'model/producto.php';

class ProductoartesanoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ProductoArtesano();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['curp-artesano'])) {
            $_SESSION['curp-artesano'] = $_REQUEST['curp-artesano'];            
            $curp_artesano = $_REQUEST['curp-artesano'];
        }else{
            $curp_artesano = $_SESSION['curp-artesano'];
        }
        $Producto = new Producto();
        $productos = $Producto->Listar();
        require_once 'view/header.php';
        require_once 'view/producto/producto-agregar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $productos = new ProductoArtesano();
        if (!empty($_REQUEST['curp-artesano'])) {
            $productos->curp = $_REQUEST['curp-artesano'];
            $productos->idProducto = $_REQUEST['producto-artesano'];
            $resultado = $this->model->Registrar($productos);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Atencion',
                    'cuerpo' => 'Algunos productos que se ingresaron ya habían sido registrados con anterioridad.<br>Sin embargo, los datos se almacenaron con exito.'
                );
            }
            $this->mostrarMensaje($mensaje);
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = '?c=Artesano&a=BuscarPorCURP';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>