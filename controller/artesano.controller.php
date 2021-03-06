<?php
require_once 'model/artesano.php';
require_once 'model/ramaartesanal.php';
require_once 'model/taller.php';
require_once 'model/participanteexpo.php';
require_once 'model/participanteconcurso.php';
require_once 'model/participantecapacitacion.php';
require_once 'model/empleadocolaborador.php';
require_once 'model/apoyo.php';
require_once 'model/compra.php';
require_once 'model/comodatoartesano.php';
require_once 'model/talleristacapacitacion.php';
require_once 'model/productoartesano.php';
require_once 'model/corredor.php';

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
        $Corredor = new Corredor();
        $Rama = new RamaArtesanal();
        if(isset($_REQUEST['curp-artesano-actualizar'])){
            $artesano = $this->model->ObtenerPorCURP($_REQUEST['curp-artesano-actualizar']);
            $registrar_actualizar = $_REQUEST['registrar-actualizar'];
        }else{
            $registrar_actualizar = '0';
        }
        $ramas = $Rama->Listar();
        $corredores = $Corredor->Listar();
        require_once 'view/header.php';
        require_once 'view/artesano/artesano-editar.php';
        require_once 'view/footer.php';
    }
    
    
    public function Guardar(){
        $artesano = new Artesano();
        $artesano->curp = $_REQUEST['curp-artesano'];
        $artesano->nombre = $_REQUEST['nombre-artesano'];
        $artesano->aPaterno = $_REQUEST['aPaterno-artesano'];
        $artesano->aMaterno = $_REQUEST['aMaterno-artesano'];
        $artesano->domicilio = $_REQUEST['direccion-artesano'];
        $artesano->localidad = $_REQUEST['localidad-artesano'];
        $artesano->municipio = $_REQUEST['municipio-artesano'];
        $artesano->grupoEtnico = $_REQUEST['grupo-etnico-artesano'];
        $artesano->sexo = $_REQUEST['sexo-artesano'];
        $artesano->edad = $_REQUEST['edad-artesano'];
        $artesano->telefonoFijo = $_REQUEST['telefono-fijo-artesano'];
        $artesano->telefonoCel = $_REQUEST['telefono-cel-artesano'];
        $artesano->email = $_REQUEST['email-artesano'];
        $artesano->facebook = $_REQUEST['facebook-artesano'];
        $artesano->twitter = $_REQUEST['twitter-artesano'];
        $artesano->instagram = $_REQUEST['instagram-artesano'];
        $artesano->idRamaArtesanal = $_REQUEST['rama-artesanal-artesano'];
        $artesano->idCorredor = $_REQUEST['corredor-artesano'];
        $artesano->anioInicioOficio = $_REQUEST['inicio-oficio'];
        $artesano->tipoActividad = $_REQUEST['tipo-actividad'];
        $artesano->actividadPrincipal = $_REQUEST['actividad-primaria'];
        $artesano->aprendizajeOficio = $_REQUEST['aprendizaje-oficio'];
        $artesano->perioricidad = $_REQUEST['perioricidad'];
        $artesano->ingresoMensual = $_REQUEST['ingreso-mensual-artesano'];
        $artesano->gastoMensual = $_REQUEST['gasto-mensual-artesano'];
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
        $artesano->folio = $_REQUEST['folio-artesano'];
        $trabajoTaller = $_REQUEST['pertenencia-taller'];
        $_SESSION['curp-artesano'] = $_REQUEST['curp-artesano'];
        $registrar_actualizar = $_REQUEST['registrar-actualizar'];
        if ($registrar_actualizar == 0) {
            $resultado =  $this->model->Registrar($artesano);          
        }elseif ($registrar_actualizar == 1) {
            $resultado =  $this->model->Actualizar($artesano);
        }
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

    public function BuscarPorCURP(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $Taller = new Taller();
        $Participante_expo = new ParticipanteExpo();
        $Participante_concurso = new ParticipanteConcurso();
        $Participante_capacitacion = new ParticipanteCapacitacion();
        $EmpCol = new EmpleadoColaborador();
        $Apoyo = new Apoyo();
        $Compra = new Compra();
        $Comodato = new ComodatoArtesano();
        $Capacitaciones = new TalleristaCapacitacion();
        $Productos = new ProductoArtesano();
        $Corredor = new Corredor();
        if (!empty($_REQUEST['buscar-artesano-curp'])) {
            $_SESSION['buscar-artesano-curp'] = $_REQUEST['buscar-artesano-curp'];
            $artesano = $this->model->ObtenerPorCURP($_REQUEST['buscar-artesano-curp']);
        }else{
            $artesano = $this->model->ObtenerPorCURP($_SESSION['buscar-artesano-curp']);
        }
        if (!empty($artesano)) {
            $ram_art = $Rama->Obtener($artesano->idRamaArtesanal);
            $datos_taller = $Taller->ObtenerTallerArtesano($artesano->curp);
            $datos_colaborador = $EmpCol->ObtenerTalleresColaborador($artesano->curp);
            $datos_empleado = $EmpCol->ObtenerTalleresEmpleado($artesano->curp);
            $participaciones_expo = $Participante_expo->ObtenerExposiciones($artesano->curp);
            $participaciones_concurso = $Participante_concurso->ObtenerConcursos($artesano->curp);
            $participaciones_capacitacion = $Participante_capacitacion->ObtenerCapacitaciones($artesano->curp);
            $apoyos = $Apoyo->ObtenerApoyos($artesano->curp);
            $compras = $Compra->ObtenerCompras($artesano->curp);
            $comodatos = $Comodato->ObtenerComodatos($artesano->curp);
            $capacitaciones_impartidas = $Capacitaciones->ObtenerCapacitacionesArtesano($artesano->curp);
            $productos = $Productos->ObtenerProductosArtesano($artesano->curp);
            $corredor = $Corredor->Obtener($artesano->idCorredor);
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
            $_SESSION['busqueda'] = 'ArtesanoPorApellido';
            $_SESSION['metodo-busqueda'] = 'BuscarPorApellido';
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

    public function BuscarPorRama(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['idRamaArtesanal'])) {
            $_SESSION['idRamaArtesanal'] = $_REQUEST['idRamaArtesanal'];
            $_SESSION['nombre-rama'] = $_REQUEST['nombre-rama'];
            $rama = $_REQUEST['idRamaArtesanal'];
            $nombre_rama = $_REQUEST['nombre-rama'];
            $artesanos = $this->model->ObtenerPoRrama($_REQUEST['idRamaArtesanal']);
        }else{
            $rama = $_SESSION['idRamaArtesanal'];
            $nombre_rama = $_SESSION['nombre-rama'];
            $artesanos = $this->model->ObtenerPorRama($_SESSION['idRamaArtesanal']);
        }
        $_SESSION['busqueda'] = 'ArtesanoPorRama';
        $_SESSION['metodo-busqueda'] = 'BuscarPorRama';
        if (!empty($artesanos)) {
            require_once 'view/header.php';
            require_once 'view/artesano/artesano-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Sin registros',
                'cuerpo' => 'No hay artesanos registardos pertenecientes a la rama artesanal:<br>'.$nombre_rama.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorProducto(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['idProducto'])) {
            $_SESSION['idProducto'] = $_REQUEST['idProducto'];
            $_SESSION['nombre-producto'] = $_REQUEST['nombre-producto'];
            $producto = $_REQUEST['idProducto'];
            $nombre_producto = $_REQUEST['nombre-producto'];
            $artesanos = $this->model->ObtenerPorProducto($_REQUEST['idProducto']);
        }else{
            $producto = $_SESSION['idProducto'];
            $nombre_producto = $_SESSION['nombre-producto'];
            $artesanos = $this->model->ObtenerPorProducto($_SESSION['idProducto']);
        }
        $_SESSION['busqueda'] = 'ArtesanoPorProducto';
        $_SESSION['metodo-busqueda'] = 'BuscarPorProducto';
        if (!empty($artesanos)) {
            require_once 'view/header.php';
            require_once 'view/artesano/artesano-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Sin registros',
                'cuerpo' => 'No hay artesanos registardos que confeccionen el producto artesanal:<br>'.$nombre_producto.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function BuscarPorCorredor(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['idCorredor'])) {
            $_SESSION['idCorredor'] = $_REQUEST['idCorredor'];
            $_SESSION['nombre-corredor'] = $_REQUEST['nombre-corredor'];
            $corredor = $_REQUEST['idCorredor'];
            $nombre_corredor = $_REQUEST['nombre-corredor'];
            $artesanos = $this->model->ObtenerPorCorredor($_REQUEST['idCorredor']);
        }else{
            $corredor = $_SESSION['idCorredor'];
            $nombre_corredor = $_SESSION['nombre-corredor'];
            $artesanos = $this->model->ObtenerPorCorredor($_SESSION['idCorredor']);
        }
        $_SESSION['busqueda'] = 'ArtesanoPorCorredor';
        $_SESSION['metodo-busqueda'] = 'BuscarPorCorredor';
        if (!empty($artesanos)) {
            require_once 'view/header.php';
            require_once 'view/artesano/artesano-lista.php';
            require_once 'view/footer.php'; 
        }else{
            $mensaje = array(
                'titulo' => 'Sin registros',
                'cuerpo' => 'No hay artesanos registardos que confeccionen el producto artesanal:<br>'.$nombre_corredor.'.'
            );
            $this->mostrarMensaje($mensaje);
        }
    }

    public function mostrarMensaje($msj){
        $mensaje = $msj;
        if ($_SESSION['busqueda'] == 'ArtesanoPorRama' || $_SESSION['busqueda'] == 'ArtesanoPorProducto' || $_SESSION['busqueda'] == 'ArtesanoPorCorredor') {
            $redireccion = 'index.php?c=Principal&Index';
        }else{
            $redireccion = 'index.php?c=Principal&a=IndexArtesanos';
        }
        require_once 'view/header.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>
