<?php
require_once 'model/sesion.php';
class SesionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Sesion();
    }
    
    public function Index(){
        if (!empty($_SESSION)) {
            header('Location: index.php?c=Principal');
        }
        require_once 'view/sesion.php';
    }
    
    public function IniciarSesion(){
        $sesion = new Sesion();
        $sesion->usuario = $_REQUEST['usuario'];
        $sesion->contraseña = $_REQUEST['contraseña'];
        $usuario = $this->model->verificarCredenciales($sesion);
        if (!empty($usuario)) {
            $_SESSION = ['usuario' => $usuario->nombre, 'permisos' => $usuario->permisos];
            $GLOBALS['permisos'] = $_SESSION['permisos'];
            if ($usuario->permisos == 0) {
                header('location: ?c=Principal');
            }else{
                header('location: ?c=Principal&a=IndexAdministracion');
            }
        }
        else{
            $mensaje = array(
                    'titulo' => 'Sesion no iniciada',
                    'cuerpo' => 'El usuario o contraseña son incorrectos.<br>Vuelve a intentar.'
                );
            $redireccion = 'index.php';
            include_once 'view/sesion.php';
            require_once 'view/modal-mensajes.php';
        }
    }
    
    public function CerrarSesion(){
        $sesion = new Sesion();
        $resultado = $this->model->cerrarSesion();
    }

    public function ErrorConexion(){
        require_once 'view/error.php';
    }
}
?>