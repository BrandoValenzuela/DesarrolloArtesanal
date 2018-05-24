<?php
require_once 'model/ramaartesanal.php';

class RamaartesanalController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new RamaArtesanal();
    }
     
    public function Guardar(){
        $rama = new RamaArtesanal();
        if (!empty($_REQUEST['nueva-rama-artesanal'])) {
            $rama->nombre = $_REQUEST['nueva-rama-artesanal'];
            $resultado = $this->model->Registrar($rama);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Rama ya existente',
                    'cuerpo' => 'La rama artesanal que ingresaste ya se encontra registrada en el sistema.'
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