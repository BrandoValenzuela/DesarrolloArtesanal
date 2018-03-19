<?php
require_once 'model/taller.php';
require_once 'model/ramaartesanal.php';

class TallerController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Taller();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
//     $artesano = new Artesano();
//     if(isset($_REQUEST['id'])){
//         $artesano = $this->model->Obtener($_REQUEST['id']);
//     }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar();
        require_once 'view/header.php';
        require_once 'view/taller/taller-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $taller = new Taller();    
        $taller->CURP = $_REQUEST['curp-artesano'];
        $taller->ParticipacionArtesano = $_REQUEST['participacion-artesano'];
        $taller->idRamaArtesanal = $_REQUEST['ramaartesanal'];
        $taller->Nombre = $_REQUEST['nombre'];
        $taller->Direccion = $_REQUEST['direccion'];
        $taller->Localidad = $_REQUEST['localidad'];
        $taller->Municipio = $_REQUEST['municipio'];
        $taller->EmpleosTC = $_REQUEST['empleos-tc'];
        $taller->EmpleosHR = $_REQUEST['empleos-hr'];
        $taller->EmpleosIMSS = $_REQUEST['empleos-imss'];
        $resultado = $this->model->Registrar($taller);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Éxito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
            $this->mostrarMensaje($mensaje);
        }else{
            $mensaje = array(
                'titulo' => 'CURP no encontrada',
                'cuerpo' => 'La CURP que ingresaste no se encuentró en el sistema.</br>Para guardar la información que ingresaste, el artesano debe estar registrado en el sistema.'
            );
            $this->mostrarMensaje($mensaje);
        }
        // $artesano->id > 0 
        //     ? $this->model->Actualizar($artesano)
        //     : $this->model->Registrar($artesano);
    }

    public function BuscarTallerPorMunicipio(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        if (empty($_REQUEST)) {
            $_SESSION['buscar-taller-mun'] = $_REQUEST['buscar-taller-mun'];
        }
        if (!empty($_REQUEST['buscar-taller-mun'])) {
            $_SESSION['buscar-taller-mun'] = $_REQUEST['buscar-taller-mun'];
            $municipio = $_REQUEST['buscar-taller-mun'];
            $talleres = $this->model->ObtenerTalleresMunicipio($_REQUEST['buscar-taller-mun']);
        }else{
            $municipio = $_SESSION['buscar-taller-mun'];
            $talleres = $this->model->ObtenerTalleresMunicipio($_SESSION['buscar-taller-mun']);
        }
        if (!empty($talleres)) { 
            require_once 'view/header.php';
            require_once 'view/taller/taller-municipio.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay talleres.',
                'cuerpo' => 'No se encontraron talleres en '.$municipio.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

 public function BuscarTallerPorRamaArtesanal(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();

        // $rama = $Rama->Obtener($_REQUEST['ramaartesanal']);
        // $talleres = $this->model->ObtenerTalleresRamaArtesanal($_REQUEST['ramaartesanal']);
        
        if (!empty($_REQUEST['ramaartesanal'])) {
            $_SESSION['ramaartesanal'] = $_REQUEST['ramaartesanal'];
            $talleres = $this->model->ObtenerTalleresRamaArtesanal($_REQUEST['ramaartesanal']);
            $rama = $Rama->Obtener($_REQUEST['ramaartesanal']);
        }else{
            $talleres = $this->model->ObtenerTalleresRamaArtesanal($_SESSION['ramaartesanal']);
            $rama = $Rama->Obtener($_SESSION['ramaartesanal']);
        }
        if (!empty($talleres)) { 
            require_once 'view/header.php';
            require_once 'view/taller/taller-rama.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay talleres.',
                'cuerpo' => 'No se encontraron talleres de la rama artesanal que elegiste.'
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

    // public function Eliminar(){}
}
?>