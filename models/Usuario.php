<?php

require_once '../models/Conexion.php';

class Usuario extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function login($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("call spu_usuarios_login(?)");
      $consulta->execute(
        array(
          $datos['email']
        )
      );
      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarCodigo($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL CambiarClaveAcceso(?,?)");
      $consulta->execute(
        array(
          $datos["email"],
          $datos["claveacceso"]
        )
      );

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
