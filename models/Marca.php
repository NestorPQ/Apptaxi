<?php

require_once '../models/Conexion.php';

class Marca extends Conexion
{
  private $conexion;

  public function __CONSTRUCT()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarMarcas()
  {
    try {
      $consulta = $this->conexion->prepare("call taxi.spu_marcas_listar();");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }

  public function addMarcas($dato = []){
    try {
      $consulta = $this->conexion->prepare("call spu_marcas_registrar(?)");
      $consulta->execute(
        array(
          $dato["marca"]
        )
      );
    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }

  public function editMarcas($dato = []){

  }

  public function deleteMarcas($dato = []){
    try {
      $consulta = $this -> conexion -> prepare("CALL sp_marcas_eliminar(?)");
      $consulta->execute(
        array(
          $dato["idmarca"]
        ));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      die($e -> getMessage());
    }
  }
}
