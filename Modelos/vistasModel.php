<?php
    class vistasModelo{

        // modelo de vistas
        protected static function obtener_vistas_modelo($vistas){
            $listaAcceso=["registrate","home","cliente-list","cliente-new","empresa","cliente-search","cliente-update","home","item-list","item-new","item-search","item-update","reservation-list","reservation-new","reservation-pending","reservation-search","reservation-update","usuario-list","reservation-reservation","usuario-new","usuario-search","usuario-update"];
            // validate exist name
            if(in_array($vistas, $listaAcceso)){
                if (is_file("./Vistas/Contenidos/".$vistas."-view.php")) {
                    $contenido="./Vistas/Contenidos/".$vistas."-view.php";
                }else{
                    $contenido="404";
                }
            // VALIDATE = FALSE
            }elseif($vistas=="login" || $vistas=="index"){
                $contenido="login";
            }else{
                $contenido="404";
            }
            return $contenido;
        }
    }
