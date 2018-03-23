<?php
require_once 'model/concurso.php';
require_once 'model/artesanoconcurso.php';

class ConcursoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Concurso();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
//     $artesano = new Artesano();
//     if(isset($_REQUEST['id'])){
//         $artesano = $this->model->Obtener($_REQUEST['id']);
//     }
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
        // $artesano->id > 0 
        //     ? $this->model->Actualizar($artesano)
        //     : $this->model->Registrar($artesano);
    }

    public function Buscar(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-concurso'])) {
            $_SESSION['buscar-id-concurso'] = $_REQUEST['buscar-id-concurso'];
            $_SESSION['buscar-nombre-concurso'] = $_REQUEST['buscar-id-concurso'];
            $nombre = $_REQUEST['buscar-nombre-concurso'];
            $concurso = $this->model->Obtener($_REQUEST['buscar-id-concurso']);
        }else{
            $nombre = $_SESSION['buscar-nombre-concurso'];
            $concurso = $this->model->Obtener($_SESSION['buscar-id-concurso']);
        }
        if (!empty($concurso)) {
            $artesano_concurso = new ArtesanoConcurso();
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
            $palabra_clave = $_REQUEST['buscar-concurso-concepto'];
            $concursos = $this->model->ObtenerPorNombre($_REQUEST['buscar-concurso-concepto']);
        }else{
            $palabra_clave = $_SESSION['buscar-concurso-concepto'];
            $concursos = $this->model->ObtenerPorNombre($_SESSION['buscar-concurso-concepto']);
        }
        if (!empty($concursos)) { 
            require_once 'view/header.php';
            require_once 'view/concurso/concurso-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay concursos.',
                'cuerpo' => 'No se encontraron concursos que hagan referencia a la busqueda:<br>"'.$palabra_clave.'".'
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

    // public function Eliminar(){
    //     $this->model->Eliminar($_REQUEST['id']);
    //     header('Location: index.php?c=Alumno');
    // }
}
?>