<?php

require_once '../models/Conexion.php';

class Alquiler extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarAlquileres()
  {
    try {
      $consulta = $this->conexion->prepare("call taxi.spu_alquileres_listar();");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function listarTotalInfomacion()
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_total_información();");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function registrarAlquiler($datos = [])
  {
    try {
      $consulta = $this->conexion->prepare("CALL spu_alquileres_registrar(?,?,?,?,?,?,?)");
      $consulta->execute(array(
        $datos["idformapago"],
        $datos["idvehiculo"],
        $datos["idusuario"],
        $datos["fechainicio"],
        $datos["fechafin"],
        $datos["precioalquiler"],
        $datos["kilometrajeini"]
      ));

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function devolucionVehiculo($datos = []){
    try {
      $consulta = $this->conexion->prepare("call spu_alquiler_devolucion(?,?,?)");
      $consulta->execute(array(
        $datos["idalquiler"],
        $datos["descripcion"],
        $datos["kilometrajefin"]
      ));

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function cantidadVehiculosPorMarca(){
    try {
      $consulta = $this->conexion->prepare("CALL ObtenerCantidadVehiculosPorMarca()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function alquilerersPorMes(){
    try {
      $consulta = $this->conexion->prepare("call taxi.ObtenerCantidadAlquileresPorMes()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}
