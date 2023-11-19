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


  // public function eliminarVehiculo($dato = [])
  // {
  //   try {
  //     $consulta = $this->conexion->prepare("call spu_vehiculos_eliminar_logico(?)");
  //     $consulta->execute(
  //       array(
  //         $dato["idvehiculo"]
  //       )
  //     );

  //     return $consulta->fetchAll(PDO::FETCH_ASSOC);
  //   } catch (Exception $e) {
  //     die($e -> getMessage());
  //   }
  // }
  // public function listarVehiculos()
  // {
  //   try {
  //     $consulta = $this->conexion->prepare("call spu_vehiculos_listar()");
  //     $consulta->execute();
  //     return $consulta->fetchAll(PDO::FETCH_ASSOC);
  //   } catch (Exception $e) {
  //     die($e -> getMessage());
  //   }
  // }
  // public function agregarVehiculo($dato = [])
  // {
  //   try {
  //     $consulta = $this->conexion->prepare("call spu_vehiculos_registrar(?,?,?,?,?,?,?,?)");
  //     $consulta->execute(
  //       array(
  //         $dato['idmarca'],
  //         $dato['tipo'],
  //         $dato['placa'],
  //         $dato['color'],
  //         $dato['costo_alquiler'],
  //         $dato['tipocombustible'],
  //         $dato['año'],
  //         $dato['fotografia']
  //       )
  //     );
  //     return $consulta->fetchAll(PDO::FETCH_ASSOC);
  //   } catch (Exception $e) {
  //     die($e -> getMessage());
  //   }
  // }


}
