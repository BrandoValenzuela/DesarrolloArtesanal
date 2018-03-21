<?php
require_once 'model/concurso.php';
// require_once 'model/artesanoexpo.php';

class ConcursoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Concurso();
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
        require_once 'view/concurso/concurso-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $concurso = new Concurso();    
        $concurso->Nombre = $_REQUEST['nombre-concurso'];
        $concurso->Direccion = $_REQUEST['direccion-concurso'];
        $concurso->Municipio = $_REQUEST['municipio-concurso'];
        $concurso->Entidad = $_REQUEST['entidad-concurso'];
        $concurso->Alcance = $_REQUEST['alcance-concurso'];
        $concurso->Fecha = $_REQUEST['fecha-concurso'];
        $concurso->MontoTotalEstatal = $_REQUEST['mte-concurso'];
        $concurso->MontoTotalFederal = $_REQUEST['mtf-concurso'];
        $resultado = $this->model->Registrar($concurso);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Exito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
            $this->mostrarMensaje($mensaje);
        }else{
            $mensaje = array(
                'titulo' => 'Concurso existente',
                'cuerpo' => 'Ya existe registrado un concurso con el nombre:<br>"'.$_REQUEST['nombre-concurso'].'".'
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
    //     $expo = $this->model->Obtener($_REQUEST['buscar-expo']);
    //     $nombre = $_REQUEST['buscar-expo'];
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