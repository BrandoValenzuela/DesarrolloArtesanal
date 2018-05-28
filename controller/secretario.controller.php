<?php
require_once 'model/secretario.php';

class SecretarioController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Secretario();
    }
     
    public function Guardar(){
        $secretario = new Secretario();
        if (!empty($_REQUEST['nombre-secretario-sistema'])) {
            $secretario->nombre = $_REQUEST['nombre-secretario-sistema'];
            $secretario->apodo = $_REQUEST['ID-secretario'];
            $secretario->contrasenia = $_REQUEST['contraseña-secretario'];
            $resultado = $this->model->Registrar($secretario);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }elseif ($resultado == 'registro_existente'){
                $mensaje = array(
                    'titulo' => 'Usuario registrado',
                    'cuerpo' => 'Los datos que ingresaste ya se encuentran almacenados en el sistema.'
                );
            }
            $this->mostrarMensaje($mensaje);
        } else{
            header('Location: index.php?c=Principal&a=IndexAdministracion');
        }
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id-secretario']);
        $mensaje = array(
            'titulo' => 'Exito',
            'cuerpo' => 'El registro fue eliminado sin problemas.'
        );
        $this->mostrarMensaje($mensaje);
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = 'index.php?c=Principal&a=IndexAdministracion';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>