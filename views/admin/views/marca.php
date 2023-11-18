<div class="main-content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="min-height: 485px">
        <div class="card-header card-header-text">
          <h4 class="card-title">MARCAS REGISTRADAS</h4>
          <p class="category">.</p>
        </div>
        <div class="card-content table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="text-primary text-center">
              <tr>
                <th class="col-2">ID</th>
                <th class="col-6">Marca</th>
                <th class="col-4">Accion</th>
              </tr>
            </thead>
            <tbody class="text-center" id="tablamarca"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <p class="me-3">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Agregar Marca
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <div class="card card-sm">
        <div class="card-body bg-light">
          <form id="form-marca">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtMarca">Marca</label>
                  <input type="text" class="form-control" id="txtMarca" aria-describedby="emailHelp" required />
                  <small id="txtMarca" class="form-text text-muted">coloca una marca de automovil</small>
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
  function $(id) {
    return document.querySelector(id);
  }


  function eliminarMarca(id) {
    const parametros = new FormData();
    parametros.append("operacion", "eliminarMarca");
    parametros.append("idmarca", id);

    fetch(`../../controllers/marca.controller.php`, {
        method: "POST",
        body: parametros,
      })
      .then((datos) => datos.json())
      .then((datos) => {
        console.log(datos);
        alert("la marca ha sido eliminado");
        mostrarMarcas();
      })
      .catch((e) => {
        console.log(e);
      });
  }

  // function agregarMarca(id) {
  //   const parametros = new FormData();
  //   parametros.append("operacion", "agregarMarca");
  //   parametros.append("marca", id);
  //   alert(id);

  //   fetch(`../../controllers/marca.controller.php`, {
  //     method: "POST",
  //     body: parametros,
  //   })
  //     .then((datos) => datos.json())
  //     .then((datos) => {
  //       alert("la marca se ha agregado correctamente");
  //       document.querySelector("#txtMarca").value = '';
  //       mostrarMarcas();
  //     })
  //     .catch((e) => {
  //       console.log(e);
  //     });
  // }

  async function agregarMarca(id) {
    try {
      const parametros = new FormData();
      parametros.append("operacion", "agregarMarca");
      parametros.append("marca", id);
      alert(id);

      const response = await fetch(`../../controllers/marca.controller.php`, {
        method: "POST",
        body: parametros,
      });

      if (!response.ok) {
        throw new Error("Error al agregar la marca");
      }

      const datos = await response.json();
      alert("La marca se ha agregado correctamente");
      document.querySelector("#txtMarca").value = '';
      mostrarMarcas();
      
    } catch (error) {
      console.error(error);
    }
  }


  function mostrarMarcas() {
    const parametros = new FormData();
    parametros.append("operacion", "listarMarcas");

    fetch(`../../controllers/marca.controller.php`, {
        method: "POST",
        body: parametros,
      })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        // console.log(datos);

        const formContainer = document.getElementById("tablamarca");
        // const formContainer = $("#tablamarca");
        let formHTML = "";
        let numFila = 10;
        datos.forEach((marca) => {
          // console.log(marca);
          formHTML += `
              <tr>
                <td>${numFila}</td>
                <td class="text-center">${marca.marca}</td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-danger eliminar-btn" data-id="${marca.idmarca}">Eliminar</button>
                  </div>         
                </td>
              </tr> 
              `;
          numFila++;
        });

        formContainer.innerHTML = formHTML;
        const botonesEliminar = document.querySelectorAll(".eliminar-btn");

        botonesEliminar.forEach(boton => {
          const idMarca = boton.getAttribute("data-id");
          boton.addEventListener('click', evento => {
            eliminarMarca(idMarca);
          });
        });

      })
      .catch((e) => {
        console.error(e);
      });
  }

  //  eventos
  let btnAgregarMarca = $("#form-marca");

  btnAgregarMarca.addEventListener("submit", function() {
    event.preventDefault();
    const marcaNueva = document.querySelector("#txtMarca").value;
    // alert(marcaNueva);
    agregarMarca(marcaNueva);

  });

  mostrarMarcas();
</script>