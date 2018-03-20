<?php
require_once 'model/exposicion.php';
// require_once 'model/artesanoexpo.php';

class ExposicionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Exposicion();
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
        require_once 'view/exposicion/exposicion-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $exposicion = new Exposicion();    
        $exposicion->Nombre = $_REQUEST['nombre-expo'];
        $exposicion->Direccion = $_REQUEST['direccion-expo'];
        $exposicion->Localidad = $_REQUEST['localidad-expo'];
        $exposicion->Municipio = $_REQUEST['municipio-expo'];
        $exposicion->Entidad = $_REQUEST['entidad-expo'];
        $exposicion->FechaInicioExpo = $_REQUEST['fecha-inicio-expo'];
        $exposicion->FechaFinExpo = $_REQUEST['fecha-fin-expo'];
        $exposicion->TipoApoyo = $_REQUEST['tipo-apoyo-expo'];
        $exposicion->IngresosExpo = $_REQUEST['ingreso-expo'];
        $exposicion->InversionExpo = $_REQUEST['inversion-expo'];
        $resultado = $this->model->Registrar($exposicion);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Exito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
            $this->mostrarMensaje($mensaje);
        }else{
            $mensaje = array(
                'titulo' => 'Exposición existente',
                'cuerpo' => 'Ya existe registrado una exposición con el nombre "'.$_REQUEST['nombre-expo'].'".'
            );
            $this->mostrarMensaje($mensaje);
        }
        // $artesano->id > 0 
        //     ? $this->model->Actualizar($artesano)
        //     : $this->model->Registrar($artesano);
    }

    // public function Buscar(){
    //     if (empty($_SESSION)) {
    //         header('Location: index.php');
    //     }
    //     if (!isset($_REQUEST['buscar-expo'])) {
    //         header('location: index.php?c=Principal');
    //     }
    //     $expo = $this->model->Obtener($_REQUEST['buscar-id-expo']);
    //     $nombre = $_REQUEST['buscar-nombre-expo'];
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
    //         require_once 'view/header.php';
    //         require_once 'view/principal.php';
    //         require_once 'view/modal-mensajes.php';
    //         require_once 'view/footer.php';
    //     }
    // }

    // public function BuscarPorMunEnt(){
    //     if (empty($_SESSION)) {
    //         header('Location: index.php');
    //     }
    //     if (isset($_REQUEST['buscar-expo-munent'])) {
    //         $_SESSION['buscar-expo-munent'] = $_REQUEST['buscar-expo-munent'];
    //     }else{
    //         $_REQUEST['buscar-expo-munent'] = $_SESSION['buscar-expo-munent'];
    //     }
    //     $exposiciones = $this->model->ObtenerPorMunEnt($_REQUEST['buscar-expo-munent']);
    //     if (!empty($exposiciones)) { 
    //         $municipio = $_REQUEST['buscar-expo-munent'];
    //         require_once 'view/header.php';
    //         require_once 'view/exposicion/exposicion-lista.php';
    //         require_once 'view/footer.php'; 
    //     }else{
    //         $mensaje = array(
    //             'titulo' => 'No hay exposiciones.',
    //             'cuerpo' => 'No se encontraron exposiciones en el municipio o entidad que ingresaste.'
    //         );
    //         require_once 'view/header.php';
    //         require_once 'view/principal.php';
    //         require_once 'view/modal-mensajes.php';
    //         require_once 'view/footer.php';
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