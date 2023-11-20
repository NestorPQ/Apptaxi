<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h1 class="card-title  text-monospace  text-center">Registro de los usuarios</h1>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive ">
          <table class="table table-hover table-bordered">
            <thead class="text-white text-center bg-secondary">
              <tr>
                <th class="col-1">N°</th>
                <th class="col-1">Nombre</th>
                <th class="col-1">Apellido</th>
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
        // console.log(dato);

        formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${dato.nombres}</td>
                <td class="text-center">${dato.apellidos}</td>
                <td class="text-center">${dato.telefono}</td>
                <td class="text-center">${dato.email}</td>
                <td class="text-center">${dato.nivelacceso}</td>
                <td class="text-center">${dato.user_estado}</td>
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
