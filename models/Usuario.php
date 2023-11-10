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
      $consulta = $this->conexion->prepare("CALL generarClave(?,?)");
      $consulta->execute(
        array(
          $datos["email"],
          $datos["clavegenerada"]
        )
      );

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function buscarEmail($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_buscar_email(?)");
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

  public function ponerNullCodigo($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL ResetearClaveGenerada(?);");
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
  public function cambiarClave($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL CambiarClaveAcceso(?,?)");
      $consulta->execute(
        array(
          $datos['email'],
          $datos['claveacceso']
        )
      );
      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
