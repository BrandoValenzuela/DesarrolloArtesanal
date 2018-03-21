<?php
require_once 'model/artesanoexpo.php';
require_once 'model/exposicion.php';

class ArtesanoexpoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ArtesanoExpo();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['nombre-exposicion']) && !empty($_REQUEST['id-exposicion'])) {
            $_SESSION['nombre-exposicion'] = $_REQUEST['nombre-exposicion'];
            $_SESSION['id-exposicion'] = $_REQUEST['id-exposicion'];
            $nombre_expo = $_REQUEST['nombre-exposicion'];
            $id_expo = $_REQUEST['id-exposicion'];
        }else{
            $nombre_expo = $_SESSION['nombre-exposicion'];
            $id_expo = $_SESSION['id-exposicion'];
        }
        require_once 'view/header.php';
        require_once 'view/exposicion/artesano-expo-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $artesano_expo = new ArtesanoExpo();    
        $artesano_expo->IdExpo = $_REQUEST['id-expo'];
        $artesano_expo->CURP = $_REQUEST['curp-artesano-expo'];
        $artesano_expo->IngresoArtesanoExpo = $_REQUEST['ingreso-artesano-expo'];
        $artesano_expo->InversionArtesanoExpo = $_REQUEST['inversion-artesano-expo'];
        $resultado = $this->model->Registrar($artesano_expo);
        if ($resultado == 'exito') {
            $mensaje = array(
                'titulo' => 'Exito',
                'cuerpo' => 'Los datos se guardaron satisfactoriamente.'
            );
            $this->mostrarMensaje($mensaje);
        }else{
            if ($resultado == 'nombre_existente') {
                $mensaje = array(
                    'titulo' => 'Artesano ya inscrito',
                    'cuerpo' => 'El artesano ya se encuentra registrado en la exposición:<br>'.$_SESSION['nombre-exposicion']
                );
            }elseif ($resultado == 'registro_inexistente'){
                $mensaje = array(
                    'titulo' => 'CURP no encontrada',
                    'cuerpo' => 'La CURP que ingresaste no se encuentró en el sistema.</br>Para guardar la información que ingresaste, el artesano debe estar registrado en el sistema.'
                );
            }
            $this->mostrarMensaje($mensaje);
        }
        // $artesano->id > 0 
        //     ? $this->model->Actualizar($artesano)
        //     : $this->model->Registrar($artesano);
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