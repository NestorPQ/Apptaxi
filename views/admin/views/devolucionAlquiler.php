<!doctype html>
<html lang="es">

<head>
  <title>Alquiler</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 50px;
    }

    .progress-bar {
      width: 0%;
      height: 100%;
      background-color: #4caf50;
      animation: progressAnimation 2s ease-in-out forwards;
    }

    @keyframes progressAnimation {
      0% {
        width: 0%;
      }

      100% {
        width: 100%;
      }
    }
  </style>

</head>

<body>

  <body>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              <progress></progress>
            </div>
            <div class="card-body">
              <h1 class="text-center">Devolución del vehiculo</h1>
              <form autocomplete="off" id="form-caracte" class="form-sm">
                <div class="mb-3">
                  <label for="txtidalquiler" class="form-label">IdAlquiler:</label>
                  <input type="number" class="form-control" id="txtidalquiler" required min="1">
                </div>
                <div class="mb-3">
                  <label for="txtdescripcion" class="form-label">Descripción:</label>
                  <input type="text" class="form-control" id="txtdescripcion" required>
                </div>
                <div class="mb-3">
                  <label for="txtkilometrajefin" class="form-label">Kilometraje:</label>
                  <input type="number" class="form-control" id="txtkilometrajefin" required min="1">
                </div>
                <button type="submit" class="btn btn-primary" id="guardar-caracteristica">Completar registro</button>
              </form>

              <div class="progress mt-4" role="progre_ssbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="display: none;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 95%"></div>
              </div>

            </div>
          </div>
        </div>
        <a href="#" class="mt-5" onclick="history.back(); return false;">
          <button type="button" class="btn btn-primary"> <-- Volver</button>
        </a>
      </div>
    </div>
    <!-- <progress></progress> -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
      document.addEventListener("DOMContentLoaded", () => {

        //-----------------------------------------------
        //  Arrow Functions
        //-----------------------------------------------
        const $ = (id) => document.querySelector(id);
        const getById = (id) => document.getElementById(id);

        //-----------------------------------------------
        //  Obtnemos el ID de la URL
        //-----------------------------------------------
        const urlParams = new URLSearchParams(window.location.search);
        const alquilerId = urlParams.get('idalquiler');

        function establecerId() {
          const idAlquiler = getById("txtidalquiler");
          idAlquiler.setAttribute("value", alquilerId);
          idAlquiler.setAttribute("disabled", "true");
        }

        function limpiarCampos() {
          const campos = [
            "txtidalquiler",
            "txtdescripcion",
            "txtkilometrajefin",
          ];
          campos.forEach((campo) => {
            getById(campo).value = "";
          });
        }

        async function registrarDevolucionVehihulo() {
          try {
            const parametros = new FormData();
            parametros.append("operacion", "devolucionVehiculo");
            parametros.append("idalquiler", $("#txtidalquiler").value);
            parametros.append("descripcion", $("#txtdescripcion").value);
            parametros.append("kilometrajefin", $("#txtkilometrajefin").value);

            const respuesta = await axios.post(`../../../controllers/alquiler.controller.php`, parametros).
            then((response) => {
              response.data.forEach(dato => {
                console.log(dato);
                alert("Vehículo devuelto satisfactoriamente");
                limpiarCampos();
                form.reset();
              });
            });
          } catch (error) {
            console.error(error);
            alert("Hubo un error al procesar la solicitud");
          } finally {
            progressBar.style.display = "none";
          }
        }

        //-----------------------------------------------
        //  Eventos
        //-----------------------------------------------
        const progressBar = $("#progress-bar");
        const form = $("#form-caracte");
        $("#form-caracte").addEventListener("submit", (event) => {
          event.preventDefault();
          if (confirm("¿Estas seguro de Guardar?")) {
            progressBar.style.display = "block";
            registrarDevolucionVehihulo();
            window.location.href = `../index.php`;
          }
        });


        establecerId();
      });
    </script>

  </body>

</html>