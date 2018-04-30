<?php
require_once 'model/beneficiario.php';
// require_once 'model/exposicion.php';

class BeneficiarioController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Beneficiario();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['nombre-apoyo']) && !empty($_REQUEST['id-apoyo'])) {
            $_SESSION['nombre-apoyo'] = $_REQUEST['nombre-apoyo'];
            $_SESSION['id-apoyo'] = $_REQUEST['id-apoyo'];
            $nombre_apoyo = $_REQUEST['nombre-apoyo'];
            $id_apoyo = $_REQUEST['id-apoyo'];
        }else{
            $nombre_apoyo = $_SESSION['nombre-apoyo'];
            $id_apoyo = $_SESSION['id-apoyo'];
        }
        require_once 'view/header.php';
        require_once 'view/apoyo/beneficiario-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $beneficiario = new Beneficiario();    
        $beneficiario->idApoyo = $_REQUEST['id-apoyo'];
        $beneficiario->curp = $_REQUEST['curp-artesano-apoyo'];
        $beneficiario->monto = $_REQUEST['monto-apoyo-otorgado'];
        $resultado = $this->model->Registrar($beneficiario);
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
                    'cuerpo' => 'El artesano ya se encuentra registrado en el apoyo:<br>'.$_SESSION['nombre-apoyo']
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