<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">FORMAS DE PAGOS REGISTRADAS</h4>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="text-primary text-center">
              <tr>
                <th class="col-2">ID</th>
                <th class="col-6">Forma de pago</th>
                <th class="col-4">Acción</th>
              </tr>
            </thead>
            <tbody class="text-center" id="tablaformapago"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <p class="me-3">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Agregar una forma de pago
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <div class="card card-sm">
        <div class="card-body bg-light">
          <form id="form-forma-pago">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtFormaPago">Forma de Pago</label>
                  <input type="text" class="form-control" id="txtFormaPago" aria-describedby="emailHelp" required />
                  <small id="txtMarca" class="form-text text-muted">coloca una forma de pago</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary" id="btnAgregarMarca">
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
  let formasDePago = [];

  function $(id) {
    return document.querySelector(id);
  }


  function eliminarFormaPago(id) {

    const confirmacion = confirm("¿Estás seguro de eliminar esta forma de pago?");
    if (!confirmacion) {
      return;
    }

    const parametros = new FormData();
    parametros.append("operacion", "eliminarFomaPago");
    parametros.append("idformapago", id);

    fetch(`../../controllers/formapago.controller.php`, {
        method: "POST",
        body: parametros,
      })
      .then((datos) => datos.json())
      .then((datos) => {
        console.log(datos);
        alert("la forma de pago ha sido eliminado");
        mostrarFormasPago();
      })
      .catch((e) => {
        console.log(e);
      });
  }

  function agregarFormaPago(formapago) {

    if (formasDePago.includes(formapago)) {
      alert(`La forma de pago ${formapago} ya se encuentra registrado en el sistema`);
    } else {

      const confirmacion = confirm("¿Estás seguro de agregar esta forma de pago?");
      if (!confirmacion) {
        return;
      }

      const parametros = new FormData();
      parametros.append("operacion", "agregarFormaPago");
      parametros.append("formapago", formapago);
      alert(formapago);

      fetch(`../../controllers/formapago.controller.php`, {
          method: "POST",
          body: parametros,
        })
        .then((datos) => datos.json())
        .then((datos) => {
          alert("la marca se ha agregado correctamente");
          document.querySelector("#txtMarca").value = '';
          mostrarFormasPago();
        })
        .catch((e) => {
          console.log(e);
        });

    }


  }

  function mostrarFormasPago() {
    const parametros = new FormData();
    parametros.append("operacion", "listarFormaPago");

    fetch(`../../controllers/formapago.controller.php`, {
        method: "POST",
        body: parametros,
      })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        // console.log(datos);

        const formContainer = document.getElementById("tablaformapago");
        let formHTML = "";
        let numFila = 1;
        datos.forEach((dato) => {
          // console.log(dato.formapago);
          formasDePago.push(dato.formapago);

          formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${dato.formapago}</td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger eliminar-btn" data-id="${dato.idformapago}">Eliminar</button>
                  </div>         
                </td>
              </tr> 
              `;
          numFila++;
        });

        formContainer.innerHTML = formHTML;
        const botonesEliminar = document.querySelectorAll(".eliminar-btn");

        botonesEliminar.forEach(boton => {
          const idFormaPago = boton.getAttribute("data-id");
          boton.addEventListener('click', evento => {
            eliminarFormaPago(idFormaPago);
            // alert(idFormaPago);
          });
        });

      })
      .catch((e) => {
        console.error(e);
      });
  }

  //  eventos
  let btnAgregarFormaPago = $("#form-forma-pago");

  btnAgregarFormaPago.addEventListener("submit", function() {
    event.preventDefault();
    const formaPagoNuevo = document.querySelector("#txtFormaPago").value;
    // alert(formaPagoNuevo);
    agregarFormaPago(formaPagoNuevo);

  });

  mostrarFormasPago();
</script>