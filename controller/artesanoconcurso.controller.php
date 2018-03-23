<?php
require_once 'model/artesanoconcurso.php';

class ArtesanoconcursoController{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ArtesanoConcurso();
    }
    
    public function Crud(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        if (!empty($_REQUEST['nombre-concurso']) && !empty($_REQUEST['id-concurso'])) {
            $_SESSION['nombre-concurso'] = $_REQUEST['nombre-concurso'];
            $_SESSION['id-concurso'] = $_REQUEST['id-concurso'];
            $nombre_concurso = $_REQUEST['nombre-concurso'];
            $id_concurso = $_REQUEST['id-concurso'];
        }else{
            $nombre_concurso = $_SESSION['nombre-concurso'];
            $id_concurso = $_SESSION['id-concurso'];
        }
        require_once 'view/header.php';
        require_once 'view/concurso/artesano-concurso-editar.php';
        require_once 'view/footer.php';
    }
     
    public function Guardar(){
        $artesano_concurso = new ArtesanoConcurso();    
        $artesano_concurso->IdConcurso = $_REQUEST['id-concurso'];
        $artesano_concurso->CURP = $_REQUEST['curp-artesano-concurso'];
        $artesano_concurso->Posicion = $_REQUEST['lugar-concurso'];
        $artesano_concurso->MontoPremio = $_REQUEST['monto-premio-concurso'];
        $resultado = $this->model->Registrar($artesano_concurso);
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
                    'cuerpo' => 'El artesano ya se encuentra registrado en el concurso:<br>'.$_SESSION['nombre-concurso']
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