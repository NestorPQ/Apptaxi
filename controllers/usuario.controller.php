<?php
session_start();  //  Crea o hereda la sesión

date_default_timezone_set("America/Lima");

require_once '../vendor/autoload.php';
require_once '../models/Usuario.php';
require_once '../test/password/email.php';
require_once '../test/filtros.php';

if (isset($_POST['operacion'])) {
  $usuario = new Usuario;

  switch ($_POST['operacion']) {
    case 'login':
      $datosEnviar = ["email" => $_POST["email"]];

      $registro = $usuario->login($datosEnviar);

      $statusLogin = [
        "acesso"    => false,
        "mensaje"   => ""
      ];

      if ($registro == false) {

        $_SESSION["status"] = false;
        $statusLogin["mensaje"] = "El correo no existe";
      } else {
        $claveEncriptada = $registro["claveacceso"];
        $_SESSION["idusuario"]      = $registro["idusuario"];
        $_SESSION["apellidos"]      = $registro["apellidos"];
        $_SESSION["nivelacceso"]    = $registro["nivelacceso"];

        if (password_verify($_POST["claveacceso"], $claveEncriptada)) {
          $_SESSION["status"] = true;
          $statusLogin["acesso"] = true;
          $statusLogin["mensaje"] = "La clave y el acceso son correctos";
        } else {
          $_SESSION["status"] = true;
          $statusLogin["mensaje"] = "Error en la clave";
        }
      }

      echo json_encode($statusLogin);

      break;

    case 'generarCodigo':

      $numero = mt_rand(100000, 999999);
      $digitos = strval($numero);
      $correo = $_POST["email"];

      $datosEnviar = [
        "email"         => $_POST["email"],
        "clavegenerada"   => $digitos
      ];

      // enviamos el codigo al correo
      enviarEmail($correo, $digitos);


      echo json_encode($usuario->generarCodigo($datosEnviar));

      break;

    case "confirmarcodigo":
      $datosEnviar = [
        "email" => $_POST["email"],
      ];


      echo json_encode($usuario->buscarEmail($datosEnviar));


      break;


    case "cambiarClave":

      $clave = $_POST["claveacceso"];

      $claveEncriptada = password_hash($clave, PASSWORD_BCRYPT);

      $datosEnviar = [
        "email"         => $_POST["email"],
        "claveacceso"   => $claveEncriptada
      ];

      echo json_encode($usuario->cambiarClave($datosEnviar));

      $resetClaveGenerada = [
        "email" => $_POST["email"]
      ];

      $usuario->ponerNullCodigo($resetClaveGenerada);
      break;
    case "registrarUsuario":

      $nombre = filtrar($_POST["nombre"]);
      $apellido = filtrar($_POST["apellido"]);
      $telefono = eliminarNoNumeros($_POST["telefono"]);

      $clave = $_POST["claveacceso"];
      $claveEncriptada = password_hash($clave, PASSWORD_BCRYPT);

      $datosEnviar = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $_POST["email"],
        "telefono" => $telefono,
        "claveacceso" => $claveEncriptada
      ];

      echo json_encode($usuario->registrarUsuario($datosEnviar));
      break;

    case "listarUsuarios":
      echo json_encode($usuario->listarUsuarios());
      break;

    case "listarUsuariosEstado":
      echo json_encode($usuario->listarUsuariosEstado());
      break;

    default:
      break;
  }
}


if (isset($_GET['operacion'])) {
  if ($_GET['operacion'] == 'destroy') {
    session_destroy();
    session_unset();

    header("Location: ../index.php");
  }
}
