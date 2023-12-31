<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">ALQUILERES ACTIVOS</h4>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="text-primary text-center">
              <tr>
                <th class="col-1">N°</th>
                <th class="col-1">Tipo</th>
                <th class="col-1">FormaPago</th>
                <th class="col-1">Placa</th>
                <th class="col-1">Apellido</th>
                <th class="col-1">Nombre</th>
                <th class="col-1">Email</th>
                <th class="col-1">DiasProgramados</th>
                <th class="col-1">Estado</th>
                <th class="col-1">PrecioSubTotal</th>
                <th class="col-1">Acción</th>
              </tr>
            </thead>
            <tbody class="text-center" id="tabla-alquileres"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <p class="me-3">
    <button
      class="btn btn-primary"
      type="button"
      data-toggle="collapse"
      data-target="#collapseExample"
      aria-expanded="false"
      aria-controls="collapseExample"
    >
      REGISTRAR ALQUILER
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <div class="card card-sm">
        <div class="card-body bg-light">
          <form id="form-alquiler">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtvehiculo">Vehículos Disponibles</label>
                  <select class="form-control" id="txtvehiculo" required>
                    <option value="">Seleccione un vehículo</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtusuario">Usuario</label>
                  <select class="form-control" id="txtusuario" required>
                    <option value="">Seleccione un usuario</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtCostoAlquiler"
                    >Costo de alquiler por día</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="txtCostoAlquiler"
                    min="1"
                    aria-describedby="Costo de alquiler por día"
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="txtkilometraje">Kilometraje</label>
                  <input
                    type="number"
                    class="form-control"
                    id="txtkilometraje"
                    aria-describedby="Kilometraje"
                    maxlength="30"
                    min="1"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtformapago">Forma de Pago</label>
                  <select class="form-control" id="txtformapago" required>
                    <option value="">Seleccione una forma de pago</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtfechainicio">Fecha Inicio</label>
                  <input
                    type="date"
                    class="form-control"
                    id="txtfechainicio"
                    aria-describedby="Fecha Inicio"
                    min="0"
                    disabled
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="txtfechadevolucion">Fecha Devolución</label>
                  <input
                    type="date"
                    class="form-control"
                    id="txtfechadevolucion"
                    aria-describedby="Fecha Devolución"
                    required
                  />
                  <small id="txtAño" class="form-text text-muted"
                    >* 100 días como máximos establecidos</small
                  >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button
                  type="submit"
                  class="btn btn-primary"
                  id="btnAgregarVehiculo"
                >
                  Agregar
                </button>
              </div>
            </div>
          </form>
        </div>
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

  function getElemtById(id) {
    return document.getElementById(id);
  }

  function establecerFechaInicio() {
    const fechaInicioInput = document.getElementById("txtfechainicio");

    const fechaActual = new Date();
    const fechaFormatoInput = fechaActual.toISOString().split("T")[0];
    // console.log(fechaActual.toISOString().split('T'));
    fechaInicioInput.value = fechaFormatoInput;
  }

  function establecerRangoFechaDevolucion() {
    const fechaDevolucion = document.getElementById("txtfechadevolucion");

    //  Establecemos el valor inicial
    const fechaActual = new Date();
    const fechaFormatoInput = fechaActual.toISOString().split("T")[0];
    // fechaDevolucion.setAttribute("value", fechaFormatoInput);

    //  Establecemos los valores maximos y minimos
    const fechaMaxima = new Date();
    fechaMaxima.setDate(fechaMaxima.getDate() + 100);
    const fechaFormatoMaximo = fechaMaxima.toISOString().split("T")[0];

    fechaDevolucion.setAttribute("min", fechaFormatoInput);
    fechaDevolucion.setAttribute("max", fechaFormatoMaximo);
  }

  function calcularDias(fechainicio = "", FechaFin = "") {
    var FechaIni = new Date(fechainicio);
    var FechaFin = new Date(FechaFin);

    if (FechaFin < FechaIni) {
      const temp = FechaIni;
      FechaIni = FechaFin;
      FechaFin = temp;
    }

    const diferenciasEnMs = FechaFin - FechaIni;
    const unDiaEnMs = 1000 * 60 * 60 * 24;
    const diferenciaEnDias = Math.floor(diferenciasEnMs / unDiaEnMs);

    return diferenciaEnDias;
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
        diasAtraso: diasAtraso ,
        fechaPasada: true,
        diasRestantes: 0,
      };
    }
  }

  async function obtenerDatosAlquiler() {
    try {
      const parametros = new FormData();
      parametros.append("operacion", "listarAquileres");

      const respuesta = await fetch(
        `../../controllers/alquiler.controller.php`,
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

  async function obtenerDatosFormasPagos() {
    try {
      const parametros = new FormData();
      parametros.append("operacion", "listarFormaPago");

      const respuesta = await fetch(
        `../../controllers/formapago.controller.php`,
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

  async function obtenerDatosVehiculos() {
    try {
      const parametros = new FormData();
      parametros.append("operacion", "listarVehiculos");

      const respuesta = await fetch(
        `../../controllers/vehiculo.controller.php`,
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

  async function obtenerDatosUsuario() {
    try {
      const parametros = new FormData();
      parametros.append("operacion", "listarUsuarios");

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

      dias = calcularDias(dato.fechainicio, dato.fechafin);
      precioPorDia = dato.precioalquiler;
      precioTotal = dias * precioPorDia;

      const resultado = controlDevolucion(dato.fechafin);
      // const resultado = controlDevolucion("2023-11-18");
      // console.log(resultado);
      // console.log(dato.fechafin);
      const estado = construirEstadoDevolucion(resultado);

      // console.log(resultado);
      // console.log(estado);

      formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${dato.tipo}</td>
                <td class="text-center">${dato.formapago}</td>
                <td class="text-center">${dato.placa}</td>
                <td class="text-center">${dato.apellidos}</td>
                <td class="text-center">${dato.nombres}</td>
                <td class="text-center">${dato.email}</td>
                <td class="text-center">
                  <button type="" class="btn btn-secondary" disabled>
                    ${dias} días
                  </button>
                  </td>
                <td class="text-center">${estado}</td>
                <td class="text-center">S/. ${precioTotal}</td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info eliminar-btn" data-vehiculo="${dato.tipo}" data-kilometraje="${dato.kilometraje}" data data-id="${dato.idalquiler}" data-idvehiculo="${dato.idvehiculo}">Devolución</button>
                  </div>         
                </td>
              </tr> 
              `;
      numFila++;
    });

    return formHTML;
  }

  function construirHTMLUsuarios(datos) {
    let formHTML = "";
    datos.forEach((dato) => {
      formHTML += `
      <option value="${dato.idusuario}">${dato.apellidos}, ${dato.nombres}</option>
                `;
    });

    return formHTML;
  }

  function construirHTMLFormaPago(datos) {
    let formHTML = "";
    datos.forEach((dato) => {
      formHTML += `
        <option value="${dato.idformapago}">${dato.formapago}</option>
                `;
    });

    return formHTML;
  }

  function construirHTMLVehiculos(datos) {
    let formHTML = "";
    datos.forEach((dato) => {
      formHTML += `
                <option value="${dato.idvehiculo}">${dato.tipo}</option>
                `;
    });

    return formHTML;
  }

  function actualizarContenidoHTML(html) {
    const formContainer = document.getElementById("tabla-alquileres");
    formContainer.innerHTML = html;

    //  EVENTOS PARA LOS BOTONES
    const btn = document.querySelectorAll(".eliminar-btn");

    btn.forEach((boton) => {
      const idAlquiler = boton.getAttribute("data-id");
      const vehiculo = boton.getAttribute("data-vehiculo");
      const kilometraje = boton.getAttribute("data-kilometraje");
      const idVehiculo = boton.getAttribute("data-idvehiculo");
      boton.addEventListener("click", (evento) => {
        // eliminarVehiculo(idVehiculo);
        // alert(`El ID del alquiler es: ${idAlquiler}`);
        devolverVehiculo(idAlquiler, vehiculo, kilometraje, idVehiculo);
      });
    });
  }

  function actualizarContenidoHTMLVehiculo(html) {
    const formContainer = document.getElementById("txtvehiculo");
    formContainer.innerHTML += html;
  }

  function actualizarContenidoHTMLFormaPago(html) {
    const formContainer = document.getElementById("txtformapago");
    formContainer.innerHTML += html;
  }

  function actualizarContenidoHTMLUsuario(html) {
    const formContainer = document.getElementById("txtusuario");
    formContainer.innerHTML += html;
  }

  async function mostrarAlquileres() {
    try {
      const datos = await obtenerDatosAlquiler();
      const formHTML = construirHTML(datos);
      actualizarContenidoHTML(formHTML);
    } catch (error) {
      console.error(error);
    }
  }

  async function mostrarFormaPago() {
    try {
      const datos = await obtenerDatosFormasPagos();
      const formHTML = construirHTMLFormaPago(datos);
      actualizarContenidoHTMLFormaPago(formHTML);

      // console.log(formHTML);
    } catch (error) {
      console.error(error);
    }
  }

  async function mostraUsuario() {
    try {
      const datos = await obtenerDatosUsuario();
      const formHTML = construirHTMLUsuarios(datos);
      actualizarContenidoHTMLUsuario(formHTML);

      // console.log(formHTML);
    } catch (error) {
      console.error(error);
    }
  }

  async function mostrarVehiculos() {
    try {
      datosVehiculos = await obtenerDatosVehiculos();
      const formHTML = construirHTMLVehiculos(datosVehiculos);
      actualizarContenidoHTMLVehiculo(formHTML);

      // Obtener el elemento select por su ID
      const selectVehiculo = document.getElementById("txtvehiculo");
      selectVehiculo.addEventListener("change", manejarSeleccionVehiculo);
    } catch (error) {
      console.error(error);
    }
  }

  function manejarSeleccionVehiculo(event) {
    const selectedOptionId = event.target.value;

    const vehiculoSeleccionado = datosVehiculos.find(
      (vehiculo) => vehiculo.idvehiculo === selectedOptionId
    );
    // console.log(datosVehiculos);
    if (vehiculoSeleccionado) {
      const costoAlquiler = vehiculoSeleccionado.costo_alquiler;
      const Kilometraje = vehiculoSeleccionado.kilometraje;
      document.getElementById("txtCostoAlquiler").value = costoAlquiler;
      document.getElementById("txtkilometraje").value = Kilometraje;
    } else {
      console.log("Vehiculo no encontrado");
    }
  }

  function limpiarCampos() {
    const campos = [
      "txtvehiculo",
      "txtusuario",
      "txtkilometraje",
      "txtformapago",
      "txtfechainicio",
      "txtfechadevolucion",
      "txtCostoAlquiler",
    ];

    campos.forEach((campo) => {
      document.getElementById(campo).value = "";
    });
  }

  async function registrarAlquiler() {
    const idvehiculo = getElemtById("txtvehiculo").value;
    const idusuario = getElemtById("txtusuario").value;
    const kilometrajeini = getElemtById("txtkilometraje").value;
    const idformapago = getElemtById("txtformapago").value;
    const fechainicio = getElemtById("txtfechainicio").value;
    const fechafin = getElemtById("txtfechadevolucion").value;
    const precioalquiler = getElemtById("txtCostoAlquiler").value;

    try {
      const parametros = new FormData();
      parametros.append("operacion", "registrarAlquiler");
      parametros.append("idformapago", idformapago);
      parametros.append("idvehiculo", idvehiculo);
      parametros.append("idusuario", idusuario);
      parametros.append("fechainicio", fechainicio);
      parametros.append("fechafin", fechafin);
      parametros.append("precioalquiler", precioalquiler);
      parametros.append("kilometrajeini", kilometrajeini);

      const respuesta = await fetch(
        `../../controllers/alquiler.controller.php`,
        {
          method: "POST",
          body: parametros,
        }
      );

      if (!respuesta.ok) {
        throw new Error("Error al registrar");
      }

      const datos = await respuesta.json();
      console.log(datos);
      limpiarCampos();
      mostrarAlquileres();
      establecerFechaInicio();
      return datos;
    } catch (error) {
      console.error(error);
      return [];
    }
  }

  async function submitFormmulario(event) {
    event.preventDefault();
    await registrarAlquiler();
  }

  function devolverVehiculo(id, vehiculo, kilometraje, idvehiculo){
    window.location.href = `./views/devolucionAlquiler.php?idalquiler=${id}&vehiculo=${vehiculo}&kilometraje=${kilometraje}&idvehiculo=${idvehiculo}`;
  }


  //-----------------------------------------------
  //  Eventos
  //-----------------------------------------------

  document.addEventListener("DOMContentLoaded", () => {
    mostraUsuario();
    mostrarVehiculos();
    mostrarFormaPago();
    mostrarAlquileres();
    establecerFechaInicio();
    establecerRangoFechaDevolucion();

    const formAlquiler = document.getElementById("form-alquiler");
    formAlquiler.addEventListener("submit", submitFormmulario);
  });
</script>
