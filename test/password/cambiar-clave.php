<!doctype html>
<html lang="es">

<head>
  <title>Reset</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v4.3.1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .border-md {
      border-width: 2px;
    }

    .btn-facebook {
      background: #405D9D;
      border: none;
    }

    .btn-facebook:hover,
    .btn-facebook:focus {
      background: #314879;
    }

    .btn-twitter {
      background: #42AEEC;
      border: none;
    }

    .btn-twitter:hover,
    .btn-twitter:focus {
      background: #1799e4;
    }

    body {
      min-height: 100vh;
    }

    .form-control:not(select) {
      padding: 1.5rem 0.5rem;
    }

    select.form-control {
      height: 52px;
      padding-left: 0.5rem;
    }

    .form-control::placeholder {
      color: #ccc;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .form-control:focus {
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="container text-center mt-5">
    <h1 class="mt-5">Reestable tu contraseña</h1>
    <!-- Navbar-->

    <div class="row py-5 mt-4 align-items-center">
      <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
        <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
        <!-- <h1>Reestable tu contraseña</h1> -->
      </div>

      <!-- Formulario de registro-->
      <div class="col-md-7 col-lg-6 ml-auto">
        <form action="#" id="form-reset-clave">
          <div class="row">

            <!-- Email -->
            <div class="input-group col-lg-12 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-envelope text-muted"></i>
                </span>
              </div>
              <input id="email" type="email" name="email" placeholder="Dirección de Email" class="form-control bg-white border-left-0 border-md" required>
            </div>

            <!-- Contraseña -->
            <div class="input-group col-lg-6 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-lock text-muted"></i>
                </span>
              </div>
              <input id="password" type="password" name="password" placeholder="Contraseña" class="form-control bg-white border-left-0 border-md" required>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="input-group col-lg-6 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-lock text-muted"></i>
                </span>
              </div>
              <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
            </div>


            <!-- Submit Button -->
            <div class="form-group col-lg-12 mx-auto mb-0">
              <button id="cambiar-contrasena-btn" class="btn btn-primary btn-block py-2" type="submit">
                <span class="font-weight-bold">Cambiar contraseña</span>
              </button>
            </div>

            <!-- Divider Text -->
            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
              <div class="border-bottom w-100 ml-5"></div>
              <span class="px-2 small text-muted font-weight-bold text-muted">O</span>
              <div class="border-bottom w-100 mr-5"></div>
            </div>


            <!-- Ya registrado -->
            <div class="text-center w-100">
              <p class="text-muted font-weight-bold">¿Ya tienes una cuenta? <a href="../../index.php" class="text-primary ml-2">Iniciar Sesión</a></p>
            </div>

          </div>
        </form>
      </div>
    </div>


  </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    // Para fines de demostración [Cambiar el texto del grupo de entrada en el foco]
    $(function() {
      $('input, select').on('focus', function() {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
      });
      $('input, select').on('blur', function() {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
      });
    });
  </script>

  <script>
    function $(id) {
      return document.querySelector(id);
    }

    //  Obtnemos el ID de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const userEmail = urlParams.get('email');

    // Asigna el valor del correo electrónico al campo de entrada
    $("#email").value = userEmail;

    $("#form-reset-clave").addEventListener("submit", (event) => {
      event.preventDefault();

      const emailInput = $("#email").value;
      const passwordInput = $("#password").value;
      const passwordConfirmationInput = $("#passwordConfirmation").value;

      if (passwordInput === passwordConfirmationInput) {
        alert("Las contraseñas son iguales 👍");

        const parametros = new FormData();
        parametros.append("operacion", "cambiarClave");
        parametros.append("email", emailInput);
        parametros.append("claveacceso", passwordInput);

        fetch(`../../controllers/usuario.controller.php`, {
          method: "POST",
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(data => {

        })
        .catch(e => {
          console.error(e)
        });

      }else{
        alert("Las contraseñas son diferentes 🚨");
      }



    });
  </script>
</body>

</html>