<?php
include_once 'model/ramaartesanal.php';

class PrincipalController{
    public function Index(){
    	if (empty($_SESSION)) {
			header('Location: index.php');
        }
		$Rama = new RamaArtesanal();
        $ramas = $Rama->Listar(); 
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/footer.php';
    }

    public function ErrorConexion(){
        $mensaje = array(
            'titulo' => 'Error de conexión',
            'cuerpo' => 'Se presentó un error de conexión a la base de datos.</br>Intenta más tarde.'
        );
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>