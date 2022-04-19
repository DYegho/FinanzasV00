<?php
// validate Ajax
if ($peticionAjax) {
  require_once "../Modelos/usuarioModel.php";
}else {
  require_once "./Modelos/usuarioModel.php";
}
class usuarioControlador extends usuarioModel{
  // add usuarioControlador
  public function agregar_usuario_controlador(){
    $nombre=mainModel::limpiarcadena($_POST['nombres_reg']);
    $nombre=mainModel::limpiarcadena($_POST['nombres_reg']);
    $nombre=mainModel::limpiarcadena($_POST['nombres_reg']);
    $nombre=mainModel::limpiarcadena($_POST['nombres_reg']);

  }
}
 ?>
