<?php
session_start();  //  Crea o hereda la sesión

date_default_timezone_set("America/Lima");

require_once '../models/Alquiler.php';
require_once '../test/filtros.php';

if (isset($_POST['operacion'])) {
  $alquiler = new Alquiler;

  switch ($_POST['operacion']) {
    case 'listarAquileres':
      echo json_encode($alquiler->listarAlquileres());
      break;

    case 'listarTotalInformacion':
      echo json_encode($alquiler->listarTotalInfomacion());
      break;

    // case 'listarVehiculos':
    //   echo json_encode($vehiculo->listarVehiculos());
    //   break;

    // case 'eliminarVehiculo':
    //   $datosEnviar = [
    //     "idvehiculo" => $_POST["idvehiculo"]
    //   ];
    //   echo json_encode($vehiculo->eliminarVehiculo($datosEnviar));
    //   break;

    // case 'registrarVehiculo':
    //   $color      = filtrar($_POST["color"]);
    //   $tipocombustible = filtrar($_POST["tipocombustible"]);
    //   $tipo = filtrar($_POST["tipo"]);
    //   $datosEnviar = [
    //     "idmarca" => $_POST["idmarca"],
    //     "tipo" => $tipo,
    //     "placa" => $_POST["placa"],
    //     "color" => $color,
    //     "costo_alquiler" => $_POST["costo_alquiler"],
    //     "tipocombustible" => $tipocombustible,
    //     "año" => $_POST["año"],
    //     "fotografia" => "",
    //   ];
    //   echo json_encode($vehiculo->agregarVehiculo($datosEnviar));
    //   break;

    default:
      break;
  }
}


