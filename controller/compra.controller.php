<?php
require_once 'model/compra.php';

class CompraController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Compra();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        require_once 'view/header.php';
        require_once 'view/compras/compra-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $compra = new Compra();    
        $compra->curp = $_REQUEST['curp-vendedor'];
        $compra->alcance = $_REQUEST['alcance-venta'];
        $compra->monto = $_REQUEST['monto-compra'];
        $compra->tipoPago = $_REQUEST['tipo-pago'];
        $resultado = $this->model->Registrar($compra);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Exito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
        }elseif ($resultado == 'registro_inexistente'){
            $mensaje = array(
                'titulo' => 'CURP no encontrada',
                'cuerpo' => 'La CURP que ingresaste no se encuentró en el sistema.</br>Para guardar la información que ingresaste, el artesano debe estar registrado en el sistema.'
            );
        }
        $this->mostrarMensaje($mensaje);
    }

    public function BuscarPorMesAño(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['mes-compra'])) {
            $_SESSION['mes-compra'] = $_REQUEST['mes-compra'];
            $_SESSION['año-compra'] = $_REQUEST['año-compra'];
            $mes = $this->mostrarMes($_REQUEST['mes-compra']);
            $año = $_REQUEST['año-compra'];
            $compras = $this->model->ObtenerPorMesAño($_REQUEST['mes-compra'],$_REQUEST['año-compra']);
        }else{
            $mes = $this->mostrarMes($_SESSION['mes-compra']);
            $año = $_SESSION['año-compra'];
            $compras = $this->model->ObtenerPorMesAño($_SESSION['mes-compra'],$_SESSION['año-compra']);
        }
        if (!empty($compras)) { 
            require_once 'view/header.php';
            require_once 'view/compras/compra-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay compras.',
                'cuerpo' => 'No se encontraron compras hechas en <br>'.$mes.' de '.$año.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorPeriodo(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['fecha-inicio-periodo-compra'])) {
            $_SESSION['fecha-inicio-periodo-compra'] = $_REQUEST['fecha-inicio-periodo-compra'];
            $_SESSION['fecha-fin-periodo-compra'] = $_REQUEST['fecha-fin-periodo-compra'];
            $fecha_inicio =$_REQUEST['fecha-inicio-periodo-compra'];
            $fecha_fin = $_REQUEST['fecha-fin-periodo-compra'];
            $compras = $this->model->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-compra'],$_REQUEST['fecha-fin-periodo-compra']);
        }else{
            $fecha_inicio = $_SESSION['fecha-inicio-periodo-compra'];
            $fecha_fin = $_SESSION['fecha-fin-periodo-compra'];
            $compras = $this->model->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-compra'],$_SESSION['fecha-fin-periodo-compra']);
        }
        if (!empty($compras)) { 
            require_once 'view/header.php';
            require_once 'view/compras/compra-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay compras.',
                'cuerpo' => 'No se encontraron compras hechas en el periodo <br>'.$fecha_inicio.' a '.$fecha_fin.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = 'index.php?c=Principal&a=IndexApoyosCompras';
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