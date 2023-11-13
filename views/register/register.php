<!doctype html>
<html lang="es">

<head>
  <title>Registrarme</title>
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
    <h1 class="mt-5"><strong>Crear una cuenta</strong></h1>
    <!-- Navbar-->

    <div class="row py-5 mt-4 align-items-center">
      <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
        <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
        <!-- <h1>Reestable tu contraseña</h1> -->
      </div>

      <!-- Formulario de registro-->
      <div class="col-md-7 col-lg-6 ml-auto">
        <form action="#" id="form-registrar-usuario">
          <div class="row">

            <!-- Nombre -->
            <div class="input-group col-lg-12 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-user text-muted"></i>
                </span>
              </div>
              <input id="nombre" type="text" name="nombre" placeholder="Nombre" class="form-control bg-white border-left-0 border-md" required>
            </div>

            <!-- Apellido -->
            <div class="input-group col-lg-12 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-user text-muted"></i>
                </span>
              </div>
              <input id="apellido" type="text" name="apellido" placeholder="Apellido" class="form-control bg-white border-left-0 border-md" required>
            </div>

            <!-- Email -->
            <div class="input-group col-lg-12 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-envelope text-muted"></i>
                </span>
              </div>
              <input id="email" type="email" name="email" placeholder="Dirección de Email" class="form-control bg-white border-left-0 border-md" required>
            </div>

            <!-- Telefono -->
            <div class="input-group col-lg-12 mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white px-4 border-md border-right-0">
                  <i class="fa fa-phone text-muted"></i>
                </span>
              </div>
              <input id="telefono" type="number" name="telefono" placeholder="Telefono" class="form-control bg-white border-left-0 border-md" maxlength="9" oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' required>
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
                <span class="font-weight-bold">Registrarte</span>
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

  <script>
    function $(id) {
      return document.querySelector(id);
    }



    $("#form-registrar-usuario").addEventListener("submit", (event) => {
      event.preventDefault();

      const nombre = $("#nombre").value;
      const apellido = $("#apellido").value;
      const email = $("#email").value;
      const telefono = $("#telefono").value;
      const password = $("#password").value;
      const passwordConfirmation = $("#passwordConfirmation").value;

      const parametros = new FormData();
      parametros.append("operacion", "registrarUsuario");
      parametros.append("nombre", nombre);
      parametros.append("apellido", apellido);
      parametros.append("email", email);
      parametros.append("telefono", telefono);
      parametros.append("claveacceso", password);


      if (password === passwordConfirmation) {
        alert("las contraseñas son iguales ✅");

        fetch(`../../controllers/usuario.controller.php`, {
          method: "POST",
          body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(data => {
          console.log(data);

        })
        .catch(e => {
          console.error(e);
        });
      }else{
        alert("las contraseñas son diferentes 🚨");
      }



    });
  </script>
</body>

</html>