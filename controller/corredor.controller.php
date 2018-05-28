<?php
require_once 'model/corredor.php';

class CorredorController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Corredor();
    }
     
    public function Guardar(){
        $corredor = new Corredor();
        if (!empty($_REQUEST['nuevo-corredor'])) {
            $_SESSION['nuevo-corredor'] = $_REQUEST['nuevo-corredor'];
            $corredor->nombre = $_REQUEST['nuevo-corredor'];
            $resultado = $this->model->Registrar($corredor);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Corredor existente',
                    'cuerpo' => 'El nombre de corredor que ingresaste ya se encontra registrado en el sistema.'
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