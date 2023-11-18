<?php
session_start();  //  Crea o hereda la sesión

date_default_timezone_set("America/Lima");

require_once '../models/Pago.php';
require_once '../test/filtros.php';

if (isset($_POST['operacion'])) {
  $pago = new FormaPago;

  switch ($_POST['operacion']) {
    case 'listarFormaPago':
      echo json_encode($pago->listaFormasPago());
      break;

    case 'agregarFormaPago':
      $datosEnviar = [
        "formapago" => $_POST["formapago"]
      ];
      echo json_encode($pago->addFormaPago($datosEnviar));
      break;
    
    case 'eliminarFomaPago':
      $datosEnviar = [
        "idformapago" => $_POST["idformapago"]
      ];
      echo json_encode($pago->deleteFormaPago($datosEnviar));
      break;

    default:
      break;
  }
}


