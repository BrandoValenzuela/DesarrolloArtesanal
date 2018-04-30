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
        if ($resultado == 'acceso_concedido') {
            $_SESSION['usuario'] = $_REQUEST['usuario'];
            echo "acceso_concedido";
        }else if ($resultado == 'acceso_denegado') {
            echo "acceso_denegado";
        }else if ($resultado = 'conexion_nula') {
            echo "conexion_nula";
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