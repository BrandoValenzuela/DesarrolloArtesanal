<?php
require_once 'model/taller.php';
require_once 'model/empleadocolaborador.php';
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
        $talleres = $this->model->ObtenerTalleres();
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar();
        $curp = $_SESSION['curp-artesano'];
        $_SESSION['curp-artesano'] = '';
        require_once 'view/header.php';
        require_once 'view/taller/taller-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $taller = new Taller();    
        $emp_col = new EmpleadoColaborador();
        $emp_col->curp = $_REQUEST['curp-artesano-taller'];
        $emp_col->tipoParticipacion = $_REQUEST['participacion-artesano']; 
        $emp_col->idTaller = $_REQUEST['taller-de-empleado'];
        $emp_col->sueldoMensual = $_REQUEST['sueldo-mensual'];
        $taller->curp = $_REQUEST['curp-artesano-taller'];
        $taller->tipoParticipacion = $_REQUEST['participacion-artesano'];
        $taller->idRamaArtesanal = $_REQUEST['rama-artesanal-taller'];
        $taller->nombre = $_REQUEST['nombre-taller'];
        $taller->domicilio = $_REQUEST['direccion-taller'];
        $taller->localidad = $_REQUEST['localidad-taller'];
        $taller->municipio = $_REQUEST['municipio-taller'];
        $taller->empTiempoCompleto = $_REQUEST['empleos-tc'];
        $taller->empPorHora = $_REQUEST['empleos-hr'];
        $taller->empIMSS = $_REQUEST['empleos-imss'];
        $taller->empTotales = $_REQUEST['empleos-totales'];
        $taller->ingresoMensual = $_REQUEST['ingreso-mensual-taller'];
        $taller->gastoMensual = $_REQUEST['gasto-mensual-taller'];
        if ($_REQUEST['participacion-artesano'] == '3') {
            $resultado = $this->model->Registrar($taller);
        }else{
            $resultado = $emp_col->Registrar($emp_col);
        }
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

    public function Buscar(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['buscar-id-taller'])) {
            $_SESSION['buscar-id-taller'] = $_REQUEST['buscar-id-taller'];
            $_SESSION['buscar-nombre-taller'] = $_REQUEST['buscar-id-taller'];
            $nombre = $_REQUEST['buscar-nombre-taller'];
            $taller = $this->model->Obtener($_REQUEST['buscar-id-taller']);
        }else{
            $nombre = $_SESSION['buscar-nombre-taller'];
            $taller = $this->model->Obtener($_SESSION['buscar-id-taller']);
        }
        if (!empty($taller)) {
            $empleado_colaborador = new EmpleadoColaborador();
            $empleados = $empleado_colaborador->ObtenerEmpleados($taller->idTaller);
            $colaboradores = $empleado_colaborador->ObtenerColaboradores($taller->idTaller);
            require_once 'view/header.php';
            require_once 'view/taller/taller.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'No hay talleres.',
                'cuerpo' => 'No se encontraron talleres con el nombre "'.$nombre.'"'
            );
            $this->mostrarMensaje($mensaje);
        }
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
        require_once 'view/modal-mensajes.php';
        require_once 'view/principal.php';
        require_once 'view/footer.php';
    }
}
?>