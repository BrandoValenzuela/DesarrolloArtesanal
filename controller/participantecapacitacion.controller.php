<?php
require_once 'model/participantecapacitacion.php';

class ParticipantecapacitacionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ParticipanteCapacitacion();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['nombre-capacitacion']) && !empty($_REQUEST['id-capacitacion'])) {
            $_SESSION['nombre-capacitacion'] = $_REQUEST['nombre-capacitacion'];
            $_SESSION['id-capacitacion'] = $_REQUEST['id-capacitacion'];
            $nombre_capacitacion = $_REQUEST['nombre-capacitacion'];
            $id_capacitacion = $_REQUEST['id-capacitacion'];
        }else{
            $nombre_capacitacion = $_SESSION['nombre-capacitacion'];
            $id_capacitacion = $_SESSION['id-capacitacion'];
        }
        require_once 'view/header.php';
        require_once 'view/capacitaciones/participante-capacitacion-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $artesano_capacitacion = new ParticipanteCapacitacion();
        if (!empty($_REQUEST['id-capacitacion'])) {
            $artesano_capacitacion->idCapacitacion = $_REQUEST['id-capacitacion'];
            $artesano_capacitacion->curp = $_REQUEST['curp-artesano-capacitacion'];
            $resultado = $this->model->Registrar($artesano_capacitacion);
            $mensaje = array(
                'titulo' => 'Datos registrados',
                'cuerpo' => $resultado
            );
            $this->mostrarMensaje($mensaje);
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        if ($_SESSION['busqueda'] != 'CapacitacionPorNombre') {
            $redireccion = 'index.php?c=Capacitacion&a=BuscarPorId';
        }else{
            $redireccion = 'index.php?c=Capacitacion&a=BuscarPorNombre&nombre-concurso='.$_SESSION['nombre-capacitacion'];
        }
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>