<?php
require_once 'model/talleristacapacitacion.php';

class TalleristacapacitacionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new TalleristaCapacitacion();
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
        require_once 'view/capacitaciones/tallerista-capacitacion-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $tallerista_capacitacion = new TalleristaCapacitacion();
        if (!empty($_REQUEST['id-capacitacion'])) {
            $tallerista_capacitacion->idCapacitacion = $_REQUEST['id-capacitacion'];
            $tallerista_capacitacion->curp = $_REQUEST['curp-tallerista-capacitacion'];
            $tallerista_capacitacion->pagoTallerista = $_REQUEST['pago-tallerista-capacitacion'];
            $tallerista_capacitacion->formaPago = $_REQUEST['forma-pago-tallerista'];
            $tallerista_capacitacion->registroIndividuo = $_REQUEST['registro'];
            $resultado = $this->model->Registrar($tallerista_capacitacion);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
                $this->mostrarMensaje($mensaje);
            }else{
                if ($resultado == 'nombre_existente') {
                    $mensaje = array(
                        'titulo' => 'Tallerista ya inscrito',
                        'cuerpo' => 'Este tallerista ya se encuentra registrado en la capacitación:<br>'.$_SESSION['nombre-capacitacion']
                    );
                }elseif ($resultado == 'registro_inexistente'){
                    $mensaje = array(
                        'titulo' => 'CURP no encontrada',
                        'cuerpo' => 'La CURP que ingresaste no se encuentró en el sistema.</br>Para guardar la información que ingresaste, el tallerista debe estar registrado en el sistema.'
                    );
                }
                $this->mostrarMensaje($mensaje);
            }
        }else{
            header('Location: index.php?c=Principal');
        }  
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = 'index.php?c=Capacitacion&a=BuscarPorId';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>