<?php
require_once 'model/artesano.php';
require_once 'model/ramaartesanal.php';
require_once 'model/taller.php';
require_once 'model/artesanoexpo.php';
require_once 'model/artesanoconcurso.php';

class ArtesanoController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Artesano();
    }

    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $artesano = new Artesano();
        if(isset($_REQUEST['CURP'])){
            $artesano = $this->model->Obtener($_REQUEST['CURP']);
            $operacion = $_REQUEST['operacion'];
        }else{
            $operacion = '0';
        }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar();
        require_once 'view/header.php';
        require_once 'view/artesano/artesano-editar.php';
        require_once 'view/footer.php';
    }
    
    
    public function Guardar(){
        $artesano = new Artesano();
        $artesano->curp = $_REQUEST['curp'];
        $artesano->nombre = $_REQUEST['nombre'];
        $artesano->aPaterno = $_REQUEST['aPaterno'];
        $artesano->aMaterno = $_REQUEST['aMaterno'];
        $artesano->domicilio = $_REQUEST['direccion'];
        $artesano->localidad = $_REQUEST['localidad'];
        $artesano->municipio = $_REQUEST['municipio'];
        $artesano->grupoEtnico = $_REQUEST['grupo-etnico'];
        $artesano->sexo = $_REQUEST['sexo'];
        $artesano->edad = $_REQUEST['edad'];
        $artesano->telefonoFijo = $_REQUEST['telefono-fijo'];
        $artesano->telefonoCel = $_REQUEST['telefono-cel'];
        $artesano->email = $_REQUEST['email'];
        $artesano->facebook = $_REQUEST['facebook'];
        $artesano->twitter = $_REQUEST['twitter'];
        $artesano->instagram = $_REQUEST['instagram'];
        $artesano->idRamaArtesanal = $_REQUEST['ramaartesanal'];
        $artesano->anioInicioOficio = $_REQUEST['inicio-oficio'];
        $artesano->tipoActividad = $_REQUEST['tipo-actividad'];
        $artesano->actividadPrincipal = $_REQUEST['actividad-primaria'];
        $artesano->aprendizajeOficio = $_REQUEST['aprendizaje-oficio'];
        $artesano->perioricidad = $_REQUEST['perioricidad'];
        $artesano->ingresoMensual = $_REQUEST['ingreso-mensual'];
        $artesano->gastoMensual = $_REQUEST['gasto-mensual'];
        $artesano->perteneceTaller = $_REQUEST['pertenencia-taller'];
        $artesano->trabajoDomicilio = $_REQUEST['lugar-trabajo'];
        $artesano->propiedadLugarTrabajo = $_REQUEST['prop-lugar-trabajo'];
        $artesano->tipoVenta = $_REQUEST['tipo-venta'];
        $artesano->anioInicioSDA = $_REQUEST['fecha-registro-da'];
        $artesano->quiz = $_REQUEST['cadena-cuis'];
        $artesano->rfc = $_REQUEST['cadena-rfc'];
        $artesano->fechaAltaRFC = $_REQUEST['fecha-registro-rfc'];
        $artesano->participacionAsocPasada = $_REQUEST['asociacion-pasada'];
        $artesano->participacionAsocActual = $_REQUEST['asociacion-actual'];
        $artesano->nombreAsocActual = $_REQUEST['nombre-asoc-actual'];
        $artesano->fidelidadRamaArtesanal = $_REQUEST['fidelidad'];
        $artesano->satisfaccion = $_REQUEST['satisfaccion'];
        $artesano->necesidadesPrioritarias = $_REQUEST['necesidades'];
        $artesano->folio = $_REQUEST['folio'];
        $trabajoTaller = $_REQUEST['pertenencia-taller'];
        $_SESSION['curp'] = $_REQUEST['curp'];
        $operacion = $_REQUEST['operacion'];
        if ($operacion == 0) {
            $resultado =  $this->model->Registrar($artesano);          
        }elseif ($operacion == 1) {
            $resultado =  $this->model->Actualizar($artesano);
        }
        // print_r($resultado);
        if ($resultado == 'exito') {
            if ($trabajoTaller == '2') {
                header('Location: index.php?c=Taller&a=Crud');
            }else{
                $mensaje = array(
                    'titulo' => 'Éxito',
                    'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
                );
                $this->mostrarMensaje($mensaje);
            }
        }else{
            $mensaje = array(
                'titulo' => 'Registro existente',
                'cuerpo' => 'La CURP que ingresaste ya se encuentra registrada en el sistema.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function Buscar(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $Taller = new Taller();
        $ArtExpo = new Artesanoexpo();
        $ArtCon = new Artesanoconcurso();
        if (!empty($_REQUEST['buscar-artesano-curp'])) {
            $_SESSION['buscar-artesano-curp'] = $_REQUEST['buscar-artesano-curp'];
            $art = $this->model->Obtener($_REQUEST['buscar-artesano-curp']);
        }else{
            $art = $this->model->Obtener($_SESSION['buscar-artesano-curp']);
        }
        if (!empty($art)) { 
            $ram_art = $Rama->Obtener($art->idRamaArtesanal);
            $tal = $Taller->ObtenerTallerArtesano($art->curp);
            $participantes_expo = $ArtExpo->ObtenerExposiciones($art->curp);
            $participantes_concurso = $ArtCon->ObtenerConcursos($art->curp);
            require_once 'view/header.php';
            require_once 'view/artesano/artesano.php';
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
        if (!empty($_REQUEST['buscar-artesano-ap'])) {
            $_SESSION['buscar-artesano-ap'] = $_REQUEST['buscar-artesano-ap'];
            $apellido = $_REQUEST['buscar-artesano-ap'];
            $artesanos = $this->model->ObtenerPorApellido($_REQUEST['buscar-artesano-ap']);
        }else{
            $apellido = $_SESSION['buscar-artesano-ap'];
            $artesanos = $this->model->ObtenerPorApellido($_SESSION['buscar-artesano-ap']);
        }
        if (!empty($artesanos)) { 
            require_once 'view/header.php';
            require_once 'view/artesano/artesano-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Registro inexistente',
                'cuerpo' => 'No hay artesanos registardos con el apellido '.$apellido
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
}
?>
