<?php
require_once 'model/concurso.php';
require_once 'model/participanteconcurso.php';

class ConcursoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Concurso();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
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
    }

    public function BuscarPorId(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-concurso'])) {
            $_SESSION['buscar-id-concurso'] = $_REQUEST['buscar-id-concurso'];
            $_SESSION['buscar-nombre-concurso'] = $_REQUEST['buscar-id-concurso'];
            $nombre = $_REQUEST['buscar-nombre-concurso'];
            $concurso = $this->model->ObtenerPorId($_REQUEST['buscar-id-concurso']);
        }else{
            $nombre = $_SESSION['buscar-nombre-concurso'];
            $concurso = $this->model->ObtenerPorId($_SESSION['buscar-id-concurso']);
        }
        if (!empty($concurso)) {
            $artesano_concurso = new ParticipanteConcurso();
            $participantes = $artesano_concurso->ObtenerParticipantes($concurso->idConcurso);
            require_once 'view/header.php';
            require_once 'view/concurso/concurso.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay exposiciones.',
                'cuerpo' => 'No se encontraron concursos con el nombre "'.$nombre.'"'
            );
            require_once 'view/header.php';
            require_once 'view/principal.php';
            require_once 'view/modal-mensajes.php';
            require_once 'view/footer.php';
        }
    }

    public function BuscarPorConcepto(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-concurso-concepto'])) {
            $_SESSION['buscar-concurso-concepto'] = $_REQUEST['buscar-concurso-concepto'];
            $concepto = $_REQUEST['buscar-concurso-concepto'];
            $concursos = $this->model->ObtenerPorConcepto($_REQUEST['buscar-concurso-concepto']);
        }else{
            $concepto = $_SESSION['buscar-concurso-concepto'];
            $concursos = $this->model->ObtenerPorConcepto($_SESSION['buscar-concurso-concepto']);
        }
        if (!empty($concursos)) {
            $_SESSION['metodo-busqueda'] = 'BuscarPorConcepto';
            require_once 'view/header.php';
            require_once 'view/concurso/concurso-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay concursos.',
                'cuerpo' => 'No se encontraron concursos que hagan referencia a la busqueda:<br>"'.$concepto.'".'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorPeriodo(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['fecha-inicio-periodo-concurso'])) {
            $_SESSION['fecha-inicio-periodo-concurso'] = $_REQUEST['fecha-inicio-periodo-concurso'];
            $_SESSION['fecha-fin-periodo-concurso'] = $_REQUEST['fecha-fin-periodo-concurso'];
            $fecha_inicio =$_REQUEST['fecha-inicio-periodo-concurso'];
            $fecha_fin = $_REQUEST['fecha-fin-periodo-concurso'];
            $concursos = $this->model->ObtenerPorPeriodo($_REQUEST['fecha-inicio-periodo-concurso'],$_REQUEST['fecha-fin-periodo-concurso']);
        }else{
            $fecha_inicio = $_SESSION['fecha-inicio-periodo-concurso'];
            $fecha_fin = $_SESSION['fecha-fin-periodo-concurso'];
            $concursos = $this->model->ObtenerPorPeriodo($_SESSION['fecha-inicio-periodo-concurso'],$_SESSION['fecha-fin-periodo-concurso']);
        }
        if (!empty($concursos)) { 
            $_SESSION['metodo-busqueda'] = 'BuscarPorPeriodo';
            require_once 'view/header.php';
            require_once 'view/concurso/concurso-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay concursos.',
                'cuerpo' => 'No se encontraron concursos realizadas en el periodo <br>'.$fecha_inicio.' a '.$fecha_fin.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        $redireccion = 'index.php?c=Principal&a=IndexConcursosExposiciones';
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>