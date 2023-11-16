<?php
session_start();  //  Crea o hereda la sesión

date_default_timezone_set("America/Lima");

require_once '../models/Vehiculo.php';
require_once '../test/filtros.php';

if (isset($_POST['operacion'])) {
  $vehiculo = new Vehiculo;

  switch ($_POST['operacion']) {
    case 'listarVehiculos':
      echo json_encode($vehiculo->listarVehiculos());

      break;


    default:
      break;
  }
}


