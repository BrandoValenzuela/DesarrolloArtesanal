<?php
require_once 'model/artesano.php';
require_once 'model/ramaartesanal.php';
// require_once 'model/taller.php';
// require_once 'model/artesanoexpo.php';

class ArtesanoController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Artesano();
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
        require_once 'view/artesano/artesano-editar.php';
        require_once 'view/footer.php';
    }
    
    
    public function Guardar(){
        $artesano = new Artesano();
        
        $artesano->CURP = $_REQUEST['curp'];
        $artesano->Nombre = $_REQUEST['Nombre'];
        $artesano->Apaterno = $_REQUEST['aPaterno'];
        $artesano->Amaterno = $_REQUEST['aMaterno'];
        $artesano->Direccion = $_REQUEST['direccion'];
        $artesano->Localidad = $_REQUEST['localidad'];
        $artesano->Municipio = $_REQUEST['municipio'];
        $artesano->idRamaArtesanal = $_REQUEST['ramaartesanal'];
        $artesano->FechaInicioOficio = $_REQUEST['inicio-oficio'];
        $artesano->FechaRegistroSDA = $_REQUEST['fecha-registro-da'];
        $artesano->GastoMensual = $_REQUEST['gasto-mensual'];
        $artesano->IngresoMensual = $_REQUEST['ingreso-mensual'];
        $artesano->TipoVenta = $_REQUEST['tipo-venta'];
        $artesano->TrabajoDomicilio = $_REQUEST['lugar-trabajo'];
        $artesano->PropTaller = $_REQUEST['prop-taller'];
        $artesano->TipoActividad = $_REQUEST['tipo-actividad'];
        $artesano->RFC = $_REQUEST['cadena-rfc'];
        $artesano->FechaAltaRFC = $_REQUEST['fecha-registro-rfc'];
        $artesano->CUIS = $_REQUEST['cadena-cuis'];
        $artesano->AsocPasada = $_REQUEST['asociacion-pasada'];
        $artesano->AsocActual = $_REQUEST['asociacion-actual'];
        $artesano->NombreAsocActual = $_REQUEST['nombre-asoc-actual'];
        $artesano->Fidelidad = $_REQUEST['fidelidad'];
        $artesano->Satisfaccion = $_REQUEST['satisfaccion'];
        $artesano->Necesidades = $_REQUEST['necesidades'];
        $resultado = $this->model->Registrar($artesano);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Exito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
            $this->mostrarMensaje($mensaje);
        }else{
            if ($resultado == 'curp_exitente') {
                $mensaje = array(
                    'titulo' => 'Registro existente',
                    'cuerpo' => 'La CURP que ingresaste ya se encuentra registrada en el sistema.'
                );
            }else{
                $mensaje = array(
                    'titulo' => 'Error',
                    'cuerpo' => 'No fue posible guradar los datos en el sistema. Intenta más tarde.'
                );
            }
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
        $Rama = new RamaArtesanal();
        // $Taller = new Taller();
        // $ArtExpo = new Artesanoexpo();
        $art = $this->model->Obtener($_REQUEST['buscar-artesano-curp']);
        if (!empty($art)) { 
            $ram_art = $Rama->Obtener($art->idRamaArtesanal);
            // $tal = $Taller->ObtenerTallerArtesano($art->curp);
            // $participantes_expo = $ArtExpo->ObtenerExposiciones($art->curp);
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

    // public function BuscarPorApellido(){
    //     if (empty($_SESSION)) {
    //         header('Location: index.php');
    //     }
    //     $artesanos = $this->model->ObtenerPorApellido($_REQUEST['buscar-artesano-ap']);
    //     if (!empty($artesanos)) { 
    //         $apellido = $_REQUEST['buscar-artesano-ap'];
    //         require_once 'view/header.php';
    //         require_once 'view/artesano/artesano-lista.php';
    //         require_once 'view/footer.php'; 
    //     }else{
    //         $mensaje = array(
    //             'titulo' => 'Registro inexistente',
    //             'cuerpo' => 'No hay artesanos registardos con el apellido '.$_REQUEST['buscar-artesano-ap']
    //         );
    //         require_once 'view/header.php';
    //         require_once 'view/principal.php';
    //         require_once 'view/modal-mensajes.php';
    //         require_once 'view/footer.php';
    //     }
    // }

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