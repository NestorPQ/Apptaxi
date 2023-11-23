<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h1 class="card-title text-monospace text-center">
            Registro de los usuarios
          </h1>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="text-white text-center bg-secondary">
              <tr>
                <th class="col-1">N°</th>
                <th class="col-1">Nombre Completo</th>
                <th class="col-1">Telefono</th>
                <th class="col-1">Correo</th>
                <th class="col-1">Nivel de Acceso</th>
                <th class="col-1">Estado</th>
                <th class="col-1">Acción</th>
              </tr>
            </thead>
            <tbody class="text-center" id="tabla-usuarios"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
  <!-- <button
    type="button"
    class="btn btn-primary"
    data-toggle="modal"
    data-target="#exampleModal"
  >
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <!-- <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    data-backdrop="false"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-header bg-primary rounded-0">
          <h5 class="modal-title text-white" id="exampleModalLabel">
            Modal title
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary rounded-0"
            data-dismiss="modal"
          >
            Close
          </button>
          <button type="button" class="btn btn-info rounded-0">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Fin del modal -->

  <script>
    let datosVehiculos = [];

    //-----------------------------------------------
    //  Funciones
    //-----------------------------------------------

    function $(id) {
      return document.querySelector(id);
    }

    function controlDevolucion(fechaFin = "") {
      const fechaActual = new Date();
      const fechaEvaluar = new Date(fechaFin);

      const diferenciaEnMs = fechaEvaluar - fechaActual;
      const unDiaEnMs = 1000 * 60 * 60 * 24;

      if (diferenciaEnMs > 0) {
        const diasRestantes = Math.ceil(Math.abs(diferenciaEnMs) / unDiaEnMs);
        return {
          diasAtraso: 0,
          fechaPasada: false,
          diasRestantes: diasRestantes + 1,
        };
      } else {
        const diasAtraso = Math.floor(Math.abs(diferenciaEnMs) / unDiaEnMs);
        return {
          diasAtraso: diasAtraso,
          fechaPasada: true,
          diasRestantes: 0,
        };
      }
    }

    async function obtenerDatosusuario() {
      try {
        const parametros = new FormData();
        parametros.append("operacion", "listarUsuariosEstado");

        const respuesta = await fetch(
          `../../controllers/usuario.controller.php`,
          {
            method: "POST",
            body: parametros,
          }
        );

        if (!respuesta.ok) {
          throw new Error("Error al obtener los datos");
        }

        const datos = await respuesta.json();
        return datos;
      } catch (error) {
        console.log(error);
        return [];
      }
    }

    function verificarEstado(estado) {
      let estadoHTML = "";

      switch (estado) {
        case "ACTIVO":
          estadoHTML = `<button type="" class="btn btn-success" disabled>${estado}</button>`;
          break;
        case "INACTIVO":
          estadoHTML = `<button type="" class="btn btn-danger" disabled>${estado}</button>`;
          break;
        default:
          estadoHTML = `<button type="" class="btn btn-info" disabled>sin dato</button>`;
          break;
      }

      return estadoHTML;
    }

    function verificarNivelAcceso(nivelAcc) {
      let nivelaccesoHTML = "";

      switch (nivelAcc) {
        case "USER":
          nivelAccesoHTML = `<button type="" class="btn btn-secondary" disabled>${nivelAcc}</button>`;
          break;
        case "ADMI":
          nivelAccesoHTML = `<button type="" class="btn btn-info" disabled>${nivelAcc}</button>`;
          break;
        default:
          nivelAccesoHTML = `<button type="" class="btn btn-info" disabled>SIN DATO</button>`;

          break;
      }

      return nivelAccesoHTML;
    }

    function construirEstadoDevolucion(resultado) {
      let estado = "";

      if (resultado.fechaPasada) {
        if (resultado.diasAtraso === 1) {
          estado = `
        <button type="" class="btn btn-danger" disabled>
          ${resultado.diasAtraso} un día atrasado
        </button>
      `;
        } else {
          estado = `
        <button type="" class="btn btn-danger" disabled>
          ${resultado.diasAtraso} días atrasados
        </button>
      `;
        }
      } else {
        if (resultado.diasRestantes === 1) {
          estado = `
        <button type="" class="btn btn-warning" disabled>
          ${resultado.diasRestantes} día restante
        </button>
      `;
        } else {
          estado = `
        <button type="" class="btn btn-warning" disabled>
          ${resultado.diasRestantes} días restantes
        </button>
      `;
        }
      }

      return estado;
    }

    function construirHTML(datos) {
      let formHTML = "";
      let numFila = 1;

      datos.forEach((dato) => {
        const nivelAccesoHTML = verificarNivelAcceso(dato.nivelacceso);
        const estadoHTML = verificarEstado(dato.user_estado);

        const telefonOculto = dato.telefono.slice(0, -4) + "****";
        // console.log(dato);
        // console.log(nivelAccesoHTML);
        // console.log(dato.nivelacceso);

        formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${dato.apellidos}, ${dato.nombres}</td>
                <td class="text-center">${telefonOculto}</td>
                <td class="text-center">${dato.email}</td>
                <td class="text-center">${nivelAccesoHTML}</td>
                <td class="text-center">${estadoHTML}</td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info" disabled>Desactivar</button>
                    <button type="button" class="btn btn-outline-warning" disabled>Dar Admi</button>
                  </div>       
                </td>
              </tr> 
              `;
        numFila++;
      });

      return formHTML;
    }

    function actualizarContenidoHTML(html) {
      const formContainer = document.getElementById("tabla-usuarios");
      formContainer.innerHTML = html;
    }

    async function mostrarUsuarios() {
      try {
        const datos = await obtenerDatosusuario();
        const formHTML = construirHTML(datos);
        actualizarContenidoHTML(formHTML);
      } catch (error) {
        console.error(error);
      }
    }

    //-----------------------------------------------
    //  Eventos
    //-----------------------------------------------

    document.addEventListener("DOMContentLoaded", () => {
      mostrarUsuarios();
    });
  </script>
</div>
