<?php
session_start();


if (isset($_SESSION["status"]) && $_SESSION["status"] == true) {
  header("Location: ./views/index/index.php");
  exit;

}

?>
<!doctype html>
<html lang="es">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <img src="https://portaldeltaxista.atu.gob.pe/wp-content/uploads/2021/06/taxista.png" alt="illustration" class="illustration" />
        <br>
        <br>
        <form action="" id="form-login" autocomplete="off">
          <div class="mb-3">
            <input type="email" id="email" placeholder="CORREO" required />
          </div>
          <div class="mb-3">
            <input type="password" id="claveacceso" placeholder="CONTRASEÑA" required />
          </div>
          <button class="opacity">INICIAR SESSIÓN</button>
        </form>
        <div class="register-forget opacity">
          <a href="./views/register/register.php">REGISTRARME</a>
        </div>
        <div class="register-forget opacity">
          <a href="../Apptaxi/test/password/recuperar.php">CAMBIAR CONTRASEÑA</a>
        </div>
      </div>
      <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="./js/login.js"></script>
<script>
  function $(id) {
    return document.querySelector(id);
  }

  $("#form-login").addEventListener("submit", (event) => {
    event.preventDefault();

    parametros = new FormData();
    parametros.append("operacion", "login");
    parametros.append("email", $("#email").value);
    parametros.append("claveacceso", $("#claveacceso").value);

    fetch(`../AppTaxi/controllers/usuario.controller.php`, {
        method: "POST",
        body: parametros
      })
      .then(respuesta => respuesta.json())
      .then(datos => {
        // console.log(datos);
        // console.clear()
        // hipervinculo activado de forma inmediata
        if (datos.acesso) {
          alert("Clave correcta");
          window.location.href = './views/index/index.php';
        } else {
          alert(datos.mensaje);
        }
      })
      .catch(e => {
        console.error(e)
      });
  });
</script>
</body>

</html>