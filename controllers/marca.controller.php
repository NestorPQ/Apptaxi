<?php
session_start();  //  Crea o hereda la sesión

date_default_timezone_set("America/Lima");

require_once '../models/Marca.php';
require_once '../test/filtros.php';

if (isset($_POST['operacion'])) {
  $marca = new Marca;

  switch ($_POST['operacion']) {
    case 'listarMarcas':
      echo json_encode($marca->listarMarcas());
      break;

    case 'agregarMarca':
      $datosEnviar = [
        "marca" => $_POST["marca"]
      ];
      echo json_encode($marca->addMarcas($datosEnviar));
      break;
    
    case 'eliminarMarca':
      $datosEnviar = [
        "idmarca" => $_POST["idmarca"]
      ];
      echo json_encode($marca->deleteMarcas($datosEnviar));
      break;

    default:
      break;
  }
}


