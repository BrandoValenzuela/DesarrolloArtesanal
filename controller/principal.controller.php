<?php
include_once 'model/ramaartesanal.php';
include_once 'model/artesano.php';
include_once 'model/producto.php';
include_once 'model/taller.php';
include_once 'model/concurso.php';
include_once 'model/exposicion.php';
include_once 'model/tallerista.php';
include_once 'model/capacitacion.php';

class PrincipalController{

    public function Index(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Artesano = new Artesano();
        $Producto = new Producto();
        $Rama = new RamaArtesanal();
        $Taller = new Taller();
        $Concurso = new Concurso();
        $Exposicion = new Exposicion();
        $Tallerista = new Tallerista();
        $Capacitacion = new Capacitacion();
        $artesanos = $Artesano->ObtenerTotalArtesanos();
        $talleres = $Taller->ObtenerTotalTalleres();
        $ramas = $Rama->Listar();
        $productos = $Producto->Listar();
        $concursos = $Concurso->ObtenerConcursosTotales();
        $expos = $Exposicion->ObtenerExposTotales();
        $talleristas = $Tallerista->ObtenerTalleristasTotales();
        $capacitaciones = $Capacitacion->ObtenerCapacitacionesTotales();
        $_SESSION = ['artesanos' => $artesanos,'talleres' => $talleres, 'ramas' => $ramas, 'productos' => $productos];
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/footer.php';
    }

    public function IndexArtesanos(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar(); 
        $_SESSION['metodo-busqueda'] = '';
        $_SESSION['busqueda'] = '';
        require_once 'view/header.php';
        require_once 'view/artesano/artesano-principal.php';
        require_once 'view/footer.php';
    }

    public function IndexCapacitaciones(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar();
        $_SESSION['metodo-busqueda'] = '';
        $_SESSION['busqueda'] = '';
        require_once 'view/header.php';
        require_once 'view/capacitaciones/principal-capacitacion.php';
        require_once 'view/footer.php';
    }

    public function IndexConcursosExposiciones(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar(); 
        $_SESSION['metodo-busqueda'] = '';
        $_SESSION['busqueda'] = '';
        require_once 'view/header.php';
        require_once 'view/concurso/concurso-exposicion-principal.php';
        require_once 'view/footer.php';
    }

    public function IndexApoyosCompras(){
        if (empty($_SESSION)) {
            header('Location: index.php');
        }
        $Rama = new RamaArtesanal();
        $ramas = $Rama->Listar(); 
        $_SESSION['metodo-busqueda'] = '';
        $_SESSION['busqueda'] = '';
        require_once 'view/header.php';
        require_once 'view/apoyo/apoyo-compra-principal.php';
        require_once 'view/footer.php';
    }

    public function ErrorConexion(){
        $mensaje = array(
            'titulo' => 'Error de conexión',
            'cuerpo' => 'Se presentó un error de conexión a la base de datos.</br>Intenta más tarde.'
        );
        $redireccion = 'index.php?c=Principal';
        require_once 'view/header.php';
        require_once 'view/principal.php';
        require_once 'view/modal-mensajes.php';
        require_once 'view/footer.php';
    }
}
?>