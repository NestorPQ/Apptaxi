<?php

require_once '../models/Conexion.php';

class Vehiculo extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function actualizarKilometraje($datos = []){
    try {
      $consulta = $this->conexion->prepare('call spu_vehiculos_actualizar_quilometraje(?,?)');
      $consulta->execute(array(
        $datos["idvehiculo"],
        $datos["kilometraje"]
      ));

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
      
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function listarCatalogoVehiculos()
  {
    try {
      $consulta = $this->conexion->prepare("call spu_vehiculos_listar_catalogo()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
  public function eliminarVehiculo($dato = [])
  {
    try {
      $consulta = $this->conexion->prepare("call spu_vehiculos_eliminar_logico(?)");
      $consulta->execute(
        array(
          $dato["idvehiculo"]
        )
      );

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
  public function listarVehiculos()
  {
    try {
      $consulta = $this->conexion->prepare("call spu_vehiculos_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
  public function agregarVehiculo($dato = [])
  {
    try {
      $consulta = $this->conexion->prepare("call spu_vehiculos_registrar(?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $dato['idmarca'],
          $dato['tipo'],
          $dato['placa'],
          $dato['color'],
          $dato['costo_alquiler'],
          $dato['tipocombustible'],
          $dato['año'],
          $dato['fotografia']
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }


}
