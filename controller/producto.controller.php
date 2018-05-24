<?php
require_once 'model/producto.php';

class ProductoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
     
    public function Guardar(){
        $producto = new Producto();
        if (!empty($_REQUEST['nuevo-producto'])) {
            $_SESSION['nuevo-producto'] = $_REQUEST['nuevo-producto'];
            $producto->nombre = $_REQUEST['nuevo-producto'];
            $resultado = $this->model->Registrar($producto);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Producto ya existente',
                    'cuerpo' => 'El producto que ingresaste ya se encontra registrado en el sistema.'
                );
            }
            $this->mostrarMensaje($mensaje);
        }else{
            header('location: index.php?c=Principal');
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = '?c=Principal&a=Index';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>