<!doctype html>
<html lang="es">

<head>
  <title>Reestablecer Contraseña</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    body {
      margin-top: 20px;
      background-color: #f2f3f8;
    }

    .card {
      margin-bottom: 1.5rem;
      box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .card {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid #e5e9f2;
      border-radius: .2rem;
    }
  </style>

</head>

<body>

  <div class="container h-100">
    <div class="row h-100">
      <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
        <div class="d-table-cell align-middle">

          <div class="text-center mt-4">
            <h1 class="h2">Reetablecer contraseña</h1>
            <p class="lead">
              Introduce tu correo para reestablecer tu contraseña
            </p>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="m-sm-4">
                <form id="form-recovery">
                  <div class="form-group">
                    <h5 class="mb-2">Email</h5>
                    <input id="corre-ingresado" class="form-control form-control-lg" type="email" placeholder="Introduce tu correo">
                  </div>
                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary" id="enviar-codigo">Enviar código</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    function $(id) {
      return document.querySelector(id);
    }


    $("#form-recovery").addEventListener("submit", (event) => {
      event.preventDefault();

      const parametros = new FormData();
      parametros.append("operacion", "generarCodigo");
      parametros.append("email", $("#corre-ingresado").value);

      const correo = $("#corre-ingresado").value;

      fetch('../../controllers/usuario.controller.php', {
        method: "POST",
        body: parametros
      }).
      then(respueta => respueta.text()).
      then(data => {
          // $("#corre-ingresado").value = '';
          alert("Codigo Generado");
          // alert(respueta);
          console.error(data);
          // window.location.href = `./test/recoverPassword/codigo-reset.php?email=${correo}`;
        }
      ).
      catch(e => {
        console.log(json_encode(e));
      }
      );

      alert(correo);
    });
  </script>
</body>

</html>