<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />

    <style>
      body {
        margin-top: 20px;
        background: #f6f9fc;
      }

      .icon-circle[class*="text-"] [fill]:not([fill="none"]),
      .icon-circle[class*="text-"] svg:not([fill="none"]),
      .svg-icon[class*="text-"] [fill]:not([fill="none"]),
      .svg-icon[class*="text-"] svg:not([fill="none"]) {
        fill: currentColor !important;
      }

      .svg-icon-xl > svg {
        width: 3.25rem;
        height: 3.25rem;
      }

      .hover-lift-light {
        transition: box-shadow 0.25s ease, transform 0.25s ease,
          color 0.25s ease, background-color 0.15s ease-in;
      }

      .mt-4 {
        margin-top: 1.5rem !important;
      }

      .w-100 {
        width: 100% !important;
      }

      .btn-group-lg > .btn,
      .btn-lg {
        padding: 0.8rem 1.85rem;
        font-size: 1.1rem;
        border-radius: 0.3rem;
      }

      .btn-purple {
        color: #fff;
        background-color: #6672e8;
        border-color: #6672e8;
      }

      .text-center {
        text-align: center !important;
      }

      .py-4 {
        padding-top: 1.5rem !important;
        padding-bottom: 1.5rem !important;
      }

      .form-control-lg {
        min-height: calc(1.5em + 1rem + 2px);
        padding: 0.5rem 1rem;
        font-size: 1.25rem;
        border-radius: 0.3rem;
      }

      .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #1e2e50;
        background-color: #f6f9fc;
        background-clip: padding-box;
        border: 1px solid #dee2e6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }

      .form-control-lg {
        min-height: calc(1.5em + 1rem + 2px);
        padding: 0.5rem 1rem;
        font-size: 1.5rem;
        /* Ajusta este valor según tus preferencias */
        border-radius: 0.3rem;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="row justify-content-center mt-7">
        <div class="col-lg-5 text-center">
          <a href="index.html">
            <img src="" alt="" />
          </a>
          <div class="card mt-5">
            <div class="card-body py-5 px-lg-5">
              <div class="svg-icon svg-icon-xl text-purple">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="512"
                  height="512"
                  viewBox="0 0 512 512"
                >
                  <title>ionicons-v5-g</title>
                  <path
                    d="M336,208V113a80,80,0,0,0-160,0v95"
                    style="
                      fill: none;
                      stroke: #000;
                      stroke-linecap: round;
                      stroke-linejoin: round;
                      stroke-width: 32px;
                    "
                  ></path>
                  <rect
                    x="96"
                    y="208"
                    width="320"
                    height="272"
                    rx="48"
                    ry="48"
                    style="
                      fill: none;
                      stroke: #000;
                      stroke-linecap: round;
                      stroke-linejoin: round;
                      stroke-width: 32px;
                    "
                  ></rect>
                </svg>
              </div>
              <h3 class="fw-normal text-dark mt-4">Codigo de veficación</h3>
              <p class="mt-4 mb-1">Revisa tu bandeja de entrada</p>
              <p>Introduce tu codigo de 6 digitos</p>

              <form action="" id="codigo-form">
                <div class="row mt-4 pt-2">
                  <div class="col">
                    <input
                      id="cod01"
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      autofocus=""
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="number"
                      class="form-control form-control-lg text-center py-4 verification-input"
                      maxlength="1"
                      required
                    />
                  </div>
                </div>

                <button
                  id="confirmar-codigo"
                  type="submit"
                  class="btn btn-purple btn-lg w-100 hover-lift-light mt-4"
                >
                  Verificar mi codigo
                </button>
              </form>
            </div>
          </div>

          <p class="text-center text-muted mt-4">
            ¿No recibiste nada?
            <a href="#" class="text-decoration-none ms-2"> Reenviar Codigo </a>
          </p>
        </div>
      </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        function $(id) {
          return document.querySelector(id);
        }

        const inputs = document.querySelectorAll(".verification-input");
        const confirmarCodigoBtn = $("#codigo-form");

        inputs.forEach((input, index) => {
          input.addEventListener("input", (event) => {
            if (
              event.inputType === "insertText" &&
              /^[0-9]$/.test(event.data)
            ) {
              if (index < inputs.length - 1) {
                inputs[index + 1].focus();
              }
            }
          });

          input.addEventListener("keyup", (event) => {
            if (event.key === "Backspace" && index > 0) {
              // Si se presiona la tecla de retroceso y estamos en un input diferente al primero, retroceder al input anterior
              inputs[index - 1].focus();
            }
          });
        });

        confirmarCodigoBtn.addEventListener("submit", (event) => {
          event.preventDefault();

          const urlParams = new URLSearchParams(window.location.search);
          const userEmail = urlParams.get("email");
          const codigo = Array.from(inputs)
            .map((input) => input.value)
            .join("");

          // alert("Tu código es: " + codigo);
          // alert(userEmail);

          const parametros = new FormData();
          parametros.append("operacion", "confirmarcodigo");
          parametros.append("email", userEmail);

          fetch(`../../controllers/usuario.controller.php`, {
            method: "POST",
            body: parametros,
          })
            .then((respuesta) => respuesta.json())
            .then((data) => {
              if (data.clavegenerada == codigo) {
                alert("Los codigo coinciden 👍");
                window.location.href = `cambiar-clave.php?email=${data.email}`;
                
              } else {
                alert("Los codigo no coinciden 🚨");
              }

            })
            .catch((e) => {
              console.error(e);
            });
        });
      });
    </script>
  </body>
</html>
