<?php
require_once 'model/incidencia.php';

class IncidenciaController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Incidencia();
    }
     
    public function Guardar(){
        $incidencia = new Incidencia();
        if (!empty($_REQUEST['curp-artesano-incidencia'])) {
            $incidencia->curp = $_REQUEST['curp-artesano-incidencia'];
            $incidencia->observacion = $_REQUEST['observacion-incidencia'];
            $incidencia->informante = $_REQUEST['nombre-informante-incidencia'];
            $resultado = $this->model->Registrar($incidencia);
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
        }else{
            header('Location: index.php?c=Principal');
        }
    }

    public function BuscarPorCURP(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-incidencia-curp'])) {
            $_SESSION['buscar-incidencia-curp'] = $_REQUEST['buscar-incidencia-curp'];
            $incidencias = $this->model->ObtenerPorCURP($_REQUEST['buscar-incidencia-curp']);
            $curp = $_REQUEST['buscar-incidencia-curp'];
        }else{
            $incidencias = $this->model->ObtenerPorCURP($_SESSION['buscar-incidencia-curp']);
            $curp = $_SESSION['buscar-incidencia-curp'];
        }
        if (!empty($incidencias)) {
            if ($incidencias == 'registro_inexistente') {
                $mensaje = array(
                    'titulo' => 'Registro inexistente',
                    'cuerpo' => 'La CURP que ingresaste no se encuentra registrada en el sistema.'
                );
                $this->mostrarMensaje($mensaje);        
            }else{
                $Artesano = new Artesano();
                $artesano = $Artesano->ObtenerPorCURP($curp);
                $_SESSION['busqueda'] = 'IncidenciaPorCURP';
                $_SESSION['metodo-busqueda'] = 'BuscarPorCURP';
                require_once 'view/header.php';
                require_once 'view/incidencia/incidencia.php';
                require_once 'view/footer.php'; 
            }
        }else{
            $mensaje = array(
                'titulo' => 'Sin incidencias',
                'cuerpo' => 'El artesano con la CURP que ingresaste no cuenta con incidencias registradas.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorPeriodo(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['fecha-inicio-periodo-incidencias'])) {
            $_SESSION['fecha-inicio-periodo-incidencias'] = $_REQUEST['fecha-inicio-periodo-incidencias'];
            $_SESSION['fecha-fin-periodo-incidencias'] = $_REQUEST['fecha-fin-periodo-incidencias'];
            $fecha_inicio = $_REQUEST['fecha-inicio-periodo-incidencias'];
            $fecha_fin = $_REQUEST['fecha-fin-periodo-incidencias'];
            $incidencias = $this->model->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-incidencias'],$_REQUEST['fecha-fin-periodo-incidencias']);
        }else{
            $fecha_inicio = $_SESSION['fecha-inicio-periodo-incidencias'];
            $fecha_fin = $_SESSION['fecha-fin-periodo-incidencias'];
            $incidencias = $this->model->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-incidencias'],$_SESSION['fecha-fin-periodo-incidencias']);
        }
        if (!empty($incidencias)) { 
            $_SESSION['busqueda'] = 'IncidenciaPorPeriodo';
            $_SESSION['metodo-busqueda'] = 'BuscarPorPeriodo';
            require_once 'view/header.php';
            require_once 'view/incidencia/incidencia.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay incidencias',
                'cuerpo' => 'No se encontraron incidencias en el periodo <br>'.$fecha_inicio.' a '.$fecha_fin.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        if ($_SESSION['busqueda'] == 'IncidenciaPorCURP' || $_SESSION['busqueda'] == 'IncidenciaPorPeriodo') {
            $redireccion = 'index.php?c=Principal&a=IndexAdministracion';
        }else{
            $redireccion = 'index.php?c=Principal';
        }
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }

}
?>