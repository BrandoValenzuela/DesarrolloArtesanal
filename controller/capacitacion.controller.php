<?php
require_once 'model/capacitacion.php';
require_once 'model/ramaartesanal.php';
require_once 'model/participantecapacitacion.php';
require_once 'model/talleristacapacitacion.php';

class CapacitacionController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Capacitacion();
    }
    
    public function Index(){
    	if (empty($_SESSION)) {
			header('Location: index.php');
        }
        require_once 'view/header.php';
        require_once 'view/capacitaciones/principal-capacitacion.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $RA = new RamaArtesanal();
        $ramas = $RA->Listar();
        require_once 'view/header.php';
        require_once 'view/capacitaciones/capacitacion-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $capacitacion = new Capacitacion();
        if (!empty($_REQUEST['nombre-capacitacion'])) {
            $capacitacion->nombre = $_REQUEST['nombre-capacitacion'];
            $capacitacion->domicilio = $_REQUEST['direccion-capacitacion'];
            $capacitacion->localidad = $_REQUEST['localidad-capacitacion'];
            $capacitacion->municipio = $_REQUEST['municipio-capacitacion'];
            $capacitacion->idRamaArtesanal = $_REQUEST['rama-artesanal-capacitacion'];
            $capacitacion->otraArea = $_REQUEST['tema-capacitacion'];
            $capacitacion->fechaInicio = $_REQUEST['fecha-inicio-capacitacion'];
            $capacitacion->fechaFin = $_REQUEST['fecha-fin-capacitacion'];
            $capacitacion->material = $_REQUEST['material-capacitacion'];
            $capacitacion->montoMaterial = $_REQUEST['inversion-capacitacion'];
            $capacitacion->observacion = $_REQUEST['observacion-capacitacion'];
            $resultado = $this->model->Registrar($capacitacion);
            if ($resultado == 'exito') {
                $mensaje = array(
                    'titulo' => 'Exito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
                $this->mostrarMensaje($mensaje);
            }else{
                $mensaje = array(
                    'titulo' => 'Capacitación existente',
                    'cuerpo' => 'Ya existe registrada una capacitación con el nombre: <br>"'.$_REQUEST['nombre-capacitacion'].'".'
                );
                $this->mostrarMensaje($mensaje);
            }
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function BuscarPorId(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-capacitacion'])) {
            $_SESSION['buscar-id-capacitacion'] = $_REQUEST['buscar-id-capacitacion'];
            $_SESSION['buscar-nombre-capacitacion'] = $_REQUEST['buscar-id-capacitacion'];
            $capacitacion = $this->model->ObtenerPorId($_REQUEST['buscar-id-capacitacion']);
            $nombre = $_REQUEST['buscar-nombre-capacitacion'];
        }else{
            $municipio = $_SESSION['buscar-id-capacitacion'];
            $capacitacion = $this->model->ObtenerPorId($_SESSION['buscar-id-capacitacion']);
            $nombre = $_SESSION['buscar-nombre-capacitacion'];
        }
        if (!empty($capacitacion)) {
            $RA = new RamaArtesanal();
            $tallerista_capacitacion = new TalleristaCapacitacion();
            $artesano_capacitacion = new ParticipanteCapacitacion();
            $rama = $RA->Obtener($capacitacion->idRamaArtesanal);
            $participantes = $artesano_capacitacion->ObtenerParticipantes($capacitacion->idCapacitacion);
            $talleristasT = $tallerista_capacitacion->ObtenerTalleristas($capacitacion->idCapacitacion);
            $talleristasA = $tallerista_capacitacion->ObtenerArtesanosTalleristas($capacitacion->idCapacitacion);
            require_once 'view/header.php';
            require_once 'view/capacitaciones/capacitacion.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay capacitaciones.',
                'cuerpo' => 'No se encontraron capacitaciones con el nombre "'.$nombre.'"'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorPeriodo(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['fecha-inicio-periodo-capacitacion'])) {
            $_SESSION['fecha-inicio-periodo-capacitacion'] = $_REQUEST['fecha-inicio-periodo-capacitacion'];
            $_SESSION['fecha-fin-periodo-capacitacion'] = $_REQUEST['fecha-fin-periodo-capacitacion'];
            $fecha_inicio =$_REQUEST['fecha-inicio-periodo-capacitacion'];
            $fecha_fin = $_REQUEST['fecha-fin-periodo-capacitacion'];
            $capacitaciones = $this->model->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-capacitacion'],$_REQUEST['fecha-fin-periodo-capacitacion']);
        }else{
            $fecha_inicio = $_SESSION['fecha-inicio-periodo-capacitacion'];
            $fecha_fin = $_SESSION['fecha-fin-periodo-capacitacion'];
            $capacitaciones = $this->model->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-capacitacion'],$_SESSION['fecha-fin-periodo-capacitacion']);
        }
        if (!empty($capacitaciones)) { 
            $_SESSION['busqueda'] = 'CapacitacionPorPeriodo';
            $_SESSION['metodo-busqueda'] = 'BuscarPorPeriodo';
            require_once 'view/header.php';
            require_once 'view/capacitaciones/capacitacion-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay capacitaciones.',
                'cuerpo' => 'No se encontraron capacitaciones realizadas en el periodo <br>'.$fecha_inicio.' a '.$fecha_fin.'.'
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