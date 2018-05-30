<?php
require_once 'model/tallerista.php';
require_once 'model/talleristacapacitacion.php';

class TalleristaController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Tallerista();
    }

    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $tallerista = new Tallerista();
        if(isset($_REQUEST['curp-tallerista-actualizar'])){
            $tallerista = $this->model->ObtenerPorCURP($_REQUEST['id-tallerista-actualizar']);
            $registrar_actualizar = $_REQUEST['registrar-actualizar'];
        }else{
            $registrar_actualizar = '0';
        }
        require_once 'view/header.php';
        require_once 'view/tallerista/tallerista-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $tallerista = new Tallerista();
        if (!empty($_REQUEST['curp-tallerista'])) {
            $tallerista->curp = $_REQUEST['curp-tallerista'];
            $tallerista->nombre = $_REQUEST['nombre-tallerista'];        
            $tallerista->aPaterno = $_REQUEST['aPaterno-tallerista'];
            $tallerista->aMaterno = $_REQUEST['aMaterno-tallerista'];
            $tallerista->domicilio = $_REQUEST['direccion-tallerista'];
            $tallerista->localidad = $_REQUEST['localidad-tallerista'];
            $tallerista->municipio = $_REQUEST['municipio-tallerista'];
            $tallerista->telefonoFijo = $_REQUEST['telefono-tallerista'];
            $tallerista->email = $_REQUEST['email-tallerista'];
            $tallerista->especialidad = $_REQUEST['especialidad-tallerista'];
            $registrar_actualizar = $_REQUEST['registrar-actualizar'];
            if ($registrar_actualizar == 0) {
                $resultado =  $this->model->Registrar($tallerista);          
            }elseif ($registrar_actualizar == 1) {
                $resultado =  $this->model->Actualizar($tallerista);
            }
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Éxito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Registro existente',
                    'cuerpo' => 'Los datos ingresados ya se encuentran registrados en el sistema.'
                );
            }
            $this->mostrarMensaje($mensaje);
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function BuscarPorCURP(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $tallerista_capacitaciones = new TalleristaCapacitacion();
        if (!empty($_REQUEST['buscar-tallerista-curp'])) {
            $_SESSION['buscar-tallerista-curp'] = $_REQUEST['buscar-tallerista-curp'];
            $tallerista = $this->model->ObtenerPorCURP($_REQUEST['buscar-tallerista-curp']);
        }else{
            $tallerista = $this->model->ObtenerPorCURP($_SESSION['buscar-tallerista-curp']);
        }
        if (!empty($tallerista)) {
            $capacitaciones = $tallerista_capacitaciones->ObtenerCapacitacionesTallerista($tallerista->curp);            
            require_once 'view/header.php';
            require_once 'view/tallerista/tallerista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Registro inexistente',
                'cuerpo' => 'La CURP que ingresaste no se encuentra registrada en el sistema.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorApellido(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-tallerista-ap'])) {
            $_SESSION['buscar-tallerista-ap'] = $_REQUEST['buscar-tallerista-ap'];
            $apellido = $_REQUEST['buscar-tallerista-ap'];
            $talleristas = $this->model->ObtenerPorApellido($_REQUEST['buscar-tallerista-ap']);
        }else{
            $apellido = $_SESSION['buscar-tallerista-ap'];
            $talleristas = $this->model->ObtenerPorApellido($_SESSION['buscar-tallerista-ap']);
        }
        if (!empty($talleristas)) {
            $_SESSION['busqueda'] = 'TalleristaPorApellido';
            $_SESSION['metodo-busqueda'] = 'BuscarPorApellido';
            require_once 'view/header.php';
            require_once 'view/tallerista/tallerista-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Registro inexistente',
                'cuerpo' => 'No hay talleristas registardos con el apellido '.$apellido
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = '?c=Principal&a=IndexCapacitaciones';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>
