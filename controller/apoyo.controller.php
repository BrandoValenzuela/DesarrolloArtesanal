<?php
require_once 'model/apoyo.php';
require_once 'model/beneficiario.php';

class ApoyoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Apoyo();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        require_once 'view/header.php';
        require_once 'view/apoyo/apoyo-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $apoyo = new Apoyo();
        if (!empty($_REQUEST['nombre-apoyo'])) {
            $apoyo->nombre = $_REQUEST['nombre-apoyo'];
            $apoyo->descripcion = $_REQUEST['descripcion-apoyo'];
            $apoyo->fechaOtorgamiento = $_REQUEST['fecha-otorgamiento-apoyo'];
            $apoyo->monto = $_REQUEST['monto-apoyo'];
            $resultado = $this->model->Registrar($apoyo);
            if ($resultado == 'exito') {
                $_SESSION['busqueda'] = 'ApoyoPorNombre';
                $_SESSION['nombre-apoyo'] = $_REQUEST['nombre-apoyo'];
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Apoyo existente',
                    'cuerpo' => 'Ya existe registrado un apoyo con el nombre:<br>"'.$_REQUEST['nombre-apoyo'].'".'
                );
            }
            $this->mostrarMensaje($mensaje);
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function BuscarPorId(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-apoyo'])) {
            $_SESSION['buscar-id-apoyo'] = $_REQUEST['buscar-id-apoyo'];
            $_SESSION['buscar-nombre-apoyo'] = $_REQUEST['buscar-id-apoyo'];
            $nombre = $_REQUEST['buscar-nombre-apoyo'];
            $apoyo = $this->model->ObtenerPorId($_REQUEST['buscar-id-apoyo']);
        }else{
            $nombre = $_SESSION['buscar-nombre-apoyo'];
            $apoyo = $this->model->ObtenerPorId($_SESSION['buscar-id-apoyo']);
        }
        if (!empty($apoyo)) {
            $beneficiario = new Beneficiario();
            $beneficiarios = $beneficiario->ObtenerBeneficiarios($apoyo->idApoyo);
            require_once 'view/header.php';
            require_once 'view/apoyo/apoyo.php';
            require_once 'view/footer.php'; 
        }
    }

    public function BuscarPorNombre(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['nombre-apoyo'])) {
            $_SESSION['nombre-apoyo'] = $_REQUEST['nombre-apoyo'];
            $nombre = $_REQUEST['nombre-apoyo'];
            $apoyo = $this->model->ObtenerPorNombre($_REQUEST['nombre-apoyo']);
        }else{
            $nombre = $_SESSION['nombre-apoyo'];
            $apoyo = $this->model->ObtenerPorNombre($_SESSION['nombre-apoyo']);
        }
        if (!empty($apoyo)) {
            $beneficiario = new Beneficiario();
            $beneficiarios = $beneficiario->ObtenerBeneficiarios($apoyo->idApoyo);
            require_once 'view/header.php';
            require_once 'view/apoyo/apoyo.php';
            require_once 'view/footer.php'; 
        }
    }

    public function BuscarPorFecha(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['mes-apoyo'])) {
            $_SESSION['mes-apoyo'] = $_REQUEST['mes-apoyo'];
            $_SESSION['año-apoyo'] = $_REQUEST['año-apoyo'];
            $mes = $this->mostrarMes($_REQUEST['mes-apoyo']);
            $año = $_REQUEST['año-apoyo'];
            $apoyos = $this->model->ObtenerPorFecha($_REQUEST['mes-apoyo'],$_REQUEST['año-apoyo']);
        }else{
            $mes = $this->mostrarMes($_SESSION['mes-apoyo']);
            $año = $_SESSION['año-apoyo'];
            $apoyos = $this->model->ObtenerPorFecha($_SESSION['mes-apoyo'],$_SESSION['año-apoyo']);
        }
        if (!empty($apoyos)) { 
            $_SESSION['busqueda'] = 'ApoyoPorFecha';
            $_SESSION['metodo-busqueda'] = 'BuscarPorFecha';
            require_once 'view/header.php';
            require_once 'view/apoyo/apoyo-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay apoyos.',
                'cuerpo' => 'No se encontraron apoyos otorgados en <br>'.$mes.' de '.$año.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        if ($_SESSION['busqueda'] == 'ApoyoPorNombre') {
            $redireccion = 'index.php?c=Apoyo&a=BuscarPorNombre&nombre-apoyo='.$_SESSION['nombre-apoyo'];
        }else{
            $redireccion = 'index.php?c=Principal&a=IndexApoyosCompras';
        }
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }

    public function mostrarMes($mes){
        switch ($mes) {
            case '01':
                return 'Enero';break;
            case '02':
                return 'Febrero';break;
            case '03':
                return 'Marzo';break;
            case '04':
                return 'Abril';break;
            case '05':
                return 'Mayo';break;
            case '06':
                return 'Junio';break;
            case '07':
                return 'Julio';break;
            case '08':
                return 'Agosto';break;
            case '09':
                return 'Septiembre';break;
            case '10':
                return 'Octubre';break;
            case '11':
                return 'Noviembre';break;
            default:
                return 'Diciembre';break;
        }
    }
}
?>