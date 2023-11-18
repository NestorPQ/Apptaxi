<?php

require_once '../models/Conexion.php';

class FormaPago extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listaFormasPago()
  {
    try {
      $consulta = $this->conexion->prepare("call taxi.spu_formapagos_listar();");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }

  public function addFormaPago($dato = []){
    try {
      $consulta = $this->conexion->prepare("call spu_formapagos_registrar(?)");
      $consulta->execute(
        array(
          $dato["formapago"]
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }

  public function editMarcas($dato = []){

  }

  public function deleteFormaPago($dato = []){
    try {
      $consulta = $this -> conexion -> prepare("CALL sp_formapagos_eliminar(?)");
      $consulta->execute(
        array(
          $dato["idformapago"]
        ));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
}
