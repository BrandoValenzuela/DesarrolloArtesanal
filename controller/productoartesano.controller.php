<?php
require_once 'model/productoartesano.php';

class ProductoartesanoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ProductoArtesano();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
//     $artesano = new Artesano();
//     if(isset($_REQUEST['id'])){
//         $artesano = $this->model->Obtener($_REQUEST['id']);
//     }
        require_once 'view/header.php';
        require_once 'view/producto/producto-agregar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $productos = new ProductoArtesano();    
        $productos->curp = $_REQUEST['curp-artesano'];
        $productos->idProducto = array_slice($_REQUEST['productos'],1);
        // print_r($productos->idProducto);
        // $resultado = $this->model->Registrar($producto);
        // if ($resultado == 'exito') {
        //     $mensaje = array(
        //         'titulo' => 'Exito',
        //         'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
        //     );
        //     $this->mostrarMensaje($mensaje);
        // }else{
        //     $mensaje = array(
        //         'titulo' => 'Producto existente',
        //         'cuerpo' => 'Ya existe registrado un producto con el nombre "'.$_REQUEST['nombre-producto'].'".'
        //     );
        //     $this->mostrarMensaje($mensaje);
        // }
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

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }

    // public function Eliminar(){
    //     $this->model->Eliminar($_REQUEST['id']);
    //     header('Location: index.php?c=Alumno');
    // }
}
?>