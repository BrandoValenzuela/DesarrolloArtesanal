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
        $resultado = $this->model->verificarCredenciales($sesion);
        if (!empty($resultado)) {
            $_SESSION['usuario'] = $_REQUEST['usuario'];
            echo "success";
        }else{
            echo "fail";
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