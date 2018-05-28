<?php
require_once 'model/comodatoartesano.php';
require_once 'model/comodatoexterno.php';

class ComodatoController{
    private $modelA;
    private $modelB;
    
    public function __CONSTRUCT(){
        $this->modelA = new ComodatoArtesano();
        $this->modelB = new ComodatoExterno();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        require_once 'view/header.php';
        require_once 'view/comodato/comodato-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $comodato_artesano = new ComodatoArtesano();
        $comodato_externo = new ComodatoExterno();
        if (!empty($_REQUEST['curp-artesano-comodato'] || !empty($_REQUEST['nombre-poseedor-comodato']))) {
            if ($_REQUEST['poseedor-comodato'] == '1') {
                $comodato_artesano->curp = $_REQUEST['curp-artesano-comodato'];
                $comodato_artesano->folio = $_REQUEST['folio-comodato'];
                $comodato_artesano->fechaInicio = $_REQUEST['fecha-inicio-comodato'];
                $comodato_artesano->bienesComodatados = $_REQUEST['bienes-comodato'];
                $resultado = $this->modelA->Registrar($comodato_artesano);
            }else{
                $comodato_externo->folio = $_REQUEST['folio-comodato'];
                $comodato_externo->fechaInicio = $_REQUEST['fecha-inicio-comodato'];
                $comodato_externo->bienesComodatados = $_REQUEST['bienes-comodato'];
                $comodato_externo->nombrePoseedorComodato = $_REQUEST['nombre-poseedor-comodato'];
                $comodato_externo->domicilioPoseedorComodato = $_REQUEST['direccion-poseedor-comodato'];
                $comodato_externo->municipioPoseedorComodato = $_REQUEST['municipio-poseedor-comodato'];
                $comodato_externo->telefonoPoseedorComodato = $_REQUEST['telefono-poseedor-comodato'];
                $resultado = $this->modelB->Registrar($comodato_externo);
            }
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Éxito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
            }else if ($resultado == 'artesano_inexistente'){
                $mensaje = array(
                    'titulo' => 'CURP no encontrada',
                    'cuerpo' => 'La CURP que ingresaste no se encuentró en el sistema.</br>Para guardar la información que ingresaste, el artesano debe estar registrado en el sistema.'
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
        if (!empty($_REQUEST['buscar-id-comodato'])) {
            $_SESSION['buscar-id-comodato'] = $_REQUEST['buscar-id-comodato'];
            $comodato = $this->modelB->ObtenerPorId($_REQUEST['buscar-id-comodato']);
        }else{
            $comodato = $this->modelB->ObtenerPorId($_SESSION['buscar-id-comodato']);
        }
        if (!empty($comodato)) {
            require_once 'view/header.php';
            require_once 'view/comodato/comodato.php';
            require_once 'view/footer.php'; 
        }
        else{
            $mensaje = array(
                'titulo' => 'No hay comodatos.',
                'cuerpo' => 'No se encontraron comodatos.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorPeriodo(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['fecha-inicio-periodo-comodato'])) {
            $_SESSION['fecha-inicio-periodo-comodato'] = $_REQUEST['fecha-inicio-periodo-comodato'];
            $_SESSION['fecha-fin-periodo-comodato'] = $_REQUEST['fecha-fin-periodo-comodato'];
            $fecha_inicio =$_REQUEST['fecha-inicio-periodo-comodato'];
            $fecha_fin = $_REQUEST['fecha-fin-periodo-comodato'];
            $comodatos_artesano = $this->modelA->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-comodato'],$_REQUEST['fecha-fin-periodo-comodato']); 
            $comodatos_externos = $this->modelB->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-comodato'],$_REQUEST['fecha-fin-periodo-comodato'])         ;
        }else{
            $fecha_inicio = $_SESSION['fecha-inicio-periodo-comodato'];
            $fecha_fin = $_SESSION['fecha-fin-periodo-comodato'];
            $comodatos_artesano = $this->modelA->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-comodato'],$_SESSION['fecha-fin-periodo-comodato']);
            $comodatos_externos = $this->modelB->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-comodato'],$_SESSION['fecha-fin-periodo-comodato']);
        }
        if (!empty($comodatos_artesano) || !empty($comodatos_externos)) { 
            $_SESSION['metodo-busqueda'] = 'BuscarPorPeriodo';
            require_once 'view/header.php';
            require_once 'view/comodato/comodato-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay comodatos.',
                'cuerpo' => 'No se otorgaron comodatos en el periodo: <br>'.$fecha_inicio.' a '.$fecha_fin.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = 'index.php?c=Principal&a=IndexArtesanos';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>