<?php
require_once 'model/exposicion.php';
require_once 'model/participanteexpo.php';

class ExposicionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Exposicion();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
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
    }

    public function BuscarPorId(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-expo'])) {
            $_SESSION['buscar-id-expo'] = $_REQUEST['buscar-id-expo'];
            $_SESSION['buscar-nombre-expo'] = $_REQUEST['buscar-id-expo'];
            $expo = $this->model->ObtenerPorId($_REQUEST['buscar-id-expo']);
            $nombre = $_REQUEST['buscar-nombre-expo'];
        }else{
            $municipio = $_SESSION['buscar-id-expo'];
            $expo = $this->model->ObtenerPorId($_SESSION['buscar-id-expo']);
            $nombre = $_SESSION['buscar-nombre-expo'];
        }
        if (!empty($expo)) {
            $artesano_expo = new ParticipanteExpo();
            $participantes = $artesano_expo->ObtenerParticipantes($expo->idExposicion);
            require_once 'view/header.php';
            require_once 'view/exposicion/exposicion.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay exposiciones.',
                'cuerpo' => 'No se encontraron exposiciones con el nombre "'.$nombre.'"'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorMunicipioEntidad(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-expo-munent'])) {
            $_SESSION['buscar-expo-munent'] = $_REQUEST['buscar-expo-munent'];
            $municipio = $_REQUEST['buscar-expo-munent'];
            $exposiciones = $this->model->ObtenerPorMunicipioEntidad($_REQUEST['buscar-expo-munent']);
        }else{
            $municipio = $_SESSION['buscar-expo-munent'];
            $exposiciones = $this->model->ObtenerPorMunicipioEntidad($_SESSION['buscar-expo-munent']);
        }
        if (!empty($exposiciones)) { 
            require_once 'view/header.php';
            require_once 'view/exposicion/exposicion-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay exposiciones.',
                'cuerpo' => 'No se encontraron exposiciones en el municipio o entidad que ingresaste.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>