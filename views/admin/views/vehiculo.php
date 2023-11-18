<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">VEHICULOS REGISTRADAS</h4>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="text-primary text-center">
              <tr>
                <th class="col-1">N°</th>
                <th class="col-1">Marca</th>
                <th class="col-2">Modelo</th>
                <th class="col-1">Placa</th>
                <th class="col-1">Color</th>
                <th class="col-1">CostoAlquiler</th>
                <th class="col-1">Combustible</th>
                <th class="col-1">Año Modelo</th>
                <th class="col-1">Fotografia</th>
                <th class="col-1">Acción</th>
              </tr>
            </thead>
            <tbody class="text-center" id="tablavehiculos"></tbody>
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
      Agregar un vehículo
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <div class="card card-sm">
        <div class="card-body bg-light">
          <form id="form-vehiculo">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtMarca">Tipo Modelo</label>
                  <input
                    type="text"
                    class="form-control"
                    id="txtMarca"
                    aria-describedby="Marca"
                    required
                    maxlength="40"
                  />
                </div>

                <div class="form-group">
                  <label for="txtPlaca">Placa</label>
                  <input
                    type="text"
                    class="form-control"
                    id="txtPlaca"
                    aria-describedby="Placa"
                    maxlength="7"
                    required
                  />
                  <small id="Placa" class="form-text text-muted"
                    >FORMATO ♦ 4566-DF ♦ 345-SDF</small
                  >
                </div>
                <div class="form-group">
                  <label for="txtCostoAlquiler"
                    >Costo de alquiler por día</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="txtCostoAlquiler"
                    aria-describedby="Costo de alquiler por día"
                    required
                    min="1"
                  />
                </div>
                <div class="form-group">
                  <label for="txtTipoCombustible">Tipo de combustible</label>
                  <input
                    type="text"
                    class="form-control"
                    id="txtTipoCombustible"
                    aria-describedby="Tipo de combustible"
                    required
                    maxlength="30"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="modelos-vehiculo">Marca</label>
                  <select class="form-control" id="modelos-vehiculo">
                    <option>Seleccione una marca</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtColor">Color</label>
                  <input
                    type="text"
                    class="form-control"
                    id="txtColor"
                    aria-describedby="Color"
                    required
                    maxlength="50"
                  />
                </div>
                <div class="form-group">
                  <label for="txtAño">Año</label>
                  <input
                    type="number"
                    class="form-control"
                    id="txtAño"
                    aria-describedby="Año"
                    maxlength="4"
                    required
                  />
                  <small id="txtAño" class="form-text text-muted"
                    >* el vehículo debe tener como máximo 15 años de
                    antigüedad</small
                  >
                </div>

                <div class="custom-file">
                  <label for="txtFografia">Fotografia</label>
                  <input
                    type="file"
                    class="custom-file-input"
                    id="txtFografia"
                  />
                  <label
                    class="custom-file-label"
                    for="txtFografia"
                    data-browse="Seleccione una imagen"
                    >Fotografia</label
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
  function $(id) {
    return document.querySelector(id);
  }

  function rangodeFecha() {
    const añoActual = new Date().getFullYear();
    // alert(añoActual);
    const campoAño = document.getElementById("txtAño");
    campoAño.setAttribute("value", añoActual - 1);
    campoAño.setAttribute("min", añoActual - 15);
    campoAño.setAttribute("max", añoActual - 1);
  }

  function limpiarCampos() {
    document.querySelector("#txtMarca").value = "";
    document.querySelector("#modelos-vehiculo").value = "";
    document.querySelector("#txtPlaca").value = "";
    document.querySelector("#txtColor").value = "";
    document.querySelector("#txtTipoCombustible").value = "";
    document.querySelector("#txtCostoAlquiler").value = "";
    document.querySelector("#txtAño").value = "";
    document.querySelector("#txtFografia").value = "";
  }

  function listarMarcas() {
    const parametros = new FormData();
    parametros.append("operacion", "listarMarcas");

    fetch(`../../controllers/marca.controller.php`, {
      method: "POST",
      body: parametros,
    })
      .then((datos) => datos.json())
      .then((datos) => {
        // console.log(datos);
        // alert("la forma de pago ha sido eliminado");

        const formContainer = document.getElementById("modelos-vehiculo");
        let formHTML = "";
        datos.forEach((dato) => {
          // console.log(dato);
          formHTML += `
              <option value="${dato.idmarca}">${dato.marca}</option>
              `;
        });

        formContainer.innerHTML += formHTML;
        rangodeFecha();
      })
      .catch((e) => {
        console.log(e);
      });
  }

  function eliminarVehiculo(id) {
    const parametros = new FormData();
    parametros.append("operacion", "eliminarVehiculo");
    parametros.append("idvehiculo", id);

    fetch(`../../controllers/vehiculo.controller.php`, {
      method: "POST",
      body: parametros,
    })
      .then((datos) => datos.json())
      .then((datos) => {
        console.log(datos);
        alert("El vehiculo se ha eliminado correctamente");
        mostrarVehiculos();
      })
      .catch((e) => {
        console.log(e);
      });
  }

  function agregarVehiculo() {
    const idmarca = document.querySelector("#modelos-vehiculo").value;
    const tipo = document.querySelector("#txtMarca").value;
    const placa = document.querySelector("#txtPlaca").value;
    const color = document.querySelector("#txtColor").value;
    const costo_alquiler = document.querySelector("#txtCostoAlquiler").value;
    const tipocombustible = document.querySelector("#txtTipoCombustible").value;
    const año = document.querySelector("#txtAño").value;
    const fotografia = document.querySelector("#txtFografia").value;

    // alert(tipomodelo);

    const parametros = new FormData();
    parametros.append("operacion", "registrarVehiculo");
    parametros.append("idmarca", idmarca);
    parametros.append("tipo", tipo);
    parametros.append("placa", placa);
    parametros.append("color", color);
    parametros.append("costo_alquiler", costo_alquiler);
    parametros.append("tipocombustible", tipocombustible);
    parametros.append("año", año);
    parametros.append("fotografia", fotografia);

    fetch(`../../controllers/vehiculo.controller.php`, {
      method: "POST",
      body: parametros,
    })
      .then((datos) => datos.text())
      .then((datos) => {
        alert(datos);
        alert("el vehiculo se ha agregado correctamente");
        limpiarCampos();
        mostrarVehiculos();
      })
      .catch((e) => {
        console.log(e);
      });
  }

  function mostrarVehiculos() {
    const parametros = new FormData();
    parametros.append("operacion", "listarVehiculos");

    fetch(`../../controllers/vehiculo.controller.php`, {
      method: "POST",
      body: parametros,
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        // console.log(datos);

        const formContainer = document.getElementById("tablavehiculos");
        let formHTML = "";
        let numFila = 1;
        datos.forEach((dato) => {
          // console.log(dato);
          formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${dato.marca}</td>
                <td class="text-center">${dato.tipo}</td>
                <td class="text-center">${dato.placa}</td>
                <td class="text-center">${dato.color}</td>
                <td class="text-center">${dato.costo_alquiler}</td>
                <td class="text-center">${dato.tipocombustible}</td>
                <td class="text-center">${dato.año}</td>
                <td class="text-center">proximamente</td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger eliminar-btn" data-id="${dato.idvehiculo}">Eliminar</button>
                  </div>         
                </td>
              </tr> 
              `;
          numFila++;
        });

        formContainer.innerHTML = formHTML;
        const botonesEliminar = document.querySelectorAll(".eliminar-btn");

        botonesEliminar.forEach((boton) => {
          const idVehiculo = boton.getAttribute("data-id");
          boton.addEventListener("click", (evento) => {
            eliminarVehiculo(idVehiculo);
            // alert(idVehiculo);
          });
        });
      })
      .catch((e) => {
        console.error(e);
      });
  }

  //  eventos
  let btnAgregarVehiculo = $("#form-vehiculo");

  btnAgregarVehiculo.addEventListener("submit", function () {
    event.preventDefault();
    // alert(formaPagoNuevo);
    agregarVehiculo();
    // limpiarCampos();
  });

  document.addEventListener("DOMContentLoaded", function () {
    rangodeFecha();
    listarMarcas();
    mostrarVehiculos();
  });
</script>
