<?php

require_once '../models/Conexion.php';

class Vehiculo extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarVehiculos()
  {
    try {
      $consulta = $this->conexion->prepare("call spu_vehiculos_listar_catalogo()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
}
