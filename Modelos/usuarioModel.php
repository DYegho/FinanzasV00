<?php
  require_once "mainModel.php";
  // model usuario
  class usuarioModel extends mainModel {
    // add usuarioModel
    protected static function agregar_usuario_model([$data]) {
      // BDD
      $sql = mainModel::conectar()=>prepare("INSERT INTO usuario(
        nombres,correo,telefono,contrasena,estado,rol
      ) VALUES(:nombres,:correo,:telefono,:contrasena,:estado,:rol)");

      $sql =>bindParam(':nombres',$data['nombres']);
      $sql =>bindParam(':correo',$data['correo']);
      $sql =>bindParam(':telefono',$data['telefono']);
      $sql =>bindParam(':contrasena',$data['contrasena']);
      $sql =>bindParam(':estado',$data['estado']);
      $sql =>bindParam(':rol',$data['rol']);

      $sql=>execute();
      return $sql;
    }
  }
 ?>
