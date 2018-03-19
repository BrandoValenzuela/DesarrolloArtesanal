<?php
// include_once 'model/ramaartesanal.php';
class PrincipalController{
    public function Index(){
    	if (empty($_SESSION)) {
			header('Location: index.php');
        }
		// $Rama = new RamaArtesanal();
  //       $ramas = $Rama->Listar(); 
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/footer.php';
    }
}
?>