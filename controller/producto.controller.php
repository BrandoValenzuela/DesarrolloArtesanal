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
        $ramas = $_SESSION['ramas'];
        $artesanos = $_SESSION['artesanos'];
        $talleres = $_SESSION['talleres'];
        $productos = $_SESSION['productos'];
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }

    // public function Buscar(){
    //     if (empty($_SESSION)) {
    //         header('Location: index.php');
    //     }
    //     if (!empty($_REQUEST['buscar-id-expo'])) {
    //         $_SESSION['buscar-id-expo'] = $_REQUEST['buscar-id-expo'];
    //         $_SESSION['buscar-nombre-expo'] = $_REQUEST['buscar-id-expo'];
    //         $expo = $this->model->Obtener($_REQUEST['buscar-id-expo']);
    //         $nombre = $_REQUEST['buscar-nombre-expo'];
    //     }else{
    //         $municipio = $_SESSION['buscar-id-expo'];
    //         $expo = $this->model->Obtener($_SESSION['buscar-id-expo']);
    //         $nombre = $_SESSION['buscar-nombre-expo'];
    //     }
    //     if (!empty($expo)) {
    //         $artesano_expo = new ArtesanoExpo();
    //         $participantes = $artesano_expo->ObtenerParticipantes($expo->idExposicion);
    //         require_once 'view/header.php';
    //         require_once 'view/exposicion/exposicion.php';
    //         require_once 'view/footer.php'; 
    //     }else{
    //         $mensaje = array(
    //             'titulo' => 'No hay exposiciones.',
    //             'cuerpo' => 'No se encontraron exposiciones con el nombre "'.$nombre.'"'
    //         );
    //         $this->mostrarMensaje($mensaje);
    //     }
    // }

    // public function BuscarPorMunEnt(){
    //     if (empty($_SESSION)) {
    //         header('Location: index.php');
    //     }
    //     if (!empty($_REQUEST['buscar-expo-munent'])) {
    //         $_SESSION['buscar-expo-munent'] = $_REQUEST['buscar-expo-munent'];
    //         $municipio = $_REQUEST['buscar-expo-munent'];
    //         $exposiciones = $this->model->ObtenerPorMunEnt($_REQUEST['buscar-expo-munent']);
    //     }else{
    //         $municipio = $_SESSION['buscar-expo-munent'];
    //         $exposiciones = $this->model->ObtenerPorMunEnt($_SESSION['buscar-expo-munent']);
    //     }
    //     if (!empty($exposiciones)) { 
    //         require_once 'view/header.php';
    //         require_once 'view/exposicion/exposicion-lista.php';
    //         require_once 'view/footer.php'; 
    //     }else{
    //         $mensaje = array(
    //             'titulo' => 'No hay exposiciones.',
    //             'cuerpo' => 'No se encontraron exposiciones en el municipio o entidad que ingresaste.'
    //         );
    //         $this->mostrarMensaje($mensaje);
    //     }
    // }
}
?>