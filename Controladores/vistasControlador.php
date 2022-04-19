<?php
require_once "./Modelos/vistasModel.php";
// controlador  vistas
class vistasControlador extends vistasModelo{
    // obtener plantilla
    public function obtener_plantilla_controlador(){
        return require_once "./Vistas/Plantilla.php";
    }

    // obtener vistas
    public function obtener_vistas_controlador(){
        // validate exist
       if(isset($_GET['views'])){
           $ruta=explode("/", $_GET['views']);
           $respuesta=vistasModelo::obtener_vistas_modelo($ruta[0]);
       }else{
           $respuesta="login";
       }
       return $respuesta;
    }
}
