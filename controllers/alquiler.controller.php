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


    case 'registrarAlquiler':

      $datosEnviar = [
        "idformapago"       => $_POST["idformapago"],
        "idvehiculo"        => $_POST["idvehiculo"],
        "idusuario"         => $_POST["idusuario"],
        "fechainicio"       => $_POST["fechainicio"],
        "fechafin"          => $_POST["fechafin"],
        "precioalquiler"    => $_POST["precioalquiler"],
        "kilometrajeini"    => $_POST["kilometrajeini"],
      ];

      echo json_encode($alquiler->registrarAlquiler($datosEnviar));
      break;

    case "devolucionVehiculo":

      $descripcion = filtrar( $_POST["descripcion"]);
      $kilometraje = soloNumero($_POST["kilometrajefin"]);
      $datosEnviar = [
        "idalquiler"      =>  $_POST["idalquiler"],
        "descripcion"     =>  $descripcion,
        "kilometrajefin"  =>  $kilometraje,
      ];

      echo json_encode($alquiler->devolucionVehiculo($datosEnviar));
      break;

    case "listarCantidadVehiculosPorMarca":
      echo json_encode($alquiler->cantidadVehiculosPorMarca());
      break;

    case "alquilerPorMes":
      echo json_encode($alquiler->alquilerersPorMes());
      break;


    default:
      break;
  }
}
