<?php
  require_once "./Config/App.php";
  require_once "./Controladores/vistasControlador.php";
    // instanciar 
  $plantilla= new vistasControlador();
  $plantilla->obtener_plantilla_controlador();